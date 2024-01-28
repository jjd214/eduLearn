<?php
ob_start();
// session_start();    
include('../../components/navbar-student.php');
?>

<style>
    .bg-primary {
        background-color: var(--chelsea-200) !important;
    }
</style>

<?php
$course = getCourse($_GET['course']);
$details = view_course_details($_GET['course']);
$instructor = get_instructor($course['instructor_id']);
?>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <span><a href="/eduLearn/views/student/home-page.php">Homepage</a>&nbsp;/&nbsp;<a href="/eduLearn/views/student/roadmap/full-stack.php">Front, Back at, Full-Stack Development</a>&nbsp;/&nbsp; Course Name Dito</span>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <!-- Boxes -->
            <div class="row">

                <div class="col-md-8">
                    <div>
                        <h1><?= $course['title'] ?></h1>
                        <h5><?= $course['description'] ?></h5>
                    </div>
                    <div>
                        <span class="fw-bold bg-primary text-dark p-1"><?= $course['difficulty'] ?> Course</span>
                        <h5 class="mt-2">Created by <a href="#" class="text-primary">Instructor <?= $instructor['firstname']. " ".$instructor['lastname'] ?></a></h5>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <span class="fs-4 fw-bold">Course content</span>
                        </div>
                        <div class="card-body">
                            <?php foreach($details as $video) : ?>
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <p class="card-text text-center"><i class="bi bi-play-btn-fill"></i></p>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text"><?= $video['video_title'] ?></p>
                                </div>
                                <div class="col-md-1">
                                    <p class="card-text">02:30</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="/eduLearn/views/instructor/dashboard/uploads/<?= $course['thumbnail'] ?>" class="h-80 w-100 p-2">
                    <a class="btn btn-primary mt-2 w-100" href="courses/course.php?course=<?= $course['id'] ?>">Go to course</a>
                </div>


            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>