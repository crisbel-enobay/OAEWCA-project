<?php
include '../file/logout-function.php';
include '../views/student-checker.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exam-Info</title>
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
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
       <!-- partial:partials/_navbar.html -->
       <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/Kursonada.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/Kursonada-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?> </h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"> <?php echo ($_SESSION['fullname']); ?></span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo ($_SESSION['email']); ?></p>
                </div>
                <a href="?log=out" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
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
                  <p class="profile-name">Student user</p>
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
            <li class="nav-item active">
              <a class="nav-link" href="../views/user-exam.php">
                <span class="menu-title">Examination</span>
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
                  <li class="breadcrumb-item"><a href="../views/user-exam.php">Examination</a></li>
                  <li class="breadcrumb-item active">More info</li>
                </ol>
              </nav>
            </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">More Information</h5>
                    <p class="ml-auto mb-0"><a href="user-exam.php">Take Examination?</a><i class="icon-bulb"></i></p>
                  </div>
                  
                  <div class="card-body col-md-12">
                    <blockquote class="blockquote blockquote-primary">
                    <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5>Subjects To Take</h5> 
                        </div>
                      <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                      <div class="col-sm-4 col-md-3 p-3 text-center btn-wrapper">
                        <p>English</p>
                      </div>
                      <div class="col-sm-4 col-md-2 p-3 text-center btn-wrapper">
                        <p>Math</p>
                      </div>
                      <div class="col-sm-4 col-md-2 p-3 text-center btn-wrapper">
                        <p>Filipino</p>
                      </div>
                      <div class="col-sm-4 col-md-2 p-3 text-center btn-wrapper">
                        <p>Science</p>
                      </div>
                      <div class="col-sm-4 col-md-2 p-3 text-center btn-wrapper">
                        <p>Logic</p>
                      </div>
                    </div>
                    </blockquote>
                  </div>
              </div>
              </div>
                  
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Requirements</h4>
                    <p class="card-description"> Students must have the following: </p>
                    <h6 class="lead">Reminder</h6>
                      <ul class="list-ticked">
                        <li>once online enrollment has been confirmed and a student number has been obtained, requirements must be submitted to the registrar's office (unless specifically stated to be submitted prior to admission). Enrollment is conditional upon receipt of all required paperwork (original hard copies) in person. <br>
                        The Registrar will make known the submission deadline. Please be aware that any needs you provide will belong to UCC and won't be given back to you.</li>
                        <li>Applicants may submit documents on campus </li>
                      </ul>
                      <h6 class="lead">Additional Health Requirements:</h6>
                      <ul class="list-ticked">
                        <li>All College or applicants who will undergo in-person classes MUST be *fully vaccinated against COVID-19. While it is not required by DepEd, we encourage our High School students to have their COVID-19 vaccinations when eligible.</li>
                        <li>Fully vaccinated means a person has received all recommended doses in their primary series of COVID-19 vaccines.</li>
                      </ul>
                      
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Instructions</h4>
                    <p class="card-description"> Students should do the following: </p>
                      <h6 class="lead">Before Exam</h6>
                        <ul class="list-ticked">
                          <li>Please make sure that:<br>
                            •	You have an active user account. Log on to ______.<br>
                            •	You remember the password for your account. If you have forgotten your password, you can change it at _______.                               
                          </li>
                          <li>When using a laptop at digital examinations, the laptop has to be set up as soon as possible. Make sure that the internet connection is stable.</li>
                          <li>You must bring your own scratch paper for use during the examination.</li>
                          <li>If failure to comply with these recommendations results in technical problems that cause a delay in your examination, you cannot expect to be granted extended time.</li>
                        </ul>
                        <h6 class="lead">During Exam</h6>
                        <ul class="list-ticked">
                          <li>You are required to comply with the directions given by the head invigilator or admin.</li>
                          <li>You must be visible on the screen or camera of the devices.</li>
                          <li>You may keep food and drink on or by the desk during the entire examination. You may eat and drink whenever you want.</li>
                          <li>You are not permitted to leave the examination for a break.  </li>
                          <li>You must be visible on the screen or camera of the devices.</li>
                          <li>If anything in the examination question is unclear, you can contact the lecturer or admin. Such contact is facilitated by the head invigilator.</li>
                          <li>Papers and computer/laptop are to be covered when you leave your place.</li>
                          <li>If you experience technical problems during a digital examination, you must immediately contact one of the invigilators. The invigilator will call for technical support. Failure to report such technical problems might be treated as cheating or an attempt to cheat.</li>
                        </ul>
                        <h6 class="lead">After Exam</h6>
                        <ul class="list-ticked">
                          <li>You can withdraw from an examination, at the earliest, one hour after the examination has started. Contact the head invigilator and complete a withdrawal form. Withdrawals during an examination will be treated as an examination attempt. You have to contact the head invigilator before you close down the examination program at digital examination.</li>
                          <li>If you fall ill during the examination and cannot complete it, you can withdraw from the examination. Contact the head invigilator and complete a withdrawal form. In order for an absence caused by illness to be registered as legitimate absence, you must see a doctor immediately after leaving the examination venue. The doctor's certificate must be issued on the day of the examination and must identify the illness that arose during the examination. The doctor's certificate, possibly along with an application for a postponed examination, must be sent or submitted to the faculty in charge of the examination within the deadlines set by the Faculty. It is your responsibility to apply to the Faculty and to submit the relevant documentation and to assure you have the information about the deadlines that apply. Withdrawal from an examination due to documented illness is not considered an examination attempt.</li>
                        </ul>
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
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/moment/moment.min.js"></script>
    <script src="../vendors/daterangepicker/daterangepicker.js"></script>
    <script src="../vendors/chartist/chartist.min.js"></script>
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