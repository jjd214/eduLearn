<?php
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/edulearn/vendor/autoload.php';

class Forgot_password extends Config {

    public function validateEmail($email) {
        
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT `email`,`access` FROM `user_tbl` WHERE `email` = ? LIMIT 1");
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        $result = $stmt->rowCount();

        if($result > 0) {

            $_SESSION['userdata'] = [
                "email" => $data['email'],
                "usertype" => $data['access']
            ];
            
            $this->sendResetLink($_SESSION['userdata']);

        } else {

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT `email`,`access` FROM `instructor_tbl` WHERE `email` = ? LIMIT 1");
            $stmt->execute([$email]);
            $data = $stmt->fetch();
            $count = $stmt->rowCount();

            if($count > 0) {

                $_SESSION['userdata'] = [
                    "email" => $data['email'],
                    "usertype" => $data['access']
                ];

                $this->sendResetLink($_SESSION['userdata']);

            } else {

                $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT `email`,`access` FROM `admin_tbl` WHERE `email` = ? LIMIT 1");
                $stmt->execute([$email]);
                $data = $stmt->fetch();
                $total = $stmt->rowCount();

                if($total > 0) {

                    $_SESSION['userdata'] = [
                        'email' => $data['email'],
                        'usertype' => $data['access']
                    ];

                    $this->sendResetLink($_SESSION['userdata']);

                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Email do not exist.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                }
            }
        }
    }
    
    public function sendResetLink($data) {
        $email = $data['email'];
        $usertype = $data['usertype'];
    
        $token = bin2hex(random_bytes(32));
    
        $connection = $this->openConnection();
    
        switch ($usertype) {

            case 'student':
                $sql = "UPDATE `user_tbl` SET `verify_token` = ? WHERE `email` = ? LIMIT 1";
                break;
            case 'instructor':
                $sql = "UPDATE `instructor_tbl` SET `verify_token` = ? WHERE `email` = ? LIMIT 1";
                break;
            case 'admin':
                $sql = "UPDATE `admin_tbl` SET `verify_token` = ? WHERE `email` = ? LIMIT 1";
                break;
            
        }
    
        $stmt = $connection->prepare($sql);
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

            $email = $_SESSION['userdata']['email']; 
            $usertype = $_SESSION['userdata']['usertype']; 

            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

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

                $hashedPassword = md5($confirmPassword);
                $connection = $this->openConnection();
            
                switch ($usertype) {

                    case 'student':
                        $sql = "UPDATE `user_tbl` SET `password` = '$hashedPassword' WHERE `email` = '$email'";
                        break;
                    case 'instructor':
                        $sql = "UPDATE `instructor_tbl` SET `password` = '$hashedPassword' WHERE `email` = '$email'";
                        break;
                    case 'admin':
                        $sql = "UPDATE `admin_tbl` SET `password` = '$hashedPassword' WHERE `email` = '$email'";
                        break;
                    
                }
      
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();

                if ($result > 0) {
                    header("Location: success-password.php");
                    unset($_SESSION['userdata']);
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Failed to change.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                      var_dump($stmt);
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

