<?php
function login() {
    $login = new Login();
    $login->login();
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
    $student = new Registration();
    $student->studentRegistration();
}
function resendOTP() {

    $resendOTP = new Registration();
    $resendOTP->resendOTP();
}
function verifyOTP() {

    $verifyOTP = new Registration();

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
    $application = new Application();
    $application->instructorRegistration();
}

function resendOTPApplication() {

    $resendOTP = new Application();
    $resendOTP->resendOTP();
}
function verifyOTPApplication() {

    $verifyOTP = new Application();

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

function applicants() {
    $applicants = new View();
    $applicants->applicants();
}
?>