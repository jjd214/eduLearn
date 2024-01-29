<?php include('./partials/__header.php'); ?>

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
                        </span> <?php $fullname = viewFullName($_SESSION['instructor_data']['instructorID'], $_SESSION['instructor_data']['userType']); ?>
                        Create Task
                    </h3>
                </div>
                <?php
                if (isset($_SESSION['alert_status'])) {
                    echo '<div id="alertContainer" class="position-fixed top-0 end-0 p-3" style="margin-top: 80px;">' . $_SESSION['alert'] . '</div>';
                    unset($_SESSION['alert_status']);
                }
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <?php create_task(); ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseCategory" class="form-label">Course Category:</label>
                                        <select class="form-select" id="courseCategory" name="course_category" required>
                                            <?php foreach ($category as $cat) : ?>
                                                <option value="<?= $cat['title'] ?>" data-category-id="<?= $cat['id'] ?>"><?= $cat['title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter Description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Points</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="points" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deadline" class="form-label">Due date:</label>
                                        <input type="datetime-local" class="form-control" id="deadline" name="deadline">
                                    </div>
                                    <div class="mb-3">
                                        <label for="my_file" class="form-label">Attach File:</label>
                                        <input type="file" class="form-control" id="my_file" name="my_file">
                                    </div>

                                    <input type="hidden" name="instructor_id" value="<?= $userid ?>">
                                    <input type="hidden" id="courseId" name="course_id" readonly>
                                    <button type="submit" name="submit" class="btn btn-primary col-md-12">Create Task</button>
                                </form>
                            </div>
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