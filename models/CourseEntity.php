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
                header("Location: course-setup.php");
            }
        }
    }

    public function updateTitle() {
        
        if(isset($_POST['course-title'])) {
            $instructorID = $_POST['instructorID'];
            $title = $_POST['title'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `title` = ? WHERE `instructor_id` = ?");
            $stmt->execute([$title,$instructorID]);
            $result = $stmt->rowCount();

            if($result > 0) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Title Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 
        }
    }

    public function updateDifficulty() {
        
        if(isset($_POST['course-difficulty'])) {

            $instructorID = $_POST['instructorID'];
            $difficulty = $_POST['difficulty'];
            
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `difficulty` = ? WHERE `instructor_id` = ?");
            $stmt->execute([$difficulty,$instructorID]);
            $result = $stmt->rowCount();

            if($result > 0) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Difficulty Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 
        }
    }

    public function updateDescription() {
        
        if(isset($_POST['course-description'])) {

            $instructorID = $_POST['instructorID'];
            $description = $_POST['description'];
            
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `description` = ? WHERE `instructor_id` = ?");
            $stmt->execute([$description,$instructorID]);
            $result = $stmt->rowCount();

            if($result > 0) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            description Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 
        }
    }
}


?>