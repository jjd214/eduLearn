<?php include('../partials/__header.php'); ?>

<style>
  .search-box {
    position: relative;
  }

  .search-box input {
    padding-right: 35px;
    min-height: 38px;
    background: #fff;
    border-radius: 20px !important;
  }

  .search-box input:focus {
    background: #fff;
    box-shadow: none;
    border-color: var(--chelsea-400);
  }

  .search-box .input-group-addon {
    min-width: 35px;
    border: none;
    background: transparent;
    position: absolute;
    right: 0;
    z-index: 9;
    padding: 10px 7px;
    height: 100%;
  }

  .search-box i {
    color: var(--chelsea-400);
    font-size: 19px;
  }

  /* Image */

  .navbar img {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    margin-right: 10px;
  }

  .navbar .nav-item i {
    font-size: 18px;
  }

  .navbar .nav-item span {
    position: relative;
    top: 3px;
  }

  /* Dropdown */

  .navbar .navbar-nav>a {
    color: #efe5ff;
    padding: 8px 15px;
    font-size: 14px;
  }

  .navbar .navbar-nav>a:hover,
  .navbar .navbar-nav>a:focus {
    color: #fff;
    text-shadow: 0 0 4px rgba(255, 255, 255, 0.3);
  }

  .navbar .navbar-nav>a>i {
    display: block;
    text-align: center;
  }

  .navbar .dropdown-item i {
    font-size: 16px;
    min-width: 22px;
  }

  .navbar .dropdown-item .material-icons {
    font-size: 21px;
    line-height: 16px;
    vertical-align: middle;
    margin-top: -2px;
  }

  .navbar .nav-item.open>a,
  .navbar .nav-item.open>a:hover,
  .navbar .nav-item.open>a:focus {
    color: #fff;
    background: none !important;
  }

  .navbar .dropdown-menu {
    border-radius: 1px;
    border-color: #e5e5e5;
    margin-left: 30px;
    width: 85%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .2);
  }

  .navbar .dropdown-menu a {
    color: var(--abbey-700) !important;
    padding: 8px 20px;
    line-height: normal;
    font-size: 15px;
  }

  .navbar .dropdown-menu a:hover,
  .navbar .dropdown-menu a:focus {
    color: var(--chelsea-400) !important;
  }

  .navbar .navbar-nav .user-action {
    padding: 9px 15px;
    font-size: 15px;
  }

  .navbar .navbar-toggle {
    border-color: #fff;
  }

  .navbar .navbar-toggle .icon-bar {
    background: #fff;
  }

  .navbar .navbar-toggle:focus,
  .navbar .navbar-toggle:hover {
    background: transparent;
  }

  .navbar .navbar-nav .open .dropdown-menu {
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
  }

  .material-icons {
    user-select: none;
  }

  @media (max-width: 1900px) {
    .form-inline .input-group {

      padding: 0 20px 0 20px;
    }

    .search-box .input-group-addon {
      padding: 10px 30px;
    }

    .navbar .navbar-nav>a>i {
      display: inline-block;
      text-align: left;
      min-width: 30px;
      position: relative;
      top: 4px;
    }

    .navbar .navbar-collapse {
      border: none;
      box-shadow: none;
      padding: 0;
    }

    .navbar .navbar-form {
      border: none;
      display: block;
      margin: 10px 0;
      padding: 0;
    }

    .navbar .navbar-nav {
      margin: 8px 0;
    }

    .navbar .navbar-toggle {
      margin-right: 0;
    }

    .input-group {
      width: 100%;
    }

    .navbar .dropdown-menu {
      border: none;
      margin-left: 18px;
      width: 95%;
      box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0);
    }
  }
</style>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <!-- <h1><a href="#">EduLearn</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="home-page.php"><img src="/eduLearn/images/LogoNormal.png" class="img-fluid"></a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <!-- Searchbar -->

        <?php
        // Check if the current page is profile-settings.php
        $currentPage = basename($_SERVER['PHP_SELF']);
        if ($currentPage == 'profile-settings.php') {
        ?>
          <li>
            <!-- Dropdown for profile-settings.php only -->
            <div class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">
                <img src="../images/images-users/default-user-male.svg" class="avatar" alt="Avatar"> Juan Dela Cruz <b class="caret"></b>
              </a>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                <a href="profile-settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                <div class="divider dropdown-divider"></div>
                <a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
              </div>
            </div>
          </li>
        <?php
        } else {
          // Display a different item when not on profile-settings.php
        ?>
          <li>
            <form class="navbar-form form-inline">
              <div class="input-group search-box">
                <input type="text" id="search" class="form-control" placeholder="Search here...">
                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
              </div>
            </form>
          </li>
          <li>
            <a class="nav-link scrollto <?php echo (basename($_SERVER['PHP_SELF']) == 'home-page.php') ? 'active' : ''; ?>" href="home-page.php">
              Home
            </a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#">Explore</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#">My Learning</a>
          </li>
          <li>
            <!-- Dropdown for profile-settings.php only -->
            <div class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">
                <img src="../images/images-users/default-user-male.svg" class="avatar" alt="Avatar"> Juan Dela Cruz <b class="caret"></b>
              </a>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                <a href="profile-settings.php" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                <div class="divider dropdown-divider"></div>
                <a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
              </div>
            </div>
          </li>
        <?php
        }
        ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header>
<!-- End Header -->