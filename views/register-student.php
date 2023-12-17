<?php include('../partials/__header.php'); ?>
<!-- include('../components/navbar.php'); -->
<!-- inalis ko muna yung sya yung cause ng problem. -->

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Student Registration</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Student Registration</li>
        </ol>
      </div>

    </div>
  </section>
  <!-- End Breadcrumbs Section -->

  <section id="register">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-start">
              <div class="col-md-12">
                <div class="mb-4">
                  <h3>Register</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                  <?php sendOTP(); ?>
                </div>
                <form method="post">
                  <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="fname" required>
                        <label for="floatingInput">First Name</label>
                      </div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="lname" required>
                        <label for="floatingInput">Last Name</label>
                      </div>
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <!-- Password -->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                  <!-- Repeat Password -->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="confirmPassword" id="floatingPassword" placeholder="repeatPassword" required>
                    <label for="floatingPassword">Repeat your Password</label>
                  </div>

                  <!-- Gender -->
                  <div>
                    <h3>Gender</h3>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="none" required>
                      <label class="form-check-label" for="inlineRadio3">Prefer not to say</label>
                    </div>
                  </div>

                  <input type="submit" value="Sign Up" name="submit" class="mt-4 btn btn-block btn-primary col-md-12">

                  <p class="mt-5">Already have an account? <a href="login.php" class="">Log in here</a></p>

                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <img src="/eduLearn/images/register.svg" alt="Image" class="img-fluid" data-aos="fade-down">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php include('../components/footer.php'); ?>