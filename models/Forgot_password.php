<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/edulearn/vendor/autoload.php';

class Forgot_password extends Config {

    public function validateEmail($email) {
        
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT `email` FROM `user_tbl` WHERE `email` = ? LIMIT 1");
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        $result = $stmt->rowCount();

        if($result > 0) {

            $_SESSION['email'] = $data['email']; 

            $this->sendResetLink($_SESSION['email']);

        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Email does not exist.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    
    public function sendResetLink($email) {

        $token = bin2hex(random_bytes(32));

        $connection = $this->openConnection();
        $stmt = $connection->prepare("UPDATE `user_tbl` SET `verify_token` = ? WHERE `email` = ? LIMIT 1");
        $stmt->execute([$token, $email]);

        $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
        $transport->setUsername('edulearn.smtp@gmail.com');
        $transport->setPassword('lyiw zlem zfdx vper'); 

        $transport->setStreamOptions(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);

        $mailer = new Swift_Mailer($transport);

        $message = new Swift_Message('Password Reset');
        $message->setFrom(['edulearn.smtp@gmail.com' => 'Mailer']);
        $message->addTo($email);
        $message->setBody('Click the link below to reset your password: <br>' .
                          '<a href="http://localhost/eduLearn/views/reset-password.php?token=' . $token . '">Reset Password</a>', 'text/html');

        try {
            $result = $mailer->send($message);
            if ($result) {
                header("Location: check-mail.php");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to send the email.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        } catch (Swift_TransportException $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $e->getMessage();
        }
    }

    public function resetPassword() {

        if(isset($_POST['submit'])) {

            $email = $_SESSION['email'];

            $password = md5($_POST['password']);
            $confirmPassword = md5($_POST['confirmPassword']);

            if (!$this->validatePassword($_POST['password'])) {

                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

            } else if (!$this->passwordsMatch($_POST['password'], $_POST['confirmPassword'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Passwords do not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE `user_tbl` SET `password` = ? WHERE `email` = ?");
                $stmt->execute([$password, $email]);
                $result = $stmt->rowCount();

                if($result > 0) {
                    header("Location: success-password.php");

                    session_destroy();
                }
            }
        }
    }

    public function validatePassword($password) {

        $minLength = 8;
        $hasUppercase = preg_match('/[A-Z]/', $password);
        $hasLowercase = preg_match('/[a-z]/', $password);
        $hasNumber = preg_match('/\d/', $password);

        if (strlen($password) < $minLength || !$hasUppercase || !$hasLowercase || !$hasNumber) {
            return false;
        }
        return true;
    }

    public function passwordsMatch($password, $confirmPassword) {
        return $password === $confirmPassword;
    }
}
?>

