<?php
ob_start();

class View extends Config
{

    private function pagination($currentPage, $totalPages)
    {
?>
        <nav aria-label="Page navigation example" style="margin-top: 20px;">
            <ul class="pagination justify-content-end">
                <?php
                // Previous page link
                if ($currentPage > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>">Previous</a></li>
                <?php else : ?>
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                <?php endif; ?>

                <?php
                // Numbered page links
                for ($i = 1; $i <= $totalPages; $i++) :
                    if ($i == $currentPage) : ?>
                        <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endif;
                endfor; ?>

                <?php
                // Next page link
                if ($currentPage < $totalPages) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>">Next</a></li>
                <?php else : ?>
                    <li class="page-item disabled"><a class="page-link">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php
    }

    public function applicants()
    {

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `application-form_tbl`");
        $stmt->execute();
        $datas = $stmt->fetchAll();

        $itemsPerPage = 10;
        $totalItems = count($datas);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($datas, $offset, $itemsPerPage);

    ?>
        <div class="container text-center">
            <table class="table table-bordered table-hover data-table caption-top">
                <caption>List of applicants</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($data as $data) : ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td>N/A</td>
                            <td><?php echo "{$data['firstname']} {$data['lastname']}"; ?></td>
                            <td><?php echo $data['gender']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['age']; ?></td>
                            <td><?php echo $data['position']; ?></td>
                            <td>
                                <form action="accept-application.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <button type="submit" name="submit" class="btn btn-success btn-sm">
                                        Accept
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $count++;
                    endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php $this->pagination($currentPage, $totalPages); ?>
        </div>
    <?php
    }

    public function viewCourseList($instructor_id) {
        $connection = $this->openConnection();

        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);
        $datas = $stmt->fetchAll();

        $itemsPerPage = 10;
        $totalItems = count($datas);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($datas, $offset, $itemsPerPage);

        ?>
        <table class="mt-3 table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Thumbnail</th>
                    <th>Roadmap</th>
                    <th>Course Title</th>
                    <th>Enrolled Students</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $defaultImage = 'placeholder.png'; ?>

            <?php foreach ($data as $row): ?>
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
                    <td class="d-flex">
                        <form action="course-setup.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="instructorId" value="<?php echo $row['instructor_id']; ?>">
                            <button type="submit" class="btn btn-primary btn-custom">
                                Edit
                            </button>
                        </form>
                        
                        <form action="manage-course.php" method="post" class="ms-1">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="instructorId" value="<?php echo $row['instructor_id']; ?>">
                            <button type="submit" class="btn btn-success btn-custom">
                                Manage
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>


            </tbody>
        </table>

        <!-- Pagination Links -->
        <?php $this->pagination($currentPage, $totalPages); ?>
        <?php
    }

    public function getCourseId($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare();
        $stmt->execute();
    }

    public function getTotalStudents($instructor_id)
    {
        $connection = $this->openConnection();

        $stmt = $connection->prepare("SELECT SUM(`students_enrolled`) as total_students FROM `course_tbl` WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);

        $result = $stmt->fetch();

        $total = ($result['total_students'] !== null) ? $result['total_students'] : 0;

        echo $total;
    }

    public function getTotalCourse($instructor_id)
    {
        $connection = $this->openConnection();

        $stmt = $connection->prepare("SELECT COUNT(*) as total FROM `course_tbl` WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);

        $result = $stmt->fetch();

        $total = intval($result['total']);

        echo $total;
    }

    public function viewChapters($courseid, $instructor_id)
    {

        // echo 'alert("Instructor ID: ' . $instructor_id . ', Course ID: ' . $courseid . '");';
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `course_id` = ? AND `instructor_id` = ? ORDER BY `created_at`");
        $stmt->execute([$courseid, $instructor_id]);
        $datas = $stmt->fetchAll();

        $itemsPerPage = 10;
        $totalItems = count($datas);
        $totalPages = ceil($totalItems / $itemsPerPage);

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = max(1, min($_GET['page'], $totalPages));
        } else {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($datas, $offset, $itemsPerPage);

    ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Video Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize a counter
                $counter = 1;
                ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $row['video_title']; ?></td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
                                View
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content" style="background-color: white;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit the Chapter</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="forms-sample" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <!-- Left Column: Chapter Title and Video Description -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Chapter Title</label>
                                                            <input type="text" readonly class="form-control border-primary" name="title" id="exampleInputUsername1" style="margin-top: 8px;" placeholder="Chapter Title" value="<?= $row['video_title'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Video Description</label>
                                                            <textarea readonly class="form-control border-primary" name="description" id="" rows="5" style="height: 205px;"><?= $row['description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Right Column: Chapter Video and Thumbnail -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Chapter Thumbnail</label>
                                                            <div class="mt-2 mb-2" style="width: 100% !important;">
                                                                <?php $defaultImage = 'placeholder.png'; ?>
                                                                <img src="/eduLearn/views/instructor/dashboard/videos/thumbnails/<?= isset($row['thumbnail']) ? $row['thumbnail'] : $defaultImage ?>" style="width: 100% !important;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <?php $this->pagination($currentPage, $totalPages); ?>


<?php

    }

    public function view_fullstack_course()
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'fullstack' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_frontend_course()
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'frontend' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_backend_course()
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'backend' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_course_details($course_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `course_id` = ? ORDER BY `id` ASC");
        $stmt->execute([$course_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function getCourse($course_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `id` = ?");
        $stmt->execute([$course_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_instructor($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `id` = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video($id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_first_video($id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `course_id` = ? ORDER BY `id` ASC");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video_description($id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video_length($id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS `length` FROM `video_tbl` WHERE `course_id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function validate_ifStudent_isEnrolled($course_id, $student_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `student_course_tbl` WHERE `course_id` = ? AND `student_id` = ?");
        $stmt->execute([$course_id, $student_id]);
        $result = $stmt->rowCount();

        return $result;
    }

    public function student_list($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT user_tbl.id, user_tbl.firstname, user_tbl.lastname, user_tbl.email, student_course_tbl.course_id, student_course_tbl.course
            FROM user_tbl 
            INNER JOIN student_course_tbl ON user_tbl.id = student_course_tbl.student_id
            INNER JOIN course_tbl ON student_course_tbl.course_id = course_tbl.id
            WHERE course_tbl.instructor_id = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_student_course($student_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT course_tbl.id, course_tbl.title, course_tbl.difficulty, course_tbl.thumbnail FROM course_tbl INNER JOIN student_course_tbl ON student_course_tbl.course_id = course_tbl.id WHERE student_course_tbl.student_id = ?");
        $stmt->execute([$student_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_instructor_profile($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT 
            instructor_tbl.firstname, 
            instructor_tbl.lastname, 
            instructor_tbl.biography, 
            instructor_tbl.profile,
            course_tbl.thumbnail,
            course_tbl.title,
            course_tbl.difficulty,
            COUNT(course_tbl.instructor_id) AS courses_count, 
            SUM(course_tbl.students_enrolled) AS total_students_enrolled
            FROM instructor_tbl
            INNER JOIN course_tbl ON course_tbl.instructor_id = instructor_tbl.id
            WHERE instructor_tbl.id = ? 
            GROUP BY instructor_tbl.id");

        $stmt->execute([$instructor_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function view_course_category($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT title,id FROM course_tbl WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    // public function view_student_task($student_id) {
    //     $connection = $this->openConnection();
    //     $stmt = $connection->prepare("SELECT task_tbl.id, task_tbl.title, task_tbl.course, task_tbl.created_at, task_tbl.file, task_tbl.deadline FROM task_tbl INNER JOIN `student_course_tbl` ON student_course_tbl.student_id = ? WHERE task_tbl.course_id = student_course_tbl.course_id");
    //     $stmt->execute([$student_id]);
    //     $data = $stmt->fetchAll();

    //     return $data;
    // }
    public function view_student_task($student_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT task_tbl.id, task_tbl.title, task_tbl.course, task_tbl.created_at, task_tbl.file, task_tbl.deadline
            FROM task_tbl
            INNER JOIN student_course_tbl ON task_tbl.course_id = student_course_tbl.course_id
            LEFT JOIN student_task_tbl ON task_tbl.id = student_task_tbl.task_id AND student_task_tbl.student_id = ?
            WHERE student_course_tbl.student_id = ? AND (student_task_tbl.status IS NULL OR student_task_tbl.status = 'Incomplete')
        ");
        $stmt->execute([$student_id, $student_id]);
        $data = $stmt->fetchAll();

        return $data;
    }


    public function view_task_details($task_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM task_tbl WHERE `id` = ?");
        $stmt->execute([$task_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function view_submited_task($student_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT task_tbl.id, task_tbl.title, task_tbl.course, task_tbl.description, task_tbl.file FROM task_tbl INNER JOIN student_task_tbl ON task_tbl.id = student_task_tbl.task_id WHERE student_task_tbl.student_id = ? AND student_task_tbl.status = 'Completed'");
        $stmt->execute([$student_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function get_file_submited($student_id, $task_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT `file`,`submitted_at` FROM student_task_tbl WHERE student_id = ? AND task_id = ?");
        $stmt->execute([$student_id, $task_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function view_instructor_course($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM course_tbl WHERE instructor_id = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_course_task($instructor_id, $course_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM task_tbl WHERE instructor_id = ? and course_id = ?");
        $stmt->execute([$instructor_id, $course_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function get_single_task_details($instructor_id, $course_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM task_tbl WHERE instructor_id = ? and course_id = ?");
        $stmt->execute([$instructor_id, $course_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function view_student_submit($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT student_task_tbl.student_id, student_task_tbl.course_id, student_task_tbl.course, student_task_tbl.file, student_task_tbl.status, student_task_tbl.task_id, user_tbl.firstname, user_tbl.lastname, user_tbl.email, task_tbl.title
                                     FROM student_task_tbl 
                                     INNER JOIN user_tbl ON student_task_tbl.student_id = user_tbl.id
                                     INNER JOIN task_tbl ON student_task_tbl.course_id = task_tbl.course_id 
                                     WHERE task_tbl.instructor_id = ? AND student_task_tbl.status = 'Completed'");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function view_student_submitted_task($task_id, $student_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT task_tbl.title, task_tbl.course, task_tbl.description, task_tbl.file, task_tbl.score, task_tbl.created_at, task_tbl.deadline, student_task_tbl.submitted_at, task_tbl.title, student_task_tbl.score AS student_score FROM task_tbl INNER JOIN student_task_tbl ON task_tbl.id = student_task_tbl.task_id WHERE task_tbl.id = ? AND student_task_tbl.student_id = ?");
        $stmt->execute([$task_id, $student_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_instructor_total_video($instructor_id)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) FROM video_tbl WHERE instructor_id = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function get_total_students() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS total_students FROM user_tbl");
        $stmt->execute();
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function get_total_instructor() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS total_students FROM instructor_tbl");
        $stmt->execute();
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function get_total_course() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS total_students FROM course_tbl");
        $stmt->execute();
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function get_total_video() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS total_students FROM video_tbl");
        $stmt->execute();
        $data = $stmt->fetchColumn();

        return $data;
    }

    public function get_students() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM user_tbl");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function get_instructor_details() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM instructor_tbl");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function get_course_details() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM course_tbl");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }
}

?>