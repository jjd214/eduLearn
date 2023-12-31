<?php
// session_start();
ob_start();
?>
<?php include('../../components/navbar-student.php'); ?>
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
        <?php $fullname = viewFullName($_SESSION['student_data']['studentID'], $_SESSION['student_data']['userType']); ?>
        <h2>Let's Start Learning <?= $fullname; ?></h2>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <!-- Boxes -->
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <a href="./roadmap/front-end.php">
            <div class="card bg-success card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">front-end development
                </h4>
                <img src="../../images/front-end.svg" class="card-img-absolute" />
                <!-- <h6>Total students ni instructor sa kaniyang course</h6> -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <a href="./roadmap/back-end.php">
            <div class="card bg-info card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">back-end development
                </h4>
                <img src="../../images/back-end.svg" class="card-img-absolute" />
                <!-- <h6 class="card-text">Total uploaded videos ni Instructor</h6> -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <a href="./roadmap/full-stack.php">
            <div class="card bg-warning card-img-holder text-white">
              <div class="card-body">
                <h4 class="font-weight-normal mb-5 card-title">full-stack development
                </h4>
                <img src="../../images/full-stack.svg" class="card-img-absolute" alt="circle-image" />
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
<?php include('../../components/footer.php'); ?>