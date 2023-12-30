<?php
class CourseEntity extends Config
{


    public function createCourse()
    {

        if (isset($_POST['submit'])) {

            unset($_SESSION['courseid']);

            $instructorID = $_POST['instructorID'];
            $title = $_POST['title'];
            $difficulty = $_POST['difficulty'];
            $roadmap = $_POST['position'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("INSERT INTO `course_tbl` (`instructor_id`,`title`,`difficulty`,`roadmap`) VALUES (?,?,?,?)");
            $stmt->execute([$instructorID, $title, $difficulty, $roadmap]);
            $result = $stmt->rowCount();

            if ($result > 0) {

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

    public function lastID()
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` ORDER BY `created_at` DESC LIMIT 1");
        $stmt->execute();
        $data = $stmt->fetch();

        return $data;
    }

    public function updateTitle()
    {

        if (isset($_POST['course-title'])) {

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $title = $_POST['title'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `title` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$title, $instructorID, $courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                $_SESSION['title'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Title Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                header("refresh:0;url=course-setup.php");
                exit();
            }

            echo '<script> alert(' . json_encode([$courseid, $instructorID, $title]) . '); </script>';
        }
    }

    public function updateDifficulty()
    {

        if (isset($_POST['course-difficulty'])) {

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $difficulty = $_POST['difficulty'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `difficulty` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$difficulty, $instructorID, $courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                $_SESSION['difficulty'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Difficulty Updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                header("refresh:0;url=course-setup.php");
                exit();
            }

            echo '<script> alert(' . json_encode([$courseid, $instructorID, $difficulty]) . '); </script>';
        }
    }

    public function updateDescription()
    {

        if (isset($_POST['course-description'])) {

            // echo '<script> alert("qeasasdasda"); </script>';

            $courseid = $_POST['courseID'];
            $instructorID = $_POST['instructorID'];
            $description = $_POST['description'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `description` = ? WHERE `instructor_id` = ? AND `id` = ?");
            $stmt->execute([$description, $instructorID, $courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                $_SESSION['description'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Description updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

                header("refresh:0;url=course-setup.php");
                exit();
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

    public function updateThumbnail()
    {
        if (isset($_POST['upload-course-image'])) {
            $img_name = $_FILES['course-image']['name'];
            $img_size = $_FILES['course-image']['size'];
            $tmp_name = $_FILES['course-image']['tmp_name'];
            $error = $_FILES['course-image']['error'];

            $instructorID = $_POST['instructorID'];
            $courseid = $_POST['courseID'];

            if ($error === 0) {
                $connection = $this->openConnection();

                $stmt = $connection->prepare("SELECT thumbnail FROM course_tbl WHERE instructor_id = ? AND id = ?");
                $stmt->execute([$instructorID, $courseid]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $previousThumbnail = $row['thumbnail'];

                if (!empty($previousThumbnail)) {
                    $previousThumbnailPath = $_SERVER['DOCUMENT_ROOT'] . '/eduLearn/views/instructor/dashboard/uploads/' . $previousThumbnail;
                    if (file_exists($previousThumbnailPath)) {
                        unlink($previousThumbnailPath);
                    }
                }

                if ($img_size > 5242880) {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Your file should not exceed 5mb.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        date_default_timezone_set('Asia/Manila');
                        $currentDateTime = date('Y-m-d h:i:s A');
                        $formattedDateTime = date('Y-m-d-h-i-s-A', strtotime($currentDateTime));
                        $new_img_name = "IMG-" . $instructorID . "-" . $formattedDateTime . '.' . $img_ex_lc;

                        $img_upload_path = '/eduLearn/views/instructor/dashboard/uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . $img_upload_path);

                        $stmt = $connection->prepare("UPDATE course_tbl SET thumbnail = ? WHERE instructor_id = ? AND id = ?");
                        $stmt->execute([$new_img_name, $instructorID, $courseid]);
                        $result = $stmt->rowCount();

                        if ($result > 0) {
                            $_SESSION['thumbnail'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Thumbnail updated successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';

                            header("refresh:0;url=course-setup.php");
                            exit();
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Failed to update Thumbnail.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                    } else {
                        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                You can\'t upload this type of file.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                }
            } else {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Unknown error occurred.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }

    public function getData($courseid)
    {

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM `course_tbl` WHERE `id` = ?");
        $stmt->execute([$courseid]);
        $data = $stmt->fetch();

        return $data;
    }

    public function deleteCourse()
    {
        if (isset($_POST['delete'])) {
            $courseid = $_POST['id'];

            // Get the thumbnail filename from the database
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT `thumbnail` FROM `course_tbl` WHERE `id` = ?");
            $stmt->execute([$courseid]);
            $thumbnail = $stmt->fetchColumn();

            // Delete the course record from the database
            $stmt = $connection->prepare("DELETE FROM `course_tbl` WHERE `id` = ?");
            $stmt->execute([$courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                // Delete the associated thumbnail file from the uploads folder
                if (!empty($thumbnail)) {
                    $thumbnailPath = $_SERVER['DOCUMENT_ROOT'] . '/eduLearn/views/instructor/dashboard/uploads/' . $thumbnail;
                    if (file_exists($thumbnailPath)) {
                        unlink($thumbnailPath);
                    }
                }

                header("Location: course-list.php");
            }
        }
    }


    public function publishCourse()
    {

        if (isset($_POST['publish'])) {

            $courseid = $_POST['id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("UPDATE `course_tbl` SET `status` = CASE WHEN `status` = 'Public' THEN 'Private' ELSE 'Public' END WHERE `id` = ?");
            $stmt->execute([$courseid]);
            $result = $stmt->rowCount();

            if ($result > 0) {
                header("refresh:0;url=course-setup.php");
            }
        }
    }

    public function getCourseStatus($courseid)
    {

        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT (`status`) FROM `course_tbl` WHERE `id` = ?");
        $stmt->execute([$courseid]);
        $data = $stmt->fetchColumn();

        return $data;
    }
}

ob_flush();
