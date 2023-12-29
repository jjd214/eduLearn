<?php 

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
                    <td class="text-center" style="display: flex; align-items: center;">
                        <form action="course-setup.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="instructorId" value="<?php echo $row['instructor_id']; ?>">
                            <button type="submit" class="btn btn-primary btn-custom">
                                Edit
                            </button>
                        </form>
                        
                        <form action="manage-course.php" method="post" style="margin-left: 5px;">
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
    
        $total = $result['total_students'];
        
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
    

}

?>
