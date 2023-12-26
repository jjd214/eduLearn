<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Name -->
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <?php $profile = viewProfilePicture($userid, $usertype); ?>
        <?php $defaultImage = 'default-user-male.svg' ?>
        <?php $fullname = viewFullName($userid, $usertype) ?>
        <div class="nav-profile-image">
          <img src="/eduLearn/uploads/<?= $profile ? $profile : $defaultImage ?>" class="avatar object-fit-cover" alt="Avatar">
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?= $fullname ?></span>
          <span class="text-secondary text-small"><?= $usertype ?></span>
        </div>
      </a>
    </li>
    <!-- Navigations -->
    <li class="nav-item">
      <a class="nav-link" href="instructor-dashboard.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-view-dashboard  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="courses.php">
        <span class="menu-title">Courses</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Students</span>
        <i class="mdi mdi-account-multiple  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../home-page.php">
        <span class="menu-title">Back to home page</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>