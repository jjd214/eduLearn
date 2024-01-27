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
/* $details = view_course_details($_GET['course']);
foreach ($details as $course) : */ ?>

<!-- <h1><?php /* $course['video_title'] */ ?></h1>
    <h1><?php /* $course['description'] */ ?></h1>
    <h1><?php /* $course['thumbnail'] */ ?></h1>
    <h1><?php /* $course['video'] */ ?></h1>
    <h1><?php /* $course['created_at'] */ ?></h1> -->
<?php /* endforeach; */ ?>

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
                        <h1>Course Name Lorem ipsum dolor sit amet.</h1>
                        <h5>Course Description Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea atque inventore asperiores laborum facilis. Officia?</h5>
                    </div>
                    <div>
                        <span class="fw-bold bg-primary text-dark p-1">Advanced Course</span>
                        <h5 class="mt-2">Created by <a href="#" class="text-primary">Instructor Name</a></h5>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <span class="fs-4 fw-bold">Course content</span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <p class="card-text text-center"><i class="bi bi-play-btn-fill"></i></p>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text">Video 1</p>
                                </div>
                                <div class="col-md-1">
                                    <p class="card-text">02:30</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <p class="card-text text-center"><i class="bi bi-play-btn-fill"></i></p>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text">Video 2</p>
                                </div>
                                <div class="col-md-1">
                                    <p class="card-text">05:45</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <p class="card-text text-center"><i class="bi bi-play-btn-fill"></i></p>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text">Video 3</p>
                                </div>
                                <div class="col-md-1">
                                    <p class="card-text">12:15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="h-80 w-100 p-2">
                    <a class="btn btn-primary mt-2 w-100" href="courses/course.php">Go to course</a>
                </div>


            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>