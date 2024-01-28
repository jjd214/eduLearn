<?php

include 'Config.php';

$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];

$config = new Config();

function enroll_course($student_id, $course_id, $config) {
    try {

        $connection = $config->openConnection();

        $stmt = $connection->prepare("SELECT students_enrolled FROM `course_tbl` WHERE `id` = :course_id");
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();

        $currentStudentsEnrolled = $stmt->fetchColumn();

        $newStudentsEnrolled = $currentStudentsEnrolled + 1;

        $stmt = $connection->prepare("UPDATE `course_tbl` SET students_enrolled = :new_students_enrolled WHERE `id` = :course_id");
        $stmt->bindParam(':new_students_enrolled', $newStudentsEnrolled);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();

        $config->closeConnection();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

function insert_student_course($student_id, $course_id, $course_name, $config) {
    try {
        $connection = $config->openConnection();

        $stmt = $connection->prepare("INSERT INTO `student_course_tbl` (student_id,course_id,course) VALUES(?,?,?)");
        $stmt->execute([$student_id,$course_id,$course_name]);

        $config->closeConnection();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}


enroll_course($student_id, $course_id, $config);
insert_student_course($student_id, $course_id, $course_name, $config);
?>

