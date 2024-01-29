<?php include('./partials/__header.php'); ?>

<div class="container-scroller">
    <!-- components:components/navbar.php -->
    <?php include('./components/navbar.php'); ?>
    <?php $students = student_list($userid); ?>
    <div class="container-fluid page-body-wrapper">
        <!-- components:components/sidebar.php -->
        <?php include('./components/sidebar.php'); ?>
        <!-- Main Panel -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-multiple"></i>
                        </span> Enrolled Students
                    </h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="mt-3 table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Enrolled Course Name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($students as $student) : ?>
                                    <tr>
                                        <td><?= $student['id'] ?></td>
                                        <td><?= $student['firstname'] ?></td>
                                        <td><?= $student['lastname'] ?></td>
                                        <td><?= $student['email'] ?></td>
                                        <td><?= $student['course'] ?></td>
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