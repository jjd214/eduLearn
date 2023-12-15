<?php
include('../controllers/header_landing.php');
?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Instructor Application</h2>
        <ol>
          <li><a href="landing.php">Home</a></li>
          <li>Instructor Application</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="register">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 contents">
            <div class="row justify-content-start">
              <div class="col-md-12">
                <div class="mb-4">
                  <h3>Instructor Application</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <form action="#" method="post">
                  <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="fname" required>
                        <label for="floatingInput">First Name</label>
                      </div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="lname" required>
                        <label for="floatingInput">Last Name</label>
                      </div>
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <!-- Password -->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                  <!-- Repeat Password -->
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="repeatPassword" required>
                    <label for="floatingPassword">Repeat your Password</label>
                  </div>

                  <!-- Gender -->
                  <div>
                    <h3>Gender</h3>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male" required>
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female" required>
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="none" required>
                      <label class="form-check-label" for="inlineRadio3">Prefer not to say</label>
                    </div>
                  </div>

                  <input type="submit" value="Sign Up" class="mt-4 btn btn-block btn-primary col-md-12">

                  <p class="mt-5">Already have an account? <a href="login.php" class="">Log in here</a></p>

                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <img src="../../public/assets/img/instructor.svg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php
include('../controllers/footer_landing.php');
?>