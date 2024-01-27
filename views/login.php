<?php include('../components/navbar.php'); ?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center" id="login">
        <h2>Login</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Login</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="login">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-down">
            <img src="/eduLearn/images/login.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-end">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Log In</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <?php login(); ?>
                <form method="post">
                  <!-- Email -->
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <!-- Password -->
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                  <!-- Log in as -->
                  <div class="mb-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="student" required>
                      <label class="form-check-label" for="inlineRadio1">Student</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="instructor" required>
                      <label class="form-check-label" for="inlineRadio2">Instructor</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="admin" required>
                      <label class="form-check-label" for="inlineRadio2">Admin</label>
                    </div>
                  </div>

                  <!-- Forgot Password -->
                  <div class="d-flex mt-2 align-items-center">
                    <span class="ml-auto"><a href="forgot-password.php" class="forgot-pass">Forgot Password</a></span>
                  </div>
                  <!-- Log in btn -->
                  <input type="submit" name="submit" value="Log In" class="mt-4 btn btn-block btn-primary col-md-12">
                  <!-- Sign Up -->
                  <p class="mt-5">Don't have an account? <a href="registration-student.php" class="">Sign Up here</a></p>

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