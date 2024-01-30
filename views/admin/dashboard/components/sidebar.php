<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Name -->
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">

        <?php
        $defaultImage = 'default-user-male.svg'; // Default image for male

        ?>

        <div class="nav-profile-image">
          <img src="/eduLearn/uploads/<?= $defaultImage ?>" class="avatar object-fit-cover" alt="Avatar">
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">admin</span>
          <span class="text-secondary text-small">Administrator</span>
        </div>
      </a>
    </li>
    <!-- Navigations -->
    <li class="nav-item">
      <a class="nav-link" href="admin-dashboard.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-view-dashboard  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="students.php">
        <span class="menu-title">Students</span>
        <i class="mdi mdi-account-multiple  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="instructors.php">
        <span class="menu-title">Instructors</span>
        <i class="mdi mdi-account-card-details  menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="courses.php">
        <span class="menu-title">Courses</span>
        <i class="mdi mdi-book-open menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>