<?php
ob_start();
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/eduLearn/components/navbar-instructor.php'); ?>
<?php $details = get_single_task_details($userid, $_GET['course_id']); ?>


<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <?php if ($details !== false) : ?>
                    <div class="col-md-8">
                        <h2 class="fw-bold"><?= $details['course'] ?> - <?= $details['title'] ?></h2>
                    </div>
                <?php else : ?>
                    <div class="col-md-12">
                        <p class="text-danger">Task details not found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="fw-bold">Due Date: <?= $details['deadline'] ?></h3>
                    <h5>Task Created : <?= $details['created_at'] ?></h5><br><br>
                    <p class="lead"><?= $details['description'] ?></p>
                    
                    <?php if (isset($details['file'])) : ?>
                    <img src="\eduLearn\views\instructor\dashboard\uploads\post\<?= $details['file'] ?>" class="img-fluid" alt="">
                    <video src="\eduLearn\views\instructor\dashboard\uploads\post\<?= $details['file'] ?>"></video>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>
