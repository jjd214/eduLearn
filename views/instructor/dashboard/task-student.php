<?php include('./partials/__header.php'); ?>

<style>
    .card-body {
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
                        Student Works
                    </h3>
                </div>
                <div class="container col-md-12">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <table class="mt-3 table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Score</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>juan dela cruz</td>
                                                <td>85/<span>100</span></td>
                                                <td>
                                                    <a href="task-student-view.php" class="btn btn-primary btn-rounded">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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