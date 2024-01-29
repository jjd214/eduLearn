<?php
// session_start();
ob_start();
?>
<?php include('../../components/navbar-student.php'); ?>
<?php $tasks = view_task_details($_GET['task']); ?>

<main id="main">

    <!-- Breadcrumbs Section -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fw-bold"><?= $tasks['course'] ?> - <?= $tasks['title'] ?></h2>
                </div>
                <div class="col-md-4 text-end">
                    <h2 class="text-muted"><?= $tasks['created_at'] ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->
    <?php submit_task(); ?>
    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="fw-bold">Due Date: <?= $tasks['deadline'] ?></h3>
                    <p class="lead"><?= $tasks['description'] ?></p>
                    
                    <?php if (isset($tasks['file'])) : ?>
                        <img src="\eduLearn\views\instructor\dashboard\uploads\post\<?= $tasks['file'] ?>" class="img-fluid" alt="">
                        <a href="\eduLearn\views\instructor\dashboard\uploads\post\<?= $tasks['file'] ?>" target="_blank" class="btn btn-primary mt-3">View File</a>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload File:</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>
                                <input type="hidden" name="student_id" value="<?= $userid ?>">
                                <input type="hidden" name="task_id" value="<?= $_GET['task_id']?>">
                                <button type="submit" name="submit" class="btn btn-success btn-block">Turn in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include('../../components/footer.php'); ?>
