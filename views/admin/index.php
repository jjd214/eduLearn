<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__header.php'); ?>

<style>
  .table {
    zoom: 80%;
    -moz-transform: scale(0.8);
  }

</style>

<?php 
ob_start();
session_start();

if (isset($_SESSION['accept_status'])) {
    echo $_SESSION['accept_status'];
    unset($_SESSION['accept_status']);
}
?>
<?php applicants(); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__footer.php'); ?>

