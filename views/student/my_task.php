<?php
// session_start();
ob_start();
?>
<?php include('../../components/navbar-student.php'); ?>
<?php $tasks = view_student_task($_SESSION['student_data']['studentID']); ?>
<main id="main">

 <!-- ======= Breadcrumbs Section ======= -->
 <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <?php $fullname = viewFullName($_SESSION['student_data']['studentID'], $_SESSION['student_data']['userType']); ?>
        <h2>To-Do List <?= $fullname; ?></h2>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">

        <?php foreach($tasks as $task) : ?>
            <a href="task_details.php?task=<?= $task['id'] ?>&task_id=<?= $task['id'] ?>"><li><?= $task['course'] . " - "?><?= $task['title'] ?></li></a>
        <?php endforeach; ?>
        </div>
    </section>

</main>








<?php include('../../components/footer.php'); ?>