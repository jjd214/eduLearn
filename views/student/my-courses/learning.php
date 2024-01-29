<?php
ob_start();
// session_start();    
include('../../../components/navbar-student.php');

$courses = view_student_course($userid);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    .bg-primary {
        background-color: var(--chelsea-200) !important;
    }

    .card-body {
        height: 270px; /* Set a fixed height for all cards */
    }
</style>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>My Learning</h1>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <!-- Boxes -->
            <div class="row">
                <?php foreach ($courses as $index => $course) : ?>
                    <div class="col-md-3 stretch-card grid-margin">
                        <a href="/eduLearn/views/student/course_details.php?course=<?= $course['id'] ?>">
                            <div class="card bg-primary card-img-holder text-white">
                                <div class="card-body d-flex flex-column text-dark">
                                    <img src="/eduLearn/views/instructor/dashboard/uploads/<?= $course['thumbnail'] ?>" alt="Course image" height="100%" width="100%">
                                    <h4 class="font-weight-normal fw-bold card-title" style="font-size: 17px">
                                        <?= $course['title'] ?>
                                    </h4>
                                    <h6>Difficulty: <?= $course['difficulty'] ?></h6>
                                    <!-- <h6>Course Description <?php /* $course['description'] */ ?></h6> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php if (($index + 1) % 4 == 0) : ?>
                        </div><div class="row">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../../components/footer.php'); ?>
