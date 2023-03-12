
<?php
include '../file/logout-function.php';
include "../views/student-checker.php";
?>
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
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style-admin.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/ucc.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/Kursonada.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/Kursonada-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?>!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"> <?php echo ($_SESSION['fullname']); ?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo ($_SESSION['email']); ?></p>
                </div>
                <a href="?log=out"e class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="designation">Student</p>
                </div>
                <div class="icon-container">
                  <i class="icon-user"></i>
                  <div class="dot-indicator bg-success"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Student Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user-dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Admission Exam</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user-exam.php">
                <span class="menu-title">Examination</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user-profiling.php">
                <span class="menu-title">Schedule</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user-results.php">
                <span class="menu-title">Results</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Examination</li>
                  <li class="breadcrumb-item"><a href="../views/more-info.php">More info</a></li>
                </ol>
              </nav>
            </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Admission Exam</h5>
                    <p class="ml-auto mb-0"><a href="more-info.php">More information?</a><i class="icon-bulb"></i></p>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center">
                    <blockquote class="blockquote blockquote-primary">
                      <p>Welcome to UCC-OAEW/CA!, We are here to recommend courses and support your decisions.</p>
                      <footer class="blockquote-footer">from the <cite title="Source Title">Developers</cite></footer>
                    </blockquote>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center">
                      <button id="keyPass" type="submit" class="btn btn-outline-primary btn-fw" data-bs-toggle="modal" data-bs-target="#transactionModal">Take Examination</button>
                  </div>
                   <!-- Insert keyPass -->
                   <form id ="myForm"method="POST">
                  <div class="modal fade" id="transactionModal" tabindex="-1"role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role ="document">
                      <div class="modal-content">
                        <div class="modal-body"> 
                          <div class="col-md-12 d-flex align-items-center justify-content-center py-3 ">
                            <h5 class="modal-title" id="exampleModalLabel">Insert Examination Keypass</h5>
                          </div>
                          <div class="form-group">
                            <input type="text" id="inputkey" name="inputkey" placeholder="Input Key" class="form-control">
                          </div>
                          <div class="d-flex align-items-center justify-content-center">
                        
                          
                           
                            <div style="display: flex; justify-content: center;">
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-fw">Submit</button>                        
                          </div>
                          <div id="message" style="display: none;"></div>
                              
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright BSCS4B Group 3</span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script>
$(document).ready(function() {
  $("#myForm").submit(function(e) {
    e.preventDefault(); // prevent the form from submitting

    var inputkey = $("#inputkey").val();

    // make an AJAX request to submit the form data
    $.ajax({
  type: "POST",
  url: "../forms/insert-key.php",
  data: { inputkey: inputkey },
  success: function(response) {
    if (response.trim().toLowerCase() == 'valid') {
        setTimeout(function() {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Your key is valid and has been approved. You can take the exam',
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false
        }).then((result) => {
          window.location.href = 'user-exam-topic.php';
        });
      }, 100);
    } else if (response.trim().toLowerCase() == 'invalid') {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Sorry',
          text: 'Your key is not valid. Please try again.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    } 
    else if (response.trim().toLowerCase() == 'invaliddate') {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Sorry',
          text: 'Your key is not valid at this time',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    }
    else if (response.trim().toLowerCase() == 'pending') {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Sorry',
          text: 'Your key is valid but it has not been approved yet.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    } else if (response.trim().toLowerCase() == 'expired') {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Sorry',
          text: 'Your key has expired. Please contact the administrator for assistance.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    } else if (response.trim().toLowerCase() == 'started') {
      setTimeout(function() {
        Swal.fire({
          icon: 'warning',
          title: 'Sorry',
          text: 'Your key is not valid at this time. Please wait until the exam starts.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    } else if (response.trim().toLowerCase() == 'ended') {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Sorry',
          text: 'Your key is not valid at this time. The exam has already ended.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    } else {
      setTimeout(function() {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred. Please try again later.',
          showConfirmButton: true
        }).then((result) => {
          window.location.href = 'user-exam.php';
        });
      }, 100);
    }
  }
});
  });
});
</script>
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/moment/moment.min.js"></script>
    <script src="../vendors/daterangepicker/daterangepicker.js"></script>
    <script src="../vendors/chartist/chartist.min.js"></script>
     <!-- Vendor JS Files -->
     <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
 

  </body>
</html>