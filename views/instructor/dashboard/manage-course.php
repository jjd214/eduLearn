<?php include('./partials/__header.php'); ?>
<?php
ob_start();

if (isset($userid)) {
    // echo '<script> alert("POTANGINA");</script>';
}

if (isset($_POST['id'])) {
    $_SESSION['courseId'] = $_POST['id'];
    $courseid = $_SESSION['courseId'];
    $_SESSION['courseid'] = $courseid;
} else {
    echo "Error: Instructor ID not provided.";
}

if (isset($_SESSION['lastInsertedCourseId'])) {
    /* echo '<script> alert("POTANGINA");</script>'; */
}

$fetch = new CourseEntity();
$userData = $fetch->getData($_SESSION['courseid'] ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId']);

if (empty($userData)) {
    echo "walang laman.";
}
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
                                    <table class="table mt-3 table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Video Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Fb clone</td>
                                                <td class="d-flex">
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="id" value="">
                                                        <input type="hidden" name="" value="">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Edit
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content" style="background-color: white;">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit the Chapter</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="forms-sample">
                                                                            <div class="row">
                                                                                <!-- Left Column: Chapter Title and Video Description -->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputUsername1">Chapter Title</label>
                                                                                        <input type="text" class="form-control border-primary" id="exampleInputUsername1" style="margin-top: 8px;" placeholder="Chapter Title" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Video Description</label>
                                                                                        <textarea class="form-control border-primary" name="" id="" rows="5" style="height: 205px;"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Chapter Video</label>
                                                                                        <input class="form-control" type="file" name="course-video" id="course-video" accept="video/mp4" required>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Right Column: Chapter Video and Thumbnail -->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Chapter Thumbnail</label>
                                                                                        <div class="mt-2 mb-2" style="width: 100% !important;">
                                                                                            <img src="/eduLearn/views/instructor/dashboard/uploads/placeholder.png" style="width: 100% !important;" />
                                                                                        </div>
                                                                                        <input class="form-control" type="file" name="course-image" id="course-image" style="margin-top: 43px;" accept="image/jpeg, image/jpg, image/png" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <button type="submit" class="btn btn-gradient-primary me-2">Edit Chapter</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <form method="post" class="ms-1">
                                                        <input type="hidden" name="id" value="">
                                                        <input type="hidden" name="" value="">
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Create new chapter -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create a new chapter</h4>
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Video Title</label>
                                            <input type="text" class="form-control border-primary" id="exampleInputUsername1" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Video Description</label>
                                            <textarea class="form-control border-primary" name="" id="" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chapter Video</label>
                                            <input class="form-control" type="file" name="course-video" id="course-video" accept="video/mp4" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chapter Thumbnail</label>
                                            <input class="form-control" type="file" name="course-image" id="course-image" accept="image/jpeg, image/jpg, image/png" required>
                                        </div>

                                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
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
