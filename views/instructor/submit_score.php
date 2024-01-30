<?php
ob_start();
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/eduLearn/components/navbar-instructor.php'); ?>
<?php $courses = view_student_submitted_task($_GET['task_id'], $_GET['student_id']); ?>

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
<!-- Your HTML content goes here -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $courses['course'] ?> - <?= $courses['title'] ?></h2>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
        <div class="row">
                <div class="col-md-8">
                    <h3 class="fw-bold">Due Date: <?= $courses['deadline'] ?></h3>
                    <h5>Task Created : <?= $courses['created_at'] ?></h5><br><br>
                    <p class="lead"><?= $courses['description'] ?></p>
                    
                    <?php if (isset($courses['file'])) : ?>
                    <img src="\eduLearn\views\instructor\dashboard\uploads\post\<?= $courses['file'] ?>" class="img-fluid" alt="">
                    <video src="\eduLearn\views\instructor\dashboard\uploads\post\<?= $courses['file'] ?>"></video>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <?php update_score(); ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <label for="file" class="form-label"><?= isset($courses['student_score']) ? $courses['student_score'] : '' ?> / <?= $courses['score'] ?></label><br>
                                    <input type="number" class="form-control" id="score" name="score" required>
                                </div>
                                <input type="hidden" name="student_id" value="<?= $_GET['student_id'] ?>">
                                <input type="hidden" name="task_id" value="<?= $_GET['task_id']?>">

                                <button type="submit" name="submit_score" class="btn btn-success btn-block">Submit Score</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->

<?php 
/* include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__footer.php'); */
include('../../components/footer.php');
  ?>