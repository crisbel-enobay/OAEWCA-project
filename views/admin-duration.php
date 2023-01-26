<?php
    include '../forms/adminQueries.php';
    include "admin-checker.php";
    include '../file/logout-function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category-Questions</title>
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
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" /></a>
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
                  <p class="profile-name"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="designation">Administrator</p>
                </div>
                <div class="icon-container">
                  <i class="icon-user"></i>
                  <div class="dot-indicator bg-success"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Admin Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Exam Categories</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-courses.php">
                <span class="menu-title">Courses</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../views/admin-questions.php">
                <span class="menu-title">Questions</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-answer.php">
                <span class="menu-title">Answer</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-results.php">
              <a class="nav-link" href="../views/admin-schedule.php">
                <span class="menu-title">Exam Schedule</span>
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
                <li class="breadcrumb-item"><a href="../views/admin-questions.php">Questions List</a></li>
                <li class="breadcrumb-item active">Durations</li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Durations</h5>
                  </div>
              </div>
          </div>
          <div class="col-md-12 grid-margin">
              <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Exam Duration</h4>
                    <p class="card-description">Duration of Exam per subject</p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <div class="col-md-4 mx-md-n3 px-lg-2">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>Choose a Subject</option>
                                  <option>Filipino</option>
                                  <option>Math</option>
                                  <option>Science</option>
                                  <option>Logic</option>
                                  <option>All Subject</option>
                                </select>
                              </div>
                          </div>
                      </div>
                        <div>
                                <label>Examination Duration</label>
                          </div>
                        <div class="row">
                          <div class="col-md-2 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>hrs</option>
                                  <option>01</option>
                                  <option>02</option>
                                  <option>03</option>
                                  <option>04</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-md-2 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>min</option>
                                  <option>01</option>
                                  <option>02</option>
                                  <option>03</option>
                                  <option>04</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-md-2 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>sec</option>
                                  <option>01</option>
                                  <option>02</option>
                                  <option>03</option>
                                  <option>04</option>
                                </select>
                              </div>
                          </div>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Questions Duration</h4>
                    <p class="card-description">Duration of questionnaires</p>
                    <form class="forms-sample">
                      <div class="form-group">
                          <div class="col-md-4 mx-md-n3 px-lg-2">
                                <div class="form-group">
                                  <select class="form-control">
                                    <option>Choose a Subject</option>
                                    <option>Filipino</option>
                                    <option>Math</option>
                                    <option>Science</option>
                                    <option>Logic</option>
                                    <option>All Subject</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 py-2">
                                <small>Date Starts</small>
                          </div>
                          <div class="col-md-4 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>01/01/23</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-md-2 py-2">
                                <small>Date ends</small>
                          </div>
                          <div class="col-md-4 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>01/01/23</option>
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 py-2">
                                <small>Questionnaires Expiration</small>
                          </div>
                          <div class="col-md-4 m-md-0">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>01/01/23</option>
                                </select>
                              </div>
                          </div>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
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

    <!-- Template Main JS File -->
    <script src="../assets/js/main2.js"></script>

    <!-- Other JS Files -->
    <script>
        <?php include '../assets/js/jquery.js' ?>
    </script>
    
    <script>
            // A function that hides or shows a selected element
            function hideOrShow() {
                
                // Select the element with id "theDIV"
                var x = document.getElementById("theDIV");
                
                // If selected element is hidden
                if (x.style.display === "none") {
                
                // Show the hidden element
                x.style.display = "block";
                
                // Else if the selected element is shown
                } else {
                
                // Hide the element
                x.style.display = "none";
                }
            }
    </script>

  </script>
  </body>
</html>