<?php include('../../components/navbar-instructor.php'); ?>
<?php

ob_start();

if (isset($userid)) {

    $fetch = new AccountSettings();
    $userData = $fetch->getData($userid, $usertype);
} else {
    header("Location: /eduLearn/views/index.php");
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
            <!-- Profile and security -->
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
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <?php $image_url = viewProfilePicture($userid, $usertype); ?>
                            <?php $defaultImage = ($userData['gender'] == 'male' ? 'default-user-male.svg' : 'default-user-female.svg') ?>
                            <img class="object-fit-cover rounded-circle mb-2" height="200" width="200" src="/eduLearn/uploads/<?= $image_url ? $image_url : $defaultImage; ?>" alt />

                            <div class="small font-italic text-muted mb-4">

                            </div>
                            <?= uploadProfilePicture($userData['access']); ?>
                            <?php
                            if (isset($_SESSION['image'])) {
                                echo $_SESSION['image'];
                                unset($_SESSION['image']);
                            }
                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id" value="<?= $userid ?>" required>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="my_image" id="my_image">
                                </div>

                                <input type="submit" name="upload" class="btn btn-primary" value="Update Profile Picture">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <?= profileSettings(); ?>
                            <?php
                            if (isset($_SESSION['status'])) {
                                echo $_SESSION['status'];
                                unset($_SESSION['status']);
                            }
                            ?>
                            <form method="post">
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="fname" value="<?= $userData['firstname']; ?>" required>
                                            <label for="floatingInput">First Name</label>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="lname" value="<?= $userData['lastname']; ?>" required>
                                            <label for="floatingInput">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Biography pa add ng biography sa instructor table -->
                                <!-- <div class="form-floating mb-3">
                                    <textarea class="form-control" name="biography" placeholder="bio" id="floatingTextarea" style="height: 100px; resize: none;"></textarea>
                                    <label for="floatingTextarea">Your Biography</label>
                                </div> -->

                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="<?= $userData['email']; ?>" required>
                                    <label for="floatingInput">Email address</label>
                                </div>

                                <!-- access & ID -->
                                <input type="hidden" class="form-control" name="access" value="<?= $userData['access']; ?>" required>
                                <input type="hidden" class="form-control" name="id" value="<?= $userData['id']; ?>" required>

                                <!-- Gender -->
                                <div>
                                    <div>
                                        Gender
                                    </div>
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" <?php echo ($userData['gender'] == 'male') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" <?php echo ($userData['gender'] == 'female') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>


                                <input type="submit" value="Save Changes" name="submit" class="mt-4 btn btn-block btn-primary col-md-12">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include('../../components/footer.php'); ?>