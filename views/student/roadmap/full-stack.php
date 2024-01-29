<?php
// session_start();
ob_start();
?>
<?php include('../../../components/navbar-student.php'); ?>
<?php $courses = view_fullstack_course(); ?>
<!-- style -->
<style>
    .card {
        border: 0;
        background: #fff;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card .card-body {
        padding: 1rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card .card-title {
        text-transform: capitalize;
        font-size: 17px;
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
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <span><a href="/eduLearn/views/student/home-page.php">Homepage</a>&nbsp;/<a>&nbsp;Full-Stack Development</a></span>
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
                                <div class="card-body text-dark">
                                    <img src="/eduLearn/views/instructor/dashboard/uploads/<?= $course['thumbnail'] ?>" alt="Course image" height="200" width="275">
                                    <h4 class="font-weight-normal fw-bold card-title mt-2">
                                        <?= $course['title'] ?>
                                    </h4>
                                    <h6 style="font-size: 15px;">Difficulty: <?= $course['difficulty'] ?></h6>
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
