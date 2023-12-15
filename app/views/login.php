<?php
include('../controllers/header_landing.php');
?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center" id="login">
        <h2>Login</h2>
        <ol>
          <li><a href="landing.php">Home</a></li>
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
            <img src="../../public/assets/img/login.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents" data-aos="fade-down">
            <div class="row justify-content-end">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Log In</h3>
                  <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                </div>
                <form action="#" method="post">
                  <!-- Email -->
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                  </div>
                  <!-- Password -->
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                  <div class="d-flex mt-2 align-items-center">
                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                  </div>

                  <input type="submit" value="Log In" class="mt-4 btn btn-block btn-primary col-md-12">

                  <p class="mt-5">Don't have an account? <a href="register_student.php" class="">Sign Up here</a></p>

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

<?php
include('../controllers/footer_landing.php');
?>