<?php
ob_start();
// session_start();    
include('../../components/navbar-student.php');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    .bg-primary {
        background-color: var(--chelsea-200) !important;
    }
</style>

<?php
$course = getCourse($_GET['course']);
$details = view_course_details($_GET['course']);
$instructor = get_instructor($course['instructor_id']);
$student_id = $userid;

$validate = validate_ifStudent_isEnrolled($_GET['course'],$student_id);
?>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <span><a href="/eduLearn/views/student/home-page.php">Homepage</a>&nbsp;/&nbsp;<a href="/eduLearn/views/student/roadmap/full-stack.php">Front, Back at, Full-Stack Development</a>&nbsp;/&nbsp; Course Name Dito</span>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <!-- Boxes -->
            <div class="row">

                <div class="col-md-8">
                    <div>
                        <h1><?= $course['title'] ?></h1>
                        <h5><?= $course['description'] ?></h5>
                    </div>
                    <br>
                    <div>
                        <span class="fw-bold bg-primary text-dark p-1"><?= $course['difficulty'] ?> Course</span>
                        <br>
                        <br>
                        <h5 class="mt-2">Created by <a href="#" class="text-primary">Instructor <?= $instructor['firstname']. " ".$instructor['lastname'] ?></a></h5>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <span class="fs-4 fw-bold">Course content</span>
                        </div>
                        <div class="card-body">
                            <?php foreach($details as $video) : ?>
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <p class="card-text text-center"><i class="bi bi-play-btn-fill"></i></p>
                                </div>
                                <div class="col-md-10">
                                    <p class="card-text"><?= $video['video_title'] ?></p>
                                </div>
                                <div class="col-md-1">
                                    <p class="card-text">02:30</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="/eduLearn/views/instructor/dashboard/uploads/<?= $course['thumbnail'] ?>" class="h-80 w-100 p-2">
                    <a class="btn btn-primary mt-2 w-100" id="enrollButton">Enroll Now</a>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('../../components/footer.php'); ?>

<script>
    document.getElementById('enrollButton').addEventListener('click', function() {

        if (document.getElementById('enrollButton').innerText === "Enroll Now") {
            Swal.fire({
                title: "Welcome!",
                text: "You are now Enrolled!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "/eduLearn/models/Enroll.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Redirect to the course page after successful enrollment
                            window.location.href = "courses/course.php?course=<?= $course['id'] ?>";
                        }
                    };

                    var courseId = <?= $course['id'] ?>;
                    var courseName = '<?= $course['title'] ?>'; 
                    xhr.send("student_id=<?= $student_id ?>&course_id=" + courseId + "&course_name=" + encodeURIComponent(courseName));
                }
            });
        }
    });

    document.getElementById('enrollButton').addEventListener('click', function() {
        if (document.getElementById('enrollButton').innerText === "Go to My Course") {
            window.location.href = "courses/course.php?course=<?= $course['id'] ?>";
        }
    });

    if (<?= $validate ?> === 1) {
        document.getElementById('enrollButton').innerText = "Go to My Course";
    }
</script>
