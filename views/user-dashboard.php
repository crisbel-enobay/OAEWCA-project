<?php
    include '../forms/adminQueries.php';
    include "../views/student-checker.php";
    include '../file/logout-function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!--for sidebar user drop down -->
    <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css"><!--for sidebar user drop down -->
    <link rel="stylesheet" href="../assets/css/styles-admin.css"><!--new admin style -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/ucc.png" />
  </head>
  <style>
  table {
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    width: 100%;
  }
  
  .badge-custom{
    padding: 5px;
  }

  th, td {
    border: 1px solid #ddd;
  }
  th {
    color: black;
    font-weight: bold;
  }
.modal-content {
  border-radius: 10px;
}

.modal-header {
  background-color: #5bc0de;
  color: #fff;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.modal-title {
  font-weight: bold;
}

.close {
  color: #fff;
}

.modal-body {
  font-size: 16px;
  padding: 10px;
}

</style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/Kursonada.png" alt="logo" class="logo-dark" />
          </a>
            <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex button-sm" type="button" data-toggle="minimize">
              <span class="icon-menu"></span><!--sidebar button-->
            </button>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/Kursonada-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?> </h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown"> <!--for mobile ui user drop down -->
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
      <?php
        include("../forms/database.php");
        include("../forms/alert.php");

        if ($_GET) {
            $val = $_GET['status'];
            alert($val);
        }
        ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile sidebar-menu-title"><!--for sidebar user drop down -->
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
            <li class="nav-item nav-category sidebar-menu-title"><!--for sidebar user drop down -->
              <span class="nav-link">Student Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user-dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category sidebar-menu-title"><span class="nav-link">Entrance Exam</span></li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-subjects" aria-expanded="false" aria-controls="ui-subjects">
                <span class="menu-title">Examination</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-subjects">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/user-exam.php">Take Exam</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/more-info.php">More Info</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-subjects" aria-expanded="false" aria-controls="ui-subjects">
                <span class="menu-title">Schedule</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-subjects">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/user-profiling.php">Exam Schedule</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/user-exam_key.php">Exam key</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-subjects" aria-expanded="false" aria-controls="ui-subjects">
                <span class="menu-title">Result</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-subjects">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/user-exam_results.php">Exam Result</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12 grid-margin quick-action-toolbar">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <p class="lead mb-0">Welcome to UCC - Kursonada!</p>
                  </div>
              </div>
            </div>
          
          <div class="col-md-12 grid-margin quick-action-toolbar">
          <div class="row">   
            <div class="col-sm-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Schedule an Exam</h5>
                        <a href="../views/user-profiling.php" class="align-self-end px-4">View more</a>
                    </div>
                    </div>
                  </div>
                  <div class="col-sm-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Exam Key</h5>
                          <a href="../views/user-exam_key.php" class="align-self-end px-4">View more</a>
                    </div>
                  </div>
              </div>
             
             <div class="col-sm-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">More info</h5>
                          
                      <a href="../views/more-info.php" class="align-self-end px-4">View more</a>
                  </div>
                  </div>
                </div>

            <div class="col-sm-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Take Examination</h5>
                          
                      <a href="../views/user-exam.php" class="align-self-end px-4">View more</a>
                  </div>
                  </div>
                </div>
            </div>
            
            <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
                  <div class="card">
              <div class="card-header d-block d-md-flex">
                    <p class="lead mb-0">Courses Available</p>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table table-hover text-nowrap datatable">
                    <thead>
                        <tr>
                          <th scope="col">COURSES</th>
                          <th scope="col">COURSE NAME</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $rows = getCourses();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results
                          $row = $rows[$i];
                          $courseName = $row['courses'];
                          $course = $row['course'];
                          $crs_desc = $row['crs_desc'];
                          echo "<tr id='expandbutton' data-bs-toggle='modal' data-bs-target='#expandmodal' data-exName='$courseName' data-exCourse='$course' data-exDesc='$crs_desc' onClick='expand(this)'>
                                    <td>" . $courseName . "</td>
                                    <td>" . $course . "</td>
                            
                                  </tr>";  //$row['index'] the index here is a field name
                          $i++; 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- View Modal-->
              <div class="modal fade" id="expandmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Course Description</h5>
                      </div>
                      
                        <div class="modal-body">
                          <h4>Course:<span id = "courses" class="lead"></span></h4>
                          <h4>Course Name:<span id = "course" class="lead"></span></h4>
                          <h4 style="text-align: justify;">Course Description:<span id = "crs_desc" class="lead" ></span></h4>
                          </div><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <script src="../js/hoverable-collapse.js"></script><!--for sidebar user drop down -->
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

        function expand(value) {
          const subname = document.getElementById("courses");
          const subdesc = document.getElementById("course");
          const coursedesc = document.getElementById("crs_desc");
          let courseName = value.getAttribute("data-exName");
          let course = value.getAttribute("data-exCourse");
          let crs_desc = value.getAttribute("data-exDesc");
          subname.innerHTML = ' ' + courseName ;
          subdesc.innerHTML = ' ' + course ;
          coursedesc.innerHTML = ' ' + crs_desc ;
        }
    </script>
    
  </body>
</html>