<?php include('./partials/__header.php'); ?>
<?php

if(isset($userid)) {
  // echo '<script> alert("POTANGINA");</script>';
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
                <button type="submit" name="delete" class="btn btn-primary"><i class="mdi mdi-delete-forever"></i> Delete </button>
              </div>
            </form>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-6">
            <!-- Course Title -->
            <div class="card mb-3">
              <div class="card-body">
                <h4 class="card-title">Course Title</h4>
                <?= updateTitle(); ?>
                <!-- Form -->
                <form method="post">
                  <div class="form-group">
                    <input type="hidden" name="instructorID" value="<?= $userid ?>">
                    <input type="text" class="form-control form-control-sm border-primary" name="title" placeholder="e.g. 'Advanced Front-end Development'" required>
                    <input type="submit" name="course-title" class="btn btn-primary mt-3" value="Edit">
                  </div>
                </form>
              </div>
            </div>
            <!-- Course Difficulty -->
            <div class="card mb-3">
              <div class="card-body">
                <h4 class="card-title">Course Difficulty</h4>
                <?= updateDifficulty(); ?>
                <!-- Form -->
                <form method="post">
                  <div class="form-group">
                    <select class="form-select border-primary" id="position" name="difficulty" required>
                      <option value="beginner" selected>Beginner</option>
                      <option value="intermediate">Intermediate</option>
                      <option value="advanced">Advanced</option>
                    </select>
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
                <!-- Form -->
                <form method="post">
                  <div class="form-group">
                    <textarea class="form-control border-primary" name="description" id="" rows="5"></textarea>
                    <input type="hidden" name="instructorID" value="<?= $userid ?>">
                    <input type="submit" name="course-description" class="btn btn-primary mt-3" value="Submit">
                  </div>
                </form>
              </div>
            </div>
            <!-- Course Image -->
            <div class="card mb-3">
              <div class="card-body">
                <h4 class="card-title">Course Image</h4>
                <img class="form-control object-fit-cover border-0" height="300" src="/eduLearn/uploads/placeholder.PNG" alt />
                <!-- Form -->
                <form method="post">
                  <div class="mb-3">
                    <input class="form-control" type="file" name="course-image" id="course-image" accept="image/jpeg, image/jpg, image/png">
                  </div>
                  <input type="submit" name="upload-course-image" class="btn btn-primary" value="Save Image">
                </form>
              </div>
            </div>
          </div>
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
                    <label for="exampleInputEmail1">Chapter Thumpnail</label>
                    <input class="form-control" type="file" name="course-image" id="course-image" accept="image/jpeg, image/jpg, image/png" required>
                  </div>

                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                </form>
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