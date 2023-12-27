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
            </span> Courses
          </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary btn-rounded btn-fw">
                <i class="mdi mdi-plus"></i>  
                Upload Course
              </button>
              <table class="mt-3 table table-bordered table-striped table-hover">
                <!-- Test Data -->
                <thead>
                  <tr>
                    <th> Course ID</th>
                    <th> Roadmap </th>
                    <th> Course Title </th>
                    <th> Enrolled Students </th>
                    <th> Created </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>8</td>
                    <td> Front-end </td>
                    <td> HTML/CSS Course </td>
                    <td>15</td>
                    <td>Dec-26-2023</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-primary btn-rounded">
                        Edit
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
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