<?php
ob_start();
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/eduLearn/components/navbar-instructor.php'); ?>

<!-- Your HTML content goes here -->
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <?php $fullname = viewFullName($_SESSION['instructor_data']['instructorID'],$_SESSION['instructor_data']['userType']); ?>
                <h2>Let's Start Teaching <?= $fullname; ?></h2>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <p>
                Test
            </p>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__footer.php'); ?>