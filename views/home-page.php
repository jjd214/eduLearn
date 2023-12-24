<?php
// session_start();
ob_start();
?>
<?php include('../components/navbar-home-page.php'); ?>

<main id="main">
  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
      <?php $fullname = viewFullName($_SESSION['userid']) ?>
        <h2>Let's Start Learning <?= $fullname; ?></h2>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <p>
        Test
      </p>
    </div>
  </section>
</main>
<!-- End #main -->
<?php include('../components/footer.php'); ?>