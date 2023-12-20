<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__header.php'); ?>

<?php
// accept-application.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Print the values received from the form
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Further processing based on your requirements
    $id = $_POST['id'];

    // Perform any additional logic here...
}

$accept = new Application();
$accept->acceptApplication($id);

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__footer.php'); ?>
