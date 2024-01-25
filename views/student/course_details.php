<?php

ob_start();
// session_start();    

?>
<?php include('../../components/navbar-student.php'); ?>

<?php 
if(isset($_SESSION['course_id'])) {
    $details = view_course_details($_SESSION['course_id']);
} else {
    echo '<script>alert("note set")</script>';
}
?>

<?php foreach($details as $course) : ?>

    <h1><?= $course['video_title'] ?></h1>
    <h1><?= $course['description'] ?></h1>
    <h1><?= $course['thumbnail'] ?></h1>
    <h1><?= $course['video'] ?></h1>
    <h1><?= $course['created_at'] ?></h1>

    <br>

<?php endforeach; ?>

<?php include('../../components/footer.php'); ?>