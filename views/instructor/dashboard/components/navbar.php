<style>
  .dropdown .dropdown-menu .dropdown-item:hover {
    color: #B66DFF !important;
  }
</style>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="instructor-dashboard.php"><img src="../../../images/logo-long.svg" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="instructor-dashboard.php"><img src="../../../images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Search videos">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <!-- Back to Homepage -->
      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="../home-page.php">
          <i class="mdi mdi-home "></i>
        </a>
      </li>
      <!-- Profile dropdown -->
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <?php $profile = viewProfilePicture($userid, $usertype); ?>
          <?php
          $defaultImage = 'default-user-male.svg'; // Default image for male

          if (isset($userid)) {
            $fetch = new AccountSettings();
            $userData = $fetch->getData($userid, $usertype);

            // Check if the user is female, then set the default image accordingly
            if ($userData['gender'] == 'female') {
              $defaultImage = 'default-user-female.svg'; // Default image for female
            }
          }
          ?>
          <?php $fullname = viewFullName($userid, $usertype) ?>
          <div class="nav-profile-img">
            <img src="/eduLearn/uploads/<?= $profile ? $profile : $defaultImage ?>" class="avatar object-fit-cover" alt="Avatar">
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black"><?= $fullname ?></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="../profile-settings.php">
            <i class="mdi mdi mdi-settings me-2 text-success"></i> Settings </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="mdi mdi-power me-2 text-primary"></i> Logout </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>