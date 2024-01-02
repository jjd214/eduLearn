<?php
// session_start();
ob_start();
?>
<?php include('../../../components/navbar-student.php'); ?>
<!-- style -->
<style>
  .card {
    border: 0;
    background: #fff;
  }

  .card .card-body {
    padding: 2.5rem 2.5rem;
  }

  .card .card-body+.card-body {
    padding-top: 1rem;
  }

  .card .card-title {
    text-transform: capitalize;
  }

  .card .card-subtitle {
    margin-top: 0.625rem;
    margin-bottom: 0.625rem;
  }

  .card .card-description {
    color: #76838f;
    margin-bottom: 1.5rem;
  }

  .card.card-img-holder {
    position: relative;
  }

  .card.card-img-holder .card-img-absolute {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
  }

  @media (max-width: 767px) {
    .stretch-card {
      margin-bottom: 20px;
    }
  }
</style>

<main id="main">
  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><b>Back-End Development</b> Courses</h2>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <!-- Boxes -->
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <a href="#">
            <div class="card bg-secondary card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">Course 1
                </h4>
                <h6>Ipapakita sa card dito from course_tbl ay thumbnail, title, difficulty, description </h6>
                <h6>Ofc papalitan ko pa ang shape nito </h6>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <a href="#">
            <div class="card bg-danger card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">Course 2
                </h4>
                <h6>Ipapakita sa card dito from course_tbl ay thumbnail, title, difficulty, description </h6>
                <h6>Ofc papalitan ko pa ang shape nito </h6>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <a href="#">
            <div class="card bg-info card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">Course 3
                </h4>
                <h6>Ipapakita sa card dito from course_tbl ay thumbnail, title, difficulty, description </h6>
                <h6>Ofc papalitan ko pa ang shape nito </h6>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
<?php include('../../../components/footer.php'); ?>