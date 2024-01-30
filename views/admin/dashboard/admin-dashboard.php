<?php include('./partials/__header.php'); ?>

<?php

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
          <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Students <i class="mdi mdi-account-multiple-plus mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= get_total_students() ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Instructors <i class="mdi mdi-account-card-details mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= get_total_instructor() ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Courses <i class="mdi mdi-book-open mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= get_total_course() ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
              <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Videos <i class="mdi mdi-movie mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?= get_total_video() ?></h2>
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