<?php
include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/php/init.php');

session_start();
ob_start();

if (isset($_SESSION['instructor_data'])) {
  $userid = $_SESSION['instructor_data']['instructorID'];
  $usertype = $_SESSION['instructor_data']['userType'];
  $position = $_SESSION['instructor_data']['position'];
  //  echo "<script>alert('session set. UserID: $userid, UserType: $usertype, Position: $position');</script>"; 
} else {
  echo "<script>alert('session not set');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Instructor Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../images/LogoNormal.png" />
</head>

<body>