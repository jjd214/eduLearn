<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__header.php'); ?>
<?php access(); ?>
<style>
  .table {
    zoom: 80%;
    -moz-transform: scale(0.8);
  }
</style>

<?php 
if (isset($_SESSION['status'])) {
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
?>
<?php applicants(); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__footer.php'); ?>

