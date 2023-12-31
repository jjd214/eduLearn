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

    echo "<script>alert('napasa id'); </script>";
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
                        <h2>Manage "Course Title" Videos</h2>
                    </div>
                    <div class="row mt-3">
                        <!-- Left SIDE -->
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card" style="height: 575px;">
                                <div class="card-body">
                                    <h4 class="card-title">Chapter List</h4>
                                    <?= deleteChapter(); ?>
                                    <?= viewChapterList($_SESSION['courseid'],$userid); ?>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Create new chapter -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create a new chapter</h4>
                                    <?= uploadVideo(); ?>
                                    <?php
                                    if(isset( $_SESSION['video'])) {
                                        echo  $_SESSION['video'];
                                        unset( $_SESSION['video']);
                                    }
                                    ?>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Video Title</label>
                                            <input type="text" name="title" class="form-control border-primary" id="exampleInputUsername1" placeholder="Title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Video Description</label>
                                            <textarea class="form-control border-primary" name="description" id="" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chapter Video</label>
                                            <input class="form-control" type="file" name="course-video" id="course-video" accept="video/mp4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chapter Thumbnail</label>
                                            <input class="form-control" type="file" name="course-image" id="course-image" accept="image/jpeg, image/jpg, image/png" required>
                                        </div>

                                        <input type="hidden" name="courseID" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">
                                        <input type="hidden" name="instructorID" value="<?= $userid ?>">
                                        <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                    </form>
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
