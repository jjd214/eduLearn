<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Name -->
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
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
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Course List</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="create-course.php"> Create Course </a></li>
          <li class="nav-item"> <a class="nav-link" href="course-list.php"> Course List </a></li>
        </ul>
      </div>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="courses.php">
        <span class="menu-title">Courses</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="students.php">
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