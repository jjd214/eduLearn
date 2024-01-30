<?php include('./partials/__header.php'); ?>
<?php
ob_start();

if (isset($userid)) {
    // echo '<script> alert("User ID: ' . $userid . '");</script>';
}

if (isset($_POST['id'])) {
    $_SESSION['courseId'] = $_POST['id'];
    $courseid = $_SESSION['courseId'];
    $_SESSION['courseid'] = $courseid;

/*     echo "<script>alert('napasa id'); </script>"; */
}
if (isset($_SESSION['lastInsertedCourseId'])) {
    /* echo '<script> alert("POTANGINA");</script>'; */
}

// $fetch = new CourseEntity();
// $userData = $fetch->getData($_SESSION['courseid'] ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId']);

// if (empty($userData)) {
//     echo "walang laman.";
// }
?>

<style>
    .form-group img {
        width: 600px !important;
        height: 300px !important;
        border-radius: 0 !important;
    }
</style>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include('./components/navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php include('./components/sidebar.php'); ?>
        <!-- Main Panel -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6">
                        <h2>View "Course Title" Videos</h2>
                    </div>
                    <div class="row mt-3">
                        <!-- Left SIDE -->
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card" style="height: 575px;">
                                <div class="card-body">
                                    <h4 class="card-title">Chapter List</h4>
                                    <?php deleteChapter(); ?>
                                    <?php update_chapter() ?>
                                    <?php viewChapterList($_SESSION['courseid'], $userid); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
</div>
<!-- main-panel ends -->
</div>
<!-- container-scroller -->

<?php include('./partials/__footer.php'); ?>