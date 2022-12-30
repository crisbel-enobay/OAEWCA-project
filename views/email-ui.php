<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admission Exam</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style-admin.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/ucc.png" />
      <!-- SweetAlert JS -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth section-bg">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../assets/img/OAEWCA-LOGO copy.png">
                </div>
                <div class="justify-content-center">
                    <h4 class="text-center font-weight-light">Account Validation</h4>
                </div>
                <p class="font-weight-light text-center small">Enter the OTP code sent to your Email</p>
                <form class="row g-3 needs-validation" action="../forms/user-verification-action.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                      <input type="password" name="otp_code" id="otp_code" class="form-control" placeholder="Input OTP code" aria-label="Username" aria-describedby="basic-addon1">
                      <button type="button" class="btn btn-primary bi bi-eye-slash" id="togglePassword"></span>
                        <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <input class="btn btn-primary w-100" type="submit" name="verify" value="Verify">
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/misc.js"></script>
    <!-- endinject -->
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/jquery.js"></script>

    <!-- Toggle Password -->
    <script>

    $("#togglePassword").click(function() {
      if($('#otp_code').get(0).type == 'password') {
        $('#otp_code').get(0).type = 'text';
        $('#togglePassword').toggleClass('bi bi-eye');
      }
      else {
        $('#otp_code').get(0).type = 'password';
        $('#togglePassword').toggleClass('bi bi-eye');
      }
      
    });

    </script>
  </body>
</html>