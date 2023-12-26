<?php
ob_start();
class Login extends Config {

    public function studentLogin() {
        if(isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `email` = ? AND `password` = ? ");
            $stmt->execute([$email,$password]);
            $data = $stmt->fetch();
            $count = $stmt->rowCount();

            if ($count == 1) {
                $this->set_session($data);
                $_SESSION['student_data'] = [
                    "studentID" => $data['id'],
                    "userType" => $data['access']
                ];
                header("Location: /eduLearn/views/student/home-page.php");
                exit();
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Incorrect email or password
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }

    public function instructorLogin() {
        if(isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `email` = ? AND `password` = ? ");
            $stmt->execute([$email,$password]);
            $data = $stmt->fetch();
            $count = $stmt->rowCount();

            print_r($data);
            if ($count == 1) {
                $this->set_session($data);
                $_SESSION['instructor_data'] = [
                    "instructorID" => $data['id'],
                    "userType" => $data['access']
                ];
                header("Location: /edulearn/views/instructor/home-page.php");
                exit();
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Incorrect email or password instructor
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
    }

    public function adminLogin() {
        if(isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `admin_tbl` WHERE `email` = ? AND `password` = ? ");
            $stmt->execute([$email,$password]);
            $data = $stmt->fetch();
            $count = $stmt->rowCount();

            if ($count == 1) {
                $this->set_session($data);
                header("Location: /edulearn/views/admin/index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Incorrect email or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }
    }

    public function set_session($array){

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['userdata'] = array (
            "id" => $array['id'],
            "email" => $array['email'],
            "firstname" => $array['firstname'],
            "lastname" => $array['lastname'],
            "biography" => $array['biography'],
            "profile" => $array['profile'],
            "fullname" => $array['firstname']." ".$array['lastname'],
            "access" => $array['access']
        );
        return $_SESSION['userdata'];
    }

    public function get_session(){

        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['userdata'])) {
            return $_SESSION['userdata'];
        } else {
            return null;
        }
    }

    public function signout() {
        
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']);
    }

}
?>