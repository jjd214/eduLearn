<?php

ob_start();
// session_start();    

?>
<?php include('../../components/navbar-student.php'); ?>

<?php $details = view_course_details($_GET['course'])?>

<?php foreach($details as $course) : ?>

    <h1><?= $course['video_title'] ?></h1>
    <h1><?= $course['description'] ?></h1>
    <h1><?= $course['thumbnail'] ?></h1>
    <h1><?= $course['video'] ?></h1>
    <h1><?= $course['created_at'] ?></h1>

    <br>

<?php endforeach; ?>

<?php include('../../components/footer.php'); ?>