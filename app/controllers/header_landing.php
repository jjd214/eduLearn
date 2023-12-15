<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>EduLearn</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../../public/assets/img/LogoNormal.png" rel="icon" />
  <link href="../../public/assets/img/LogoNormal.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="../../public/assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="../../public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="../../public/assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <!-- <h1><a href="#">EduLearn</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="landing.php"><img src="../../public/assets/img/LogoNormal.png" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li>
            <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'landing.php') ? 'active' : ''; ?>" href="landing.php#hero">Home</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="landing.php#program">Programs</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="landing.php#faq">F.A.Q</a>
          </li>
          <!-- Pwede Magamit Later on -->
          <!-- <li class="dropdown">
            <a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown">
                <a href="#"><span>Deep Drop Down</span>
                  <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li>
            <a class="nav-link scrollto" href="landing.php#contact">Contact Us</a>
          </li>
          <li>
            <a class="nav-link" href="instructor_application.php">Become an Instructor</a>
          </li>
          <li>
            <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>" id="login" href="login.php">Login</a>
          </li>
          <li>
            <a class="getstarted scrollto" href="register_student.php">Join Now</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->