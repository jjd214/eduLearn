<?php
ob_start();
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/eduLearn/components/navbar-instructor.php'); ?>
<?php $tasks =  view_student_submit($userid); ?>
<!-- Your HTML content goes here -->
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <?php $fullname = viewFullName($_SESSION['instructor_data']['instructorID'], $_SESSION['instructor_data']['userType']); ?>
                <h2>Let's Start Teaching <?= $fullname; ?></h2>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
                    
                            <table class="mt-3 table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Course</th>
                                        <th>Task</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tasks as $student) : ?>
                                    <tr>
                                        <td><?= $student['student_id'] ?></td>
                                        <td><?= $student['firstname']. " " .$student['lastname'] ?></td>
                                        <td><?= $student['email'] ?></td>
                                        <td><?= $student['course'] ?></td>
                                        <td><?= $student['title'] ?></td>
                                        <td><a href="submit_score.php?task_id=<?= $student['task_id'] ?>&student_id=<?= $student['student_id'] ?>">View</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>