<?php include('./partials/__header.php'); ?>

<style>
    .card-body{
        padding: 1rem 1rem !important;
    }
</style>

<div class="container-scroller">
    <!-- components:components/navbar.php -->
    <?php include('./components/navbar.php'); ?>
    <?php $category = view_course_category($userid); ?>
    <div class="container-fluid page-body-wrapper">
        <!-- components:components/sidebar.php -->
        <?php include('./components/sidebar.php'); ?>
        <!-- Main Panel -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-equal-box"></i>
                        </span>
                        Task List
                    </h3>
                </div>
                <div class="container col-md-12">
                    <div class="row">
                        <!-- Boxes -->
                        <div class="col-md-3 p-2">
                            <a href="task-course.php" class="text-decoration-none">
                                <div class="card bg-gradient-primary card-img-holder">
                                    <div class="card-body text-white">
                                        <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="w-100" alt="Course image" height="200">
                                        <h4 class="font-weight-normal fw-bold card-title mt-2 text-white">
                                            Course Title 1
                                        </h4>
                                        <h6 style="font-size: 15px;">Difficulty: </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Boxes -->
                        <div class="col-md-3 p-2">
                            <a href="#" class="text-decoration-none">
                                <div class="card bg-gradient-primary card-img-holder">
                                    <div class="card-body text-white">
                                        <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="w-100" alt="Course image" height="200">
                                        <h4 class="font-weight-normal fw-bold card-title mt-2 text-white">
                                            Course Title 2
                                        </h4>
                                        <h6 style="font-size: 15px;">Difficulty: </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include('./partials/__footer.php'); ?>

<script>
    function updateCourseId() {
        var selectedOption = document.getElementById('courseCategory').options[document.getElementById('courseCategory').selectedIndex];
        var courseIdInput = document.getElementById('courseId');
        courseIdInput.value = selectedOption.getAttribute('data-category-id');
    }

    window.addEventListener('load', updateCourseId);

    document.getElementById('courseCategory').addEventListener('change', updateCourseId);

    setTimeout(function() {
        var alertContainer = document.getElementById('alertContainer');
        if (alertContainer) {
            alertContainer.style.display = 'none';
        }
    }, 3000);
</script>