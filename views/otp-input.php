<?php include('../components/navbar.php'); ?>

<main id="main">

  <section class="wrapper">
    <div class="container">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
        <!-- Form -->
        <form class="rounded shadow p-5">
          <h3 class="text-dark fw-bolder fs-4 mb-2">Two Step Verification</h3>

          <div class="fw-normal text-muted mb-4">
            Enter the verification code we sent to
          </div>

          <!-- Lagay mo email here -->
          <div class="d-flex align-items-center justify-content-center fw-bold mb-4">
            <!-- This is example email -->
            <span>g****n@gmail.com</span>
          </div>

          <div class="otp_input text-start mb-2">

            <label for="digit">Type your 6 digit security code</label>
            <div class="d-flex align-items-center justify-content-between mt-2">
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();" autofocus>
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();">
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();">
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();">
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();">
              <input type="text" class="form-control" placeholder="#" maxlength="1" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(this.value.length) this.nextElementSibling.focus();">
            </div>
          </div>

          <button type="submit" class="btn btn-primary submit_btn my-4">Submit</button>

          <div class="fw-normal text-muted mb-2">
            Didn't get the code ? <a href="#" class="text-primary fw-bold text-decoration-none">Resend</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<!-- End #main -->

<?php include('../components/footer.php'); ?>