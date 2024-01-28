<?php
ob_start();
// session_start();    
include('../../../components/navbar-student.php');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    .bg-primary {
        background-color: var(--chelsea-200) !important;
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
            <div class="col-md-4 stretch-card grid-margin">
                <a href="#">
                    <div class="card bg-primary card-img-holder text-white">
                        <div class="card-body text-dark">
                            <img src="/eduLearn/views/instructor/dashboard/uploads/" alt="Course image" height="250" width="100%">
                            <h4 class="font-weight-normal fw-bold card-title ">
                               Course Title
                            </h4>
                            <h6>Difficulty : </h6>
                            <!-- <h6>Course Description <?php /* $course['description'] */ ?></h6> -->
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../../components/footer.php'); ?>