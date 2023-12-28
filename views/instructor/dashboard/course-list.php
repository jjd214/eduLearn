<?php include('./partials/__header.php'); ?>


<div class="container-scroller">
  <!-- components:components/navbar.php -->
  <?php include('./components/navbar.php'); ?>
  <div class="container-fluid page-body-wrapper">
    <!-- components:components/sidebar.php -->
    <?php include('./components/sidebar.php'); ?>
    <!-- Main Panel -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-format-list-bulleted "></i>
            </span> Course List
          </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <a href="create-course.php" class="btn btn-primary btn-rounded btn-fw">
                <i class="mdi mdi-plus"></i>
                Create Course
              </a>
              <?= viewCourseList(); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include('./partials/__footer.php'); ?>