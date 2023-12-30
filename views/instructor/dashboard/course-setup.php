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

if(isset($_SESSION['lastInsertedCourseId'])) {
    echo '<script> alert("POTANGINA");</script>';
}

    $fetch = new CourseEntity();
    $userData = $fetch->getData($_SESSION['courseid'] ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId']);

if(empty($userData)) {
    echo "walang laman.";
}

?>
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
                        <h2>Course setup</h2>
                        <p class="page-description mt-2">Complete all fields</p>
                    </div>
                    <!-- Publish btn -->
                    <div class="col-md-6">
                        <form method="post">
                            <!-- Dito yung form update ng visibility at delete -->
                            <div class="btn-group float-end" role="group">
                                <button type="submit" name="publish" class="btn btn-primary">Publish</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                                    <i class="mdi mdi-delete-forever"></i> Delete
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?= deleteCourse(); ?>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this course?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form method="post">
                            <input type="hidden" name="id" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">
                            <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <!-- Course Title -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title">Course Title</h4>
                                <?= updateTitle(); ?>
                                <?php
                                if (isset($_SESSION['title'])) {
                                    echo $_SESSION['title'];
                                    unset($_SESSION['title']);
                                }
                                ?>
                                <!-- Form -->
                                <form method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="courseID" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">
                                        <input type="hidden" name="instructorID" value="<?= $userid ?>">
                                        <input type="text"
                                            class="form-control form-control-sm border-primary" name="title"
                                            placeholder="e.g. 'Advanced Front-end Development'" value="<?= $userData['title']; ?>" required>
                                        <input type="submit" name="course-title" class="btn btn-primary mt-3"
                                            value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Course Difficulty -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title">Course Difficulty</h4>
                                <?= updateDifficulty(); ?>
                                <?php
                                if (isset($_SESSION['difficulty'])) {
                                    echo $_SESSION['difficulty'];
                                    unset($_SESSION['difficulty']);
                                }
                                ?>
                                <!-- Form -->
                                <form method="post">
                                    <div class="form-group">
                                        <select class="form-select border-primary" id="position" name="difficulty" required>
                                            <option value="Beginner" <?= ($userData['difficulty'] == 'Beginner') ? 'selected' : '' ?>>Beginner</option>
                                            <option value="Intermediate" <?= ($userData['difficulty'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                                            <option value="Advanced" <?= ($userData['difficulty'] == 'Advanced') ? 'selected' : '' ?>>Advanced</option>
                                        </select>
                                        <input type="hidden" name="courseID" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">
                                        <input type="hidden" name="instructorID" value="<?= $userid ?>">
                                        <input type="submit" name="course-difficulty" class="btn btn-primary mt-3" value="Edit">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Course Description -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title">Course Description</h4>
                                <?= updateDescription(); ?>
                                <?php
                                if (isset($_SESSION['description'])) {
                                    echo $_SESSION['description'];
                                    unset($_SESSION['description']);
                                }
                                ?>
                                <!-- Form -->
                                <form method="post">
                                    <div class="form-group">
                                        <textarea class="form-control border-primary" name="description" id=""
                                            rows="5"><?= is_null($userData['description']) ? '' : $userData['description']; ?></textarea>
                                        <input type="hidden" name="courseID" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">

                                        <input type="hidden" name="instructorID" value="<?= $userid ?>">
                                        <input type="submit" name="course-description" class="btn btn-primary mt-3"
                                            value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Course Image -->
                    <div class="col-md-6">
                        <div class="card" style="height: 800px;">
                            <div class="card-body">
                            <h4 class="card-title">Course Image</h4>
                                <?php $defaultImage = 'placeholder.png'; ?>

                                <img class="form-control object-fit-cover border-0" height="300"
                                src="/eduLearn/views/instructor/dashboard/uploads/<?= $userData['thumbnail'] ? $userData['thumbnail'] : $defaultImage ?>" alt />
                                <!-- Form -->
                                <?= updateThumbnail(); ?>
                                <?php
                                if (isset($_SESSION['thumbnail'])) {
                                    echo $_SESSION['thumbnail'];
                                    unset($_SESSION['thumbnail']);
                                }
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="course-image"
                                            id="course-image" />
                                        <input type="hidden" name="courseID" value="<?= isset($_SESSION['courseid']) ? $_SESSION['courseid'] : $_SESSION['lastInsertedCourseId'] ?>">
                                        <input type="hidden" name="instructorID" value="<?= $userid ?>">
                                    </div>
                                    <input type="submit" name="upload-course-image" class="btn btn-primary"
                                        value="Save Image">
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create a new chapter</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Video Title</label>
                                        <input type="text" class="form-control border-primary"
                                            id="exampleInputUsername1" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Description</label>
                                        <textarea class="form-control border-primary" name="" id="" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chapter Video</label>
                                        <input class="form-control" type="file" name="course-video"
                                            id="course-video" accept="video/mp4" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chapter Thumpnail</label>
                                        <input class="form-control" type="file" name="course-image"
                                            id="course-image" accept="image/jpeg, image/jpg, image/png" required>
                                    </div>

                                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- container-scroller -->

<?php include('./partials/__footer.php'); ?>
