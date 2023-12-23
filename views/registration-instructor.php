<?php
include('../components/navbar.php');
/* include('../partials/__header.php'); */
?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Instructor Application</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Instructor Application</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="register">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-start">
              <div class="col-md-12">
                <div class="mb-4">
                  <h3>Instructor Application</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <?php sendApplication(); ?>
                <form method="post">
                  <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" name="firstname" class="form-control" id="floatingInput" placeholder="fname" required>
                        <label for="floatingInput">First Name</label>
                      </div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" name="lastname" class="form-control" id="floatingInput" placeholder="lname" required>
                        <label for="floatingInput">Last Name</label>
                      </div>
                    </div>
                  </div>
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

                  <!-- Repeat Password -->
                  <div class="form-floating mb-3">
                    <input type="password" name="confirmPassword" class="form-control" id="floatingPassword" placeholder="repeatPassword" required>
                    <label for="floatingPassword">Repeat your Password</label>
                  </div>

                  <!-- Age -->
                  <div class="form-floating mb-3">
                    <input type="number" name="age" class="form-control" id="age" name="age" placeholder="Your Age" required>
                    <label for="age">Your Age</label>
                  </div>

                  <!-- Position -->
                  <div class="form-floating mb-3">
                    <select class="form-select" id="position" name="position" required>
                      <option value="" selected disabled></option>
                      <option value="frontend">Frontend</option>
                      <option value="backend">Backend</option>
                      <option value="mobile">Mobile</option>
                      <option value="fullstack">Full Stack</option>
                    </select>
                    <label for="position">Position Applying For</label>
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
                  </div>

                  <input type="submit" name="submit" value="Send Application" class="mt-4 btn btn-block btn-primary col-md-12">

                  <p class="mt-5">Already have an account? <a href="login.php" class="">Log in here</a></p>

                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <img src="/eduLearn/images/instructor.svg" alt="Image" class="img-fluid" data-aos="fade-down">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include('../components/footer.php'); ?>