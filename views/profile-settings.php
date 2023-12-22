<?php 
/* include($_SERVER['DOCUMENT_ROOT'] . '/edulearn/partials/__header.php'); */
include('../components/navbar-home-page.php');
?>
<!-- Nilagay ko siya sa home folder para ma organize na nasa loob na siya -->

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
            <form method="post">
                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="fname" required>
                            <label for="floatingInput">First Name</label>
                        </div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="lname" required>
                            <label for="floatingInput">Last Name</label>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <!-- Biography pa add ng biography sa user table -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="bio" id="floatingTextarea" style="height: 100px; resize: none;"></textarea>
                    <label for="floatingTextarea">Your Biography</label>
                </div>
                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <!-- Repeat Password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="confirmPassword" id="floatingPassword" placeholder="repeatPassword" required>
                    <label for="floatingPassword">Repeat your Password</label>
                </div>

                <!-- Gender -->
                <div>
                    <h3>Gender</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>

                <input type="submit" value="Save Changes" name="submit" class="mt-4 btn btn-block btn-primary col-md-12">

            </form>
        </div>
    </section>
</main>
<!-- End #main -->
<?php include('../components/footer.php'); ?>