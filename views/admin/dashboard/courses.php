<?php include('./partials/__header.php'); ?>

<div class="container-scroller">
    <!-- components:components/navbar.php -->
    <?php include('./components/navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
        <!-- components:components/sidebar.php -->
        <?php include('./components/sidebar.php'); ?>
        <!-- Main Panel -->

        <?php $data = get_course_details(); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                // Alert container outside the navbar
                if (isset($_SESSION['alert'])) {
                    echo '<div id="alertContainer" class="position-fixed top-0 end-0 p-3" style="margin-top: 80px;">' . $_SESSION['alert'] . '</div>';
                    unset($_SESSION['alert']);
                }
                ?>
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-format-list-bulleted "></i>
                        </span> Total Courses
                    </h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <table class="mt-3 table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Thumbnail</th>
                    <th>Roadmap</th>
                    <th>Course Title</th>
                    <th>Enrolled Students</th>
                    <th>Created</th>
                    <th>Visibility</th>
                </tr>
            </thead>
            <tbody>
                <?php $defaultImage = 'placeholder.png'; ?>

                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td style="text-align: center;">
                            <?php
                            $thumbnail = is_null($row['thumbnail']) ? $defaultImage : $row['thumbnail'];
                            ?>
                            <img src='/eduLearn/views/instructor/dashboard/uploads/<?php echo $thumbnail; ?>' style='width: 50px; height: 50px; border-radius: 0;'>
                        </td>
                        <td><?php echo $row['roadmap']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo is_null($row['students_enrolled']) ? 0 : $row['students_enrolled']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <link rel="stylesheet" href="/eduLearn/views/instructor/dashboard/assets/css/custom.css">
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
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
    // Hide the alert after 3 seconds
    setTimeout(function() {
        var alertContainer = document.getElementById('alertContainer');
        if (alertContainer) {
            alertContainer.style.display = 'none';
        }
    }, 3000);
</script>