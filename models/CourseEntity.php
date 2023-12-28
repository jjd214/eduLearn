<?php
class CourseEntity extends Config {


    public function createCourse() {

        if(isset($_POST['submit'])) {

            $instructorID = $_POST['instructorID'];
            $title = $_POST['title'];
            $difficulty = $_POST['difficulty'];
            $roadmap = $_POST['position'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("INSERT INTO `course_tbl` (`instructor_id`,`title`,`difficulty`,`roadmap`) VALUES (?,?,?,?)");
            $stmt->execute([$instructorID,$title,$difficulty,$roadmap]);
            $result = $stmt->rowCount();

            if($result > 0) {
                
                $lastInsertId = $this->lastID();

                if (!empty($lastInsertId['id'])) {
                    $_SESSION['lastInsertedCourseId'] = $lastInsertId['id'];
                    echo '<script> alert(' . json_encode([$_SESSION['lastInsertedCourseId']]) . '); </script>';
                }
                $this->closeConnection($connection);

                header("Location: course-setup.php");
                exit();
            }
        }
    }

    public function lastID() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` ORDER BY `created_at` DESC LIMIT 1");
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function updateTitle() {
        
        if(isset($_POST['course-title'])) {

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $title = $_POST['title'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `title` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$title,$instructorID,$courseid]);
            $result = $stmt->rowCount();

            if($result > 0) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Title Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 

            echo '<script> alert(' . json_encode([$courseid, $instructorID, $title]) . '); </script>';

        }
    }

    public function updateDifficulty() {
        
        if(isset($_POST['course-difficulty'])) {

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $difficulty = $_POST['difficulty'];
            
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `difficulty` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$difficulty,$instructorID,$courseid]);
            $result = $stmt->rowCount();

            if($result > 0) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Difficulty Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 

            echo '<script> alert(' . json_encode([$courseid, $instructorID, $difficulty]) . '); </script>';

        }
    }

    public function updateDescription() {
        
        if(isset($_POST['course-description'])) {

            // echo '<script> alert("qeasasdasda"); </script>';

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $description = $_POST['description'];
            
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `description` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$description, $instructorID, $courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Description updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } 
            // else {
            //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //             Error updating description.
            //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //         </div>';
            // }

            echo '<script> alert(' . json_encode([$courseid, $instructorID, $description]) . '); </script>';

        }
    }
}


?>