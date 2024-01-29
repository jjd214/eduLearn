<?php include('./partials/__header.php'); ?>

<?php

if(isset($userid)) {
  echo '<script>alert("session set si instructor id");</script>';
}

?>
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
              <i class="mdi mdi-view-dashboard "></i>
            </span> Dashboard
          </h3>
        </div>
        <div class="row">
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Students <i class="mdi mdi-account-multiple-plus mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= viewTotalStudents($userid); ?></h2>
                <h6>Total students ni instructor sa kaniyang course</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Course <i class="mdi mdi-book-open mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= viewTotalCourse($userid); ?></h2>
                <h6 class="card-text">Total courses ni Instructor</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Videos <i class="mdi mdi-video mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">0</h2>
                <h6 class="card-text">Total uploaded videos ni Instructor</h6>
              </div>
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