<?php include('./partials/__header.php'); ?>

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
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Name your Course</h4>
              <p class="card-description"> What would you like to name your couse? Don't worry you can always rename this later. </p>
              <!-- Form -->
              <?= createCourse(); ?>
              <form class="forms-sample" method="post">
                <!-- Course Title -->
                <div class="form-group">
                  <label>Course Title</label>
                  <input type="text" class="form-control form-control-sm border-primary" name="title" placeholder="e.g. 'Advanced Front-end Development'" required>
                </div>
                <!-- Course Difficulty -->
                <div class="form-group mb-3 ">
                  <label>Course Difficulty</label>
                  <select class="form-select border-primary" id="position" name="difficulty" required>
                    <option value="Beginner" selected>Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                  </select>
                </div>

                <input type="hidden" name="instructorID" value="<?= $userid ?>">
                <input type="hidden" name="position" value="<?= $position ?>">

                <!-- Continue btn -->
                <input type="submit" value="Continue" name="submit" class="btn btn-gradient-primary mt-3 me-2">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main-panel ends -->
</div>
<!-- container-scroller -->

<?php include('./partials/__footer.php'); ?>