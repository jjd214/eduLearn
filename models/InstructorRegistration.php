<?php
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/eduLearn/vendor/autoload.php';

class InstructorRegistration extends Config {

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
            
            if($this->emailExistsApplication($email) > 0) {

                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Email already exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

            } else if($this->emailExistsStudentTable($email) > 0) {

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

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `application-form_tbl` (`firstname`,`lastname`,`gender`,`email`,`password`,`age`,`position`,`verify_token`) VALUES(?,?,?,?,?,?,?,?)");
                $stmt->execute([$firstname, $lastname, $gender, $email, $password,$age, $position, $verifyToken]);
                $result = $stmt->rowCount();
            
                if ($result > 0) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Application sent wait for admins approval.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Application failed
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
        }
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

    public function emailExistsStudentTable($email) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `email` = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();

        return $result;
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

        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'); 
        $transport->setUsername('edulearn.smtp@gmail.com');
        $transport->setPassword('lyiw zlem zfdx vper');
        $transport->setStreamOptions(['ssl' => ['allow_self_signed' => true, 'verify_peer' => false]]);
        
        $mailer = new \Swift_Mailer($transport);
    
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