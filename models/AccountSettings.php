<?php
class AccountSettings extends Config
{

    public function profileSettings()
    {
        if (isset($_POST['submit'])) {

            if ($_POST['access'] == 'student') {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $biography = $_POST['biography'];
                $gender = $_POST['gender'];
                $userid = $_POST['id'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE `user_tbl`
                                              SET `firstname` = ?,
                                                  `lastname` = ?,
                                                  `email` = ?,
                                                  `biography` = ?,
                                                  `gender` = ?
                                                  
                                            WHERE `id` = ?");
                $stmt->execute([$firstname, $lastname, $email, $biography, $gender, $userid]);
                $result = $stmt->rowCount();

                if ($result > 0) {

                    $_SESSION['status'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Profile updated successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                    header("refresh:0;url=profile-settings.php");
                    exit();
                }
            } else if ($_POST['access'] == 'instructor') {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $biography = $_POST['biography']; 
                $gender = $_POST['gender'];
                $userid = $_POST['id'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE `instructor_tbl`
                                              SET `firstname` = ?,
                                                  `lastname` = ?,
                                                  `email` = ?,
                                                  `biography` = ?, 
                                                  `gender` = ?
                                                  
                                            WHERE `id` = ?");
                $stmt->execute([$firstname, $lastname, $email, $biography, $gender, $userid]);
                $result = $stmt->rowCount();

                if ($result > 0) {

                    $_SESSION['status'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        Profile updated successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

                    header("refresh:0;url=profile-settings.php");
                    exit();
                }
                /* echo '<script>alert("potangina");</script>'; */
            } else {
            }
        }
    }

    public function getData($id, $usertype)
    {

        if ($usertype == 'student') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data;
        } else if ($usertype == 'instructor') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data;
        } else if($usertype == 'admin') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `admin_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data;
        }
    }

    public function uploadProfilePicture($usertype)
    {
        if (isset($_POST['upload'])) {
            $userid = $_POST['id'];
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];

            if ($error === 0) {
                $connection = $this->openConnection();

                if ($usertype == 'student') {
                    $stmt = $connection->prepare("SELECT profile FROM user_tbl WHERE id = ?");
                } else if ($usertype == 'instructor') {
                    $stmt = $connection->prepare("SELECT profile FROM instructor_tbl WHERE id = ?");
                }
                $stmt->execute([$userid]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $previousProfilePicture = $row['profile'];

                if (!empty($previousProfilePicture)) {
                    $previousProfilePicturePath = $_SERVER['DOCUMENT_ROOT'] . '/eduLearn/uploads/' . $previousProfilePicture;
                    if (file_exists($previousProfilePicturePath)) {
                        unlink($previousProfilePicturePath);
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
                        // Generate filename based on the date and time format
                        date_default_timezone_set('Asia/Manila');
                        $currentDateTime = date('Y-m-d h:i:s A');
                        $formattedDateTime = date('Y-m-d-h-i-s-A', strtotime($currentDateTime));
                        $new_img_name = "IMG-" . $userid . "-" . $formattedDateTime . '.' . $img_ex_lc;

                        $img_upload_path = '/eduLearn/uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . $img_upload_path);

                        // Update the database with the new profile picture
                        if ($usertype == 'student') {
                            $stmt = $connection->prepare("UPDATE user_tbl SET profile = ? WHERE id = ?");
                        } else if ($usertype == 'instructor') {
                            $stmt = $connection->prepare("UPDATE instructor_tbl SET profile = ? WHERE id = ?");
                        }
                        $stmt->execute([$new_img_name, $userid]);
                        $result = $stmt->rowCount();

                        if ($result > 0) {
                            $_SESSION['image'] = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Profile updated successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';

                            header("refresh:0;url=profile-settings.php");
                            exit();
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Failed to update profile.
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

    public function viewProfilePicture($id, $usertype)
    {

        if ($usertype == 'student') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['profile'];
        } else if ($usertype == 'instructor') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['profile'];
        } else {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `admin_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['profile'];
        }
    }

    public function viewFullName($id, $usertype)
    {

        if ($usertype == 'student') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `user_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['firstname'] . " " . $data['lastname'];
        } else if ($usertype == 'instructor') {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `instructor_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['firstname'] . " " . $data['lastname'];
        } else {
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM `admin_tbl` WHERE `id` = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            return $data['firstname'] . " " . $data['lastname'];
        }
    }

    public function changePassword($userid)
    {

        if (isset($_POST['submit'])) {

            $oldPassword = md5($_POST['oldPassword']);
            $newPassword = md5($_POST['newPassword']);
            $confirmPassword = md5($_POST['confirmPassword']);

            if ($newPassword != $confirmPassword) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password do not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                return;
            }

            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT `password` FROM `user_tbl` WHERE `id` = ?");
            $stmt->execute([$userid]);
            $data = $stmt->fetch();
            $result = $stmt->rowCount();

            if ($result > 0) {

                if ($oldPassword == $data['password']) {

                    $connection = $this->openConnection();
                    $stmt = $connection->prepare("UPDATE `user_tbl` SET `password` = ? WHERE `id` = ?");
                    $stmt->execute([$confirmPassword, $userid]);
                    $count = $stmt->rowCount();

                    if ($count > 0) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Password updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Incorrect old password.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
        }
    }

    public function deleteAccount($usertype)
    {

        if (isset($_POST['deleteAccount'])) {

            $id = $_POST['id'];
            $typeDelete = $_POST['typeDelete'];

            if ($typeDelete == 'DELETE') {

                $connection = $this->openConnection();
                if ($usertype == 'student') {
                    $sql = ("DELETE FROM `user_tbl` WHERE `id` = ?");
                } else if ($usertype == 'instructor') {
                    $sql = ("DELETE FROM `instructor_tbl` WHERE `id` = ?");
                }
                $stmt = $connection->prepare($sql);
                $stmt->execute([$id]);
                $result = $stmt->rowCount();

                if ($result > 0) {
                    header("Location: ../login.php");
                    exit();
                }
            } else {
                echo '<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                        TYPE<strong>" DELETE "</strong>ALL CAPS
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    }
}
