<?php
ob_start();
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/eduLearn/components/navbar-instructor.php'); ?>
<?php $courses = view_course_task($userid, $_GET['course_id']); ?>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Created Tasks</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <?php foreach ($courses as $course) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= $course['title'] ?></h5>
                                <p class="card-text"><?= $course['description'] ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="task_details.php?course_id=<?= $course['course_id'] ?>" class="btn btn-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>
