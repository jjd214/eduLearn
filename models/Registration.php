<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/vendor/autoload.php';

class Registration extends Config {

    public function studentRegistration() {
        
        if(isset($_POST['submit'])) { 
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $confirmPassword = md5($_POST['confirmPassword']);
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $verifyToken = md5(rand()); 

            $otp = $this->generateOTP();
            
            if($this->emailExists($email) > 0) {

                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Email already exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

            } else if (!$this->validatePassword($_POST['password'])) {

                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Password must be at least 8 characters long.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

            } else if (!$this->passwordsMatch($_POST['password'], $_POST['confirmPassword'])) {

                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Passwords do not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

            } else {
                
                $_SESSION['signup_data'] = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'gender' => $gender,
                    'email' => $email,
                    'password' => $password,
                    'verify_token' => $verifyToken, 
                    'otp' => $otp
                ];
    
                $this->sendOTP($_SESSION['signup_data']);

            }
        }
    }


    public function sendOTP($userData) {

        $email = $userData['email'];
        $otp = $userData['otp'];

        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'); 
        $transport->setUsername('???@gmail.com');
        $transport->setPassword('????');

        $transport->setStreamOptions(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false]]);

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message('OTP for Signup');
        $message->setFrom(['???@gmail.com' => 'Mailer']);
        $message->addTo($email);
        $message->setBody("
            <h2>You have Registered with EduLearn</h2>
            <h5>Use the following OTP to complete your signup:</h5>
            <br></br>
            <strong>{$otp}</strong>
        ", 'text/html');

        try {
            $result = $mailer->send($message);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        OTP has been sent to your email address.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                      
                // header("Location: otp-input.php?email=" . urlencode($email));
                // exit();    

            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to send the OTP.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        } catch (\Swift_TransportException $e) {
            echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
        }
        
    }















    public function generateOTP($length = 6) {
        // Generate a random numeric OTP
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }

    public function validatePassword($password) {
        $minLength = 8;

        if (strlen($password) < $minLength) {
            return false;
        }

        return true;
    }

    public function passwordsMatch($password, $confirmPassword) {
        return $password === $confirmPassword;
    }

    public function emailExists($email) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `email` = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();

        return $result;
    }
}

?>