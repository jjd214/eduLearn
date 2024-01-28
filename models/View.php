<?php 
ob_start();

class View extends Config {
    
    private function pagination($currentPage, $totalPages) {
        ?>
        <nav aria-label="Page navigation example" style="margin-top: 20px;">
            <ul class="pagination justify-content-end">
                <?php
                // Previous page link
                if ($currentPage > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>">Previous</a></li>
                <?php else: ?>
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                <?php endif; ?>

                <?php
                // Numbered page links
                for ($i = 1; $i <= $totalPages; $i++):
                    if ($i == $currentPage): ?>
                        <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endif;
                endfor; ?>

                <?php
                // Next page link
                if ($currentPage < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>">Next</a></li>
                <?php else: ?>
                    <li class="page-item disabled"><a class="page-link">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php
    }

    public function applicants() {

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
                    foreach ($data as $data): ?>
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

    public function viewCourseList() {
        $connection = $this->openConnection();

        $stmt = $connection->prepare("SELECT * FROM `course_tbl`");
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

    public function getCourseId($instructor_id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare();
        $stmt->execute();
    }

    public function getTotalStudents($instructor_id) {
        $connection = $this->openConnection();
        
        $stmt = $connection->prepare("SELECT SUM(`students_enrolled`) as total_students FROM `course_tbl` WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);
        
        $result = $stmt->fetch();
    
        $total = ($result['total_students'] !== null) ? $result['total_students'] : 0;
        
        echo $total;
        
    }    

    public function getTotalCourse($instructor_id) {
        $connection = $this->openConnection();
        
        $stmt = $connection->prepare("SELECT COUNT(*) as total FROM `course_tbl` WHERE `instructor_id` = ?");
        $stmt->execute([$instructor_id]);
        
        $result = $stmt->fetch();
    
        $total = intval($result['total']);

        echo $total;
    }

    public function viewChapters($courseid, $instructor_id) {

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
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $row['video_title']; ?></td>
                        <td class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">
                                    Edit
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
                                                <form class="forms-sample">
                                                    <div class="row">
                                                        <!-- Left Column: Chapter Title and Video Description -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Chapter Title</label>
                                                                <input type="text" class="form-control border-primary" id="exampleInputUsername1" style="margin-top: 8px;" placeholder="Chapter Title" value="<?= $row['video_title'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Video Description</label>
                                                                <textarea class="form-control border-primary" name="" id="" rows="5" style="height: 205px;"><?= $row['description'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Chapter Video</label>
                                                                <input class="form-control" type="file" name="course-video" id="course-video" accept="video/mp4" required>
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
                                                                <input class="form-control" type="file" name="course-image" id="course-image" style="margin-top: 43px;" accept="image/jpeg, image/jpg, image/png" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-gradient-primary me-2">Edit Chapter</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="ms-1">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>">
                                        Delete
                                    </button>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this item?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post">
                                                    <input type="hidden" name="video_id" value="<?= $row['id']; ?>">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
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

    public function view_fullstack_course() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'fullstack' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;

    }

    public function view_frontend_course() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'frontend' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;

    }

    public function view_backend_course() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `roadmap` = 'backend' AND `status` = 'Public'");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;

    }

    public function view_course_details($course_id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `course_id` = ? ORDER BY `id` ASC");
        $stmt->execute([$course_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function getCourse($course_id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `id` = ?");
        $stmt->execute([$course_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_instructor($instructor_id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `id` = ?");
        $stmt->execute([$instructor_id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_first_video($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `course_id` = ? ORDER BY `id` ASC");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video_description($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `video_tbl` WHERE `id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data;
    }

    public function get_video_length($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT COUNT(*) AS `length` FROM `video_tbl` WHERE `course_id` = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetchColumn();

        return $data;
    }   
    
}

?>
