<?php
// session_start();
ob_start();
?>
<?php include('../../components/navbar-student.php'); ?>
<!-- style -->
<style>
    .card {
        border: 0;
        background: #fff;
    }

    .card .card-body {
        padding: 1rem 1rem;
    }

    .card .card-body+.card-body {
        padding-top: 1rem;
    }

    .card .card-title {
        text-transform: capitalize;
    }

    .card .card-subtitle {
        margin-top: 0.625rem;
        margin-bottom: 0.625rem;
    }

    .card .card-description {
        color: #76838f;
        margin-bottom: 1.5rem;
    }

    .card.card-img-holder {
        position: relative;
    }

    .card.card-img-holder .card-img-absolute {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
    }

    .bg-primary {
        background-color: var(--chelsea-200) !important;
    }

    @media (max-width: 767px) {
        .stretch-card {
            margin-bottom: 20px;
        }
    }
</style>

<main id="main">
    <section class="inner-page mt-5">
        <div class="container">
            <!-- Boxes -->
            <div class="row">

                <div class="col-md-8">
                    <div>
                        <div>
                            <h1>User Full Name</h1>
                        </div>
                        <!-- Itong row mt-3 na 'to lalabas lang kapag instructor profile -->
                        <div class="row mt-3">
                            <div class="col-md-6 ">
                                <div class="fw-bold">Total Students</div>
                                <div class="fs-3 fw-bolder">123</div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="fw-bolder fs-4 mb-2">About Me</div>
                            <h5>User Biography. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid harum cumque illo quidem. Suscipit, esse.</h5>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <span class="fs-4 fw-bold">My Courses/Learning (5 = number of courses ni instructor/user)</span>
                        <hr>
                        <div class="card-body">
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
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="/eduLearn/uploads/default-user-male.svg" height="350" width="350"  alt="profile image">

                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include('../../components/footer.php'); ?>