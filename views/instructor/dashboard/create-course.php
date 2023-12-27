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
              <form class="forms-sample" method="post">
                <!-- Course Title -->
                <div class="form-group">
                  <label>Course Title</label>
                  <input type="text" class="form-control form-control-sm border-primary" placeholder="e.g. 'Advanced Front-end Development'" required>
                </div>
                <!-- Course Difficulty -->
                <div class="form-group mb-3 ">
                  <label>Course Difficulty</label>
                  <select class="form-select border-primary" id="position" name="position" required>
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                  </select>
                </div>
                <!-- Continue btn -->
                <input type="submit" value="Continue" name="createCourse" class="btn btn-gradient-primary mt-3 me-2">
                <p class="mt-4">
                  <i>Pakidelete kapag tapos na!</i><br>
                  Pa route nalang 'to sa <b>course-setup.php</b> kapag nalagyan mo na 'to ng function sa continue button
                </p>
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