<?php include('../components/navbar.php'); ?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center" id="login">
        <h2>Reset Password</h2>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="reset">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-down">
            <img src="/eduLearn/images/reset.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-end">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Create New Password</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <?php resetPassword(); ?>
                <form method="post">
                  <!-- Password -->
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" name="newpassword" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">New Password</label>
                  </div>

                  <!-- Repeat Password -->
                  <div class="form-floating mb-3">
                    <input type="password" name="confirmPassword" class="form-control" name="confirmnewPassword" id="floatingPassword" placeholder="confirmPassword" required>
                    <label for="floatingPassword">Confirm your new Password</label>
                  </div>

                  <!-- Log in btn -->
                  <input type="submit" name="submit" value="Reset Password" class="mt-4 btn btn-block btn-primary col-md-12">

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