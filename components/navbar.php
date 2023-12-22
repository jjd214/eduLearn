<?php include('../partials/__header.php'); ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <!-- <h1><a href="#">EduLearn</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php"><img src="/eduLearn/images/LogoNormal.png" class="img-fluid"></a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li>
          <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php#hero">Home</a>
        </li>
        <li>
          <a class="nav-link scrollto" href="index.php#program">Programs</a>
        </li>
        <li>
          <a class="nav-link scrollto" href="index.php#faq">F.A.Q</a>
        </li>
        <li>
          <a class="nav-link scrollto" href="index.php#contact">Contact Us</a>
        </li>
        <li>
          <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'instructor-application.php') ? 'active' : ''; ?>" href="registration-instructor.php">Become an Instructor</a>
        </li>
        <li>
          <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>" id="login" href="login.php">Login</a>
        </li>
        <li>
          <a class="getstarted scrollto" href="registration-student.php">Join Now</a>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
<!-- End Header -->