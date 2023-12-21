<?php
function login() {

    if(isset($_POST['submit'])) {

        $role = $_POST['role'];

        if($role == 'student') {
            $login = new Login();
            $login->studentLogin();
        } 
        else if($role == 'instructor') {
            $login = new Login();
            $login->instructorLogin();
        }
        else {
            $login = new Login();
            $login->adminLogin();
        }
    }
}
function access() {
    $login = new Login();
    $access = $login->get_session();

    if ($access['access'] == 'admin') {
        header("Location: /edulearn/views/admin/index.php");
    } else if ($access['access'] == 'user') {
        header("Location: /edulearn/views/home-page.php");
    } else if ($access['access'] == 'instructor') {
        header("Location: /edulearn/views/instructor/index.php");
    } else {
        header("Location: /edulearn/views/index.php");
    }
}

function sendOTP() {
    $student = new StudentRegistration();
    $student->studentRegistration();
}
function resendOTP() {

    $resendOTP = new StudentRegistration();
    $resendOTP->resendOTP();
}
function verifyOTP() {

    $verifyOTP = new StudentRegistration();

    if(isset($_POST['submit'])) {

        $otp1 = $_POST['otp1'];
        $otp2 = $_POST['otp2'];
        $otp3 = $_POST['otp3'];
        $otp4 = $_POST['otp4'];
        $otp5 = $_POST['otp5'];
        $otp6 = $_POST['otp6'];

        $verifyOTP->verifyOTP($otp1,$otp2,$otp3,$otp4,$otp5,$otp6);
    }
}

function forgotPassword() {
    $forgotPassword = new Forgot_password();

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];

        $forgotPassword->validateEmail($email);
    }
}

function resetPassword() {

    if (!isset($_GET['token'])) {

        header("Location: signin.php");
        exit(); 
        
    } else {

        $resetPassword = new Forgot_password();
        $resetPassword->resetPassword();

    }
}

function sendApplication() {
    $application = new InstructorRegistration();
    $application->instructorRegistration();
}

function applicants() {
    $applicants = new View();
    $applicants->applicants();
}
?>