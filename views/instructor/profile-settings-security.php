<?php include('../../components/navbar-instructor.php'); ?>

<?php
ob_start();

// if (isset($userid)) {
//     echo '<script>alert("session is set: ' . $userid . '")</script>';
// }
// else {
//     echo '<script>alert("session not set")</script>';
// }
if (isset($userid)) {

    $fetch = new AccountSettings();
    $userData = $fetch->getData($userid, $usertype);
}

?>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile Settings</h2>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <nav class="nav nav-borders">
                <a class="nav-link ms-0" href="profile-settings.php">
                    Profile
                </a>
                <a class="nav-link" href="profile-settings-security.php">
                    Security
                </a>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">Change Password</div>
                        <div class="card-body">
                            <?= profileSettingsSecurity($userid); ?>
                            <form method="post">
                                <!-- Old Password -->
                                <div class="form-floating mb-3">
                                    <input type="password" name="oldPassword" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword">Old Password</label>
                                </div>

                                <!-- New Password -->
                                <div class="form-floating mb-3">
                                    <input type="password" name="newPassword" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword">New Password</label>
                                </div>

                                <!-- Repeat new Password -->
                                <div class="form-floating mb-3">
                                    <input type="password" name="confirmPassword" class="form-control" id="floatingPassword" placeholder="repeatPassword" required>
                                    <label for="floatingPassword">Repeat new Password</label>
                                </div>

                                <!-- access & ID -->
                                <input type="hidden" class="form-control" name="access" value="<?= $userData['access']; ?>">
                                <input type="hidden" class="form-control" name="id" value="<?= $userData['id']; ?>" >

                                <input type="submit" value="Save New Password" name="submit" class="mt-4 btn btn-block btn-primary col-md-12">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">Delete Account</div>
                        <div class="card-body">
                            <p>
                                Deleting your account is a permanent action and cannot be
                                undone. If you are sure you want to delete your account, select
                                the button below.
                            </p>
                            <input type="submit" value="I understand, delete my account" data-bs-toggle="modal" data-bs-target="#exampleModal" class="mt-4 btn btn-block btn-danger col-md-12">


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting your account will remove all your information from our database. This cannot be undone.
                                            <br>
                                            <b>To confirm this, type "DELETE"</b>
                                            <?= deleteAccount($userData['access']); ?>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="post">
                                            <input type="hidden" class="form-control" name="id" value="<?= $userData['id']; ?>" >
                                                <input type="hidden" class="form-control" name="access" value="<?= $userData['access']; ?>">
                                                <input type="text" class="col-md-6" name="typeDelete" placeholder="type here" required>
                                                <input type="submit" value="Delete my account" name="deleteAccount" class="btn btn-block btn-danger ">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include('../../components/footer.php'); ?>