<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/vendor/autoload.php';

class Application extends Config {


    public function instructorRegistration() {
        
        if(isset($_POST['submit'])) { 
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $confirmPassword = md5($_POST['confirmPassword']);
            $age = $_POST['age'];
            $position = $_POST['position'];
            
            $verifyToken = md5(rand()); 

            $otp = $this->generateOTP();
            
            if($this->emailExistsApplication($email) > 0) {

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

                $_SESSION['application_data'] = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'gender' => $gender,
                    'email' => $email,
                    'password' => $password,
                    'verify_token' => $verifyToken, 
                    'age' => $age,
                    'position' => $position,
                    'otp' => $otp
                ];
    
                $this->sendOTP($_SESSION['application_data']);

            }
        }
    }

    public function sendOTP($userData) {

        $email = $userData['email'];
        $otp = $userData['otp']; 

        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'); 
        $transport->setUsername('edulearn.smtp@gmail.com');
        $transport->setPassword('lyiw zlem zfdx vper');

        $transport->setStreamOptions(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false]]);

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message('OTP for Signup');
        $message->setFrom(['edulearn.smtp@gmail.com' => 'Mailer']);
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
                      
                header("Location: otp-inputInstructor.php?token=" . $userData['verify_token']);

               
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

    public function verifyOTP($otp1,$otp2,$otp3,$otp4,$otp5,$otp6) {

        $storedOTP = $_SESSION['application_data']['otp'];
        $newOTP = isset($_SESSION['newOTP']) ? $_SESSION['newOTP'] : '';

        $userEnteredOTP = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;
        
        if($userEnteredOTP == $storedOTP || $userEnteredOTP == $newOTP) {

            $this->insertIntoDatabase();
        
            unset($_SESSION['newOTP']);
            unset($_SESSION['application_data']);

            header("Location: check-mail.php");
            
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Incorrect OTP. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

    public function resendOTP() {   

        if(isset($_POST['resendOTP'])) {

            $storedEmail = $_SESSION['application_data']['email'];

            $newOTP = $this->generateOTP();
            
            $this->newOTPGenerator($storedEmail,$newOTP);

        }
    }

    public function newOTPGenerator($email,$newOTP) {

        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'); 
        $transport->setUsername('edulearn.smtp@gmail.com');
        $transport->setPassword('lyiw zlem zfdx vper');

        $transport->setStreamOptions(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false]]);

        $mailer = new \Swift_Mailer($transport);

        $message = new \Swift_Message('OTP for Signup');
        $message->setFrom(['edulearn.smtp@gmail.com' => 'Mailer']);
        $message->addTo($email);
        $message->setBody("
            <h2>You have Registered with eduLearn</h2>
            <h5>Use the following OTP to complete your signup:</h5>
            <br></br>
            <strong>{$newOTP}</strong>
        ", 'text/html');

        try {
            $result = $mailer->send($message);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        OTP resent successfull.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to send the OTP.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        } catch (\Swift_TransportException $e) {
            echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
        }

        $_SESSION['newOTP'] = $newOTP;
    }

    public function generateOTP($length = 6) {

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

    public function emailExistsApplication($email) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `application-form_tbl` WHERE `email` = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();

        return $result;
    }

    public function insertIntoDatabase() {

        $userData = $_SESSION['application_data'];
    
        $firstname = $userData['firstname'];
        $lastname = $userData['lastname'];
        $gender = $userData['gender'];
        $email = $userData['email'];
        $password = $userData['password'];
        $age = $userData['age'];
        $position = $userData['position'];
        $verify_token = $userData['verify_token'];
    
        $connection = $this->openConnection();
        $stmt = $connection->prepare("INSERT INTO `application-form_tbl` (`firstname`,`lastname`,`gender`,`email`,`password`,`age`,`position`,`verify_token`) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->execute([$firstname, $lastname, $gender, $email, $password,$age, $position, $verify_token]);
        $result = $stmt->rowCount();
    
        if ($result == 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to register user.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } 
    }

    public function acceptApplication($id) {

        if(isset($_POST['submit'])) {

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `application-form_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();


            $userid = $data['id'];
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $gender = $data['gender'];
            $email = $data['email'];
            $password = $data['password'];
            $age = $data['age'];
            $position = $data['position'];
            $verify_token = $data['verify_token'];

            
            $this->sendMessageToMail($email);
            $this->changeTableLocation($firstname, $lastname, $gender, $email, $password, $verify_token, $age, $position);
            $this->deleteOldData($userid);
        }
    }

    public function sendMessageToMail($email) {
        // Swift Mailer configuration
        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'); 
        $transport->setUsername('edulearn.smtp@gmail.com');
        $transport->setPassword('lyiw zlem zfdx vper');
        $transport->setStreamOptions(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false]]);
        
        $mailer = new \Swift_Mailer($transport);
    
        // Compose the email message
        $subject = 'Welcome to EduLearn!';
        $body = "
            <h2>Congratulations!</h2>
            <p>You are now accepted as an instructor on EduLearn.</p>
            <p>You may log in and start uploading your courses.</p>
        ";
    
        $message = new \Swift_Message($subject);
        $message->setFrom(['edulearn.smtp@gmail.com' => 'EduLearn Mailer']);
        $message->addTo($email);
        $message->setBody($body, 'text/html');
    
        try {
            // Send the email
            $result = $mailer->send($message);
    
            if ($result) {
                $_SESSION['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Applicant accepted.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                header("Location: index.php");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to send the acceptance email. Please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        } catch (\Swift_TransportException $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    An error occurred while sending the acceptance email. Please contact support.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }

    public function changeTableLocation($firstname, $lastname, $gender, $email, $password, $verify_token, $age, $position) {
    
        $connection = $this->openConnection();
        $stmt = $connection->prepare("INSERT INTO `instructor_tbl` (`firstname`,`lastname`,`gender`,`email`,`password`,`verify_token`,`age`,`position`) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->execute([$firstname, $lastname, $gender, $email, $password, $verify_token, $age, $position]);
        $result = $stmt->rowCount();
    
        if ($result == 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to change location.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } 
    }

    public function deleteOldData($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("DELETE FROM `application-form_tbl` WHERE `id` = ?");
        $stmt->execute([$id]);
        $result = $stmt->rowCount();
    
        if ($result == 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to delete data.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } 
    }
    
}

?>