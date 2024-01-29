<?php include('./partials/__header.php'); ?>

<style>
    .card-body {
        padding: 1rem 1rem !important;
    }

    .badge span {
        border-radius: 5px;
        display: flex;
        font-size: 15px;
        justify-content: center;
        align-items: center
    }

    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
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
                        "Student Name" work
                    </h3>
                </div>
                <div class="container col-md-12">
                    <div class="row">
                        <!-- Task1 -->
                        <div class="col-md-12">
                            <a href="task-student.php" class="text-decoration-none text-dark">
                                <div class="card p-3 mb-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="ms-2 c-details">
                                                <h6 class="mb-0 fs-3">"Student Name"</h6>&nbsp;<span class="fs-6">"Submitted Date"</span>
                                            </div>
                                        </div>
                                        <div class="badge"> <span class="bg-gradient-primary text-white p-2">Graded: Score/100</span> </div>
                                    </div>
                                    <div class="mt-2">
                                        <span class="fs-6"><b>Ipapakita rito yung mga file like docx, image etc.</span>
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
