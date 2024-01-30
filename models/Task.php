<?php
class Task extends Config {

    public function create_task() {
        if(isset($_POST['submit'])) {
            $instructor_id = $_POST['instructor_id'];
            $course_id = $_POST['course_id'];
            $title = $_POST['title'];
            $score = $_POST['score'];
            $course = $_POST['course_category'];
            $description = $_POST['description'];
            $deadline = $_POST['deadline'];
    
            // File handling
            $file_name = '';
    
            if ($_FILES['my_file']['name'] != '') {
                $file_name = uniqid() . '_' . basename($_FILES['my_file']['name']);
                $file_path = 'uploads/post/' . $file_name;
    
                if (move_uploaded_file($_FILES['my_file']['tmp_name'], $file_path)) {
                    // File uploaded successfully
                } else {
                    // File upload failed
                    echo 'File upload failed';
                    return;
                }
            }  
    
            $connection = $this->openConnection();
            
            // Fetch student_ids from student_course_tbl for the given course_id
            $stmt = $connection->prepare("SELECT student_id FROM student_course_tbl WHERE course_id = :course_id");
            $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
            $stmt->execute();
            $students = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
            // Prepare the SQL statement for task_tbl insertion
            $stmtTask = $connection->prepare("INSERT INTO task_tbl (instructor_id, course_id, title, course, description, file, score, deadline) VALUES (:instructor_id, :course_id, :title, :course, :description, :file, :score, :deadline)");
    
            // Bind parameters for task_tbl insertion
            $stmtTask->bindParam(':instructor_id', $instructor_id, PDO::PARAM_INT);
            $stmtTask->bindParam(':course_id', $course_id, PDO::PARAM_INT);
            $stmtTask->bindParam(':title', $title, PDO::PARAM_STR);
            $stmtTask->bindParam(':course', $course, PDO::PARAM_STR);
            $stmtTask->bindParam(':description', $description, PDO::PARAM_STR);
            $stmtTask->bindParam(':file', $file_name, PDO::PARAM_STR);
            $stmtTask->bindParam(':score', $score, PDO::PARAM_STR);
            $stmtTask->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    
            // Prepare the SQL statement for student_task_tbl insertion
            $stmtStudentTask = $connection->prepare("INSERT INTO student_task_tbl (task_id, student_id, course_id, course) VALUES (?, ?, ?, ?)");
    
            // Execute the task_tbl insertion and retrieve the last inserted task_id
            if ($stmtTask->execute()) {
                $lastTaskId = $connection->lastInsertId();
    
                // Loop through each student_id and execute the student_task_tbl insertion
                foreach ($students as $student_id) {
                    $stmtStudentTask->bindParam(1, $lastTaskId, PDO::PARAM_INT);
                    $stmtStudentTask->bindParam(2, $student_id, PDO::PARAM_INT);
                    $stmtStudentTask->bindParam(3, $course_id, PDO::PARAM_INT);
                    $stmtStudentTask->bindParam(4, $course, PDO::PARAM_STR);
    
                    if ($stmtStudentTask->execute()) {
                        // Insertion successful for this student_id
                        // echo "Task created successfully for student ID: $student_id <br>";
                    } else {
                        // Insertion failed for this student_id
                        echo "Error creating task for student ID: $student_id - " . $stmtStudentTask->errorInfo()[2] . "<br>";
                    }
                }
    
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Created Task Successfully
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
            } else {
                // Insertion into task_tbl failed
                echo 'Error creating task: ' . $stmtTask->errorInfo()[2];
            }
    
            $this->closeConnection($connection);
        }
    }
    

    public function submit_task() {
        if (isset($_POST['submit'])) {
            $student_id = $_POST['student_id'];
            $task_id = $_POST['task_id'];
    
            // File handling
            $file_name = '';
    
            // Check if a file is selected
            if ($_FILES['file']['name'] != '') {
                // Get the previous file information
                $previous_file = $this->get_file_submitted($student_id, $task_id);
    
                // Remove the previous file if it exists
                if (!empty($previous_file) && file_exists($previous_file)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] .'/eduLearn/views/student/submitted/'.$previous_file);
                }
    
                // Upload the new file
                $file_name = uniqid() . '_' . basename($_FILES['file']['name']);
                $file_path = 'submitted/' . $file_name;
    
                if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                    // File uploaded successfully
                } else {
                    // File upload failed
                    echo 'File upload failed';
                    return;
                }
            }
    
            // Database update
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE student_task_tbl SET file = ?, status = 'Completed' WHERE student_id = ? AND task_id = ?");
    
            // Bind parameters
            $stmt->bindParam(1, $file_name, PDO::PARAM_STR);
            $stmt->bindParam(2, $student_id, PDO::PARAM_INT);
            $stmt->bindParam(3, $task_id, PDO::PARAM_INT);
    
            // Execute the statement
            if ($stmt->execute()) {
                // Update successful
                echo 'Task submitted successfully.';
            } else {
                // Update failed
                echo 'Error submitting task: ' . $stmt->errorInfo()[2];
            }
    
            $this->closeConnection($connection);
        }
    }

    public function get_file_submitted($student_id, $task_id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT `file` FROM student_task_tbl WHERE student_id = ? AND task_id = ?");
        $stmt->execute([$student_id, $task_id]);
        $file = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->closeConnection($connection);

        return $file['file'];
    }

    public function update_score() {
        if(isset($_POST['submit_score'])) {
            
            $score = $_POST['score'];
            $student_id = $_POST['student_id'];
            $task_id = $_POST['task_id'];
    
            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE student_task_tbl SET score = ? WHERE student_id = ? AND task_id = ?");
            $stmt->execute([$score, $student_id, $task_id]);
            $result = $stmt->rowCount();
    
            if($result > 0) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Score Submitted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }
    
    
    
}
?>
