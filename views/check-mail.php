<?php include('../components/navbar.php'); ?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Check your Email</h2>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

  <section id="check-mail">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-down">
            <img src="/eduLearn/images/checkemail.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-end">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Check your email</h3>
                  <p class="mb-4">We have sent a password recovery instructions to your email.</p>
                  <!-- Log in btn -->
                  <form action="https://mail.google.com/mail/" method="get" target="_blank">
                    <button class=" btn btn-block btn-primary col-md-12">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      &nbsp;Open your mail</button>
                  </form>
                  <!-- Password -->
                  <p class="mt-5">Did not receive the email? Check your spam filter.<!-- <br> or <a href="forgot-password.php" class="">try another email address</a> --></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php include('../components/footer.php'); ?>