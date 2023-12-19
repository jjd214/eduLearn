<?php include('../components/navbar.php'); ?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center" id="login">
        <h2>Forgot Password</h2>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="forgot">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-down">
            <img src="/eduLearn/images/forgot.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-end">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Forgot Password</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <?php forgotPassword(); ?>
                <form method="post">
                  <!-- Email -->
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <!-- Send Instructions btn -->
                  <input type="submit" name="submit" value="Send Email Verification" class="mt-4 btn btn-block btn-primary col-md-12">
                  <!-- Log in -->
                  <p class="mt-5">I have remember my password <a href="login.php" class="">Sign in</a></p>

                </form>
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