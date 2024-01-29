<?php
ob_start();
include('../../../components/navbar-instructor.php');

$category = view_course_category($userid);
?>

<!-- Your HTML content goes here -->
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <?php $fullname = viewFullName($_SESSION['instructor_data']['instructorID'], $_SESSION['instructor_data']['userType']); ?>
                <h2>Let's Create Task <?= $fullname; ?></h2>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->
   
    <section class="inner-page">
        <div class="container">
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
                                    <label for="deadline" class="form-label">Deadline:</label>
                                    <input type="datetime-local" class="form-control" id="deadline" name="deadline">
                                </div>
                                <div class="mb-3">
                                    <label for="my_file" class="form-label">Attach File:</label>
                                    <input type="file" class="form-control" id="my_file" name="my_file">
                                </div>

                                <input type="hidden" name="instructor_id" value="<?= $userid ?>">
                                <input type="hidden" id="courseId" name="course_id" readonly>
                                <button type="submit" name="submit" class="btn btn-primary">Create Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../../components/footer.php'); ?>

<script>
    function updateCourseId() {
        var selectedOption = document.getElementById('courseCategory').options[document.getElementById('courseCategory').selectedIndex];
        var courseIdInput = document.getElementById('courseId');
        courseIdInput.value = selectedOption.getAttribute('data-category-id');
    }

    window.addEventListener('load', updateCourseId);

    document.getElementById('courseCategory').addEventListener('change', updateCourseId);

    setTimeout(function () {
        var alertContainer = document.getElementById('alertContainer');
        if (alertContainer) {
            alertContainer.style.display = 'none';
        }
    }, 3000);

</script>



