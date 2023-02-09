<?php
 include "../views/student-checker.php";
 include '../file/logout-function.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Result</title>
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
                  <p class="mb-1 mt-3"><?php echo ($_SESSION['fullname']); ?> </p>
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
                <li class="breadcrumb-item active">Schedule</li>
            <li class="breadcrumb-item"><a href="../views/user-dashboard.php">Home</a></li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Create Schedule</h5>
                  </div>
                  <!-- Add Bus-->
              <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card body">
                    <form method="POST">
                      <div class="modal-body p-sm-3">
                        <div class="row">
                          <div class="col-md-2 py-2">
                                <small>Date</small>
                          </div>
                          <div class="col-md-4 mx-md-n3 px-lg-2">
                              <div class="form-group">
                              <?php 
                              include '../forms/database.php';
                                  $query1 ="SELECT exam_date FROM admin_schedule";
                                  $result = $conn->query($query1);
                                  if($result->num_rows> 0){
                                    $date_options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                  }
                              ?>
                                 <select required name="exam_date" class="form-control">
                                 <option value="">-- select date --</option>
                                 <?php 
                                    foreach ($date_options as $option) {
                                    ?>
                                      <option><?php echo $option['exam_date']; ?> </option>
                                      <?php 
                                      }
                                    ?>
                                </select> 
                              </div>
                          </div>
                          <div class="col-md-2 py-2 px-lg-4">
                                <small>Strand</small>
                          </div>
                          <div class="col-md-4  mx-sm-0 mx-lg-n4">
                              <div class="form-group">
                                <select required name="strand_opt" class="form-control" onchange="toggleDiv(this.value)">
                                  <option value="">-- select strand --</option>
                                  <option>STEM</option>
                                  <option>ABM</option>
                                  <option>HUMMS</option>
                                  <option>GAS</option>
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 py-2">
                                <small>Preferred Course</small>
                          </div>
                          <div class="col-md-4 mx-md-n3 px-lg-2">
                              <div class="form-group">
                              <?php 
                             
                                  $query2 ="SELECT course FROM courses";
                                  $result = $conn->query($query2);
                                  $array=[];
                                  while ($row = mysqli_fetch_array($result)) {
                                  $array[] = $row['course'];
                             }
                              ?>
                                 <select required name="course_opt" class="form-control">
                                 <option value="">-- select course --</option>
                                 <?php 
                                    foreach ($array as $arr) {
                                    ?>
                                      <option><?php print($arr); ?> </option>
                                      <?php 
                                      }
                                    ?>
                                </select> 
                              </div>
                          </div>
                          <div class="col-md-2 py-2">
                                <small>Related hobbies</small>
                          </div>
                          <div class="col-md-4 mx-md-n3 px-lg-2">
                              <div class="form-group">
                              <?php 
                             
                                  $query2 ="SELECT hobby FROM hobbies";
                                  $result = $conn->query($query2);
                                  $array=[];
                                  while ($row = mysqli_fetch_array($result)) {
                                  $array[] = $row['hobby'];
                             }
                              ?>
                                 <select required name="related_hobbies_opt" class="form-control">
                                 <option value="">-- select hobbies --</option>
                                 <?php 
                                    foreach ($array as $arr) {
                                    ?>
                                      <option><?php print($arr); ?> </option>
                                      <?php 
                                      }
                                    ?>
                                </select> 
                              </div>
                          </div>
                          <div class="col-md-2 py-2">
                                <small>Related Interest</small>
                          </div>
                          <div class="col-md-4 mx-md-n3 px-lg-2">
                              <div class="form-group">
                              <?php 
                             
                                  $query2 ="SELECT related_hobbies FROM courses";
                                  $result = $conn->query($query2);
                                  $array=[];
                                  while ($row = mysqli_fetch_array($result)) {
                                  $array[] = $row['related_hobbies'];
                             }
                              ?>
                                 <select required name="related_interest_opt" class="form-control">
                                 <option value="">-- select interest --</option>
                                 <?php 
                                    foreach ($array as $arr) {
                                    ?>
                                      <option><?php //print($arr); ?>sample interest </option>
                                      <?php 
                                      }
                                    ?>
                                </select> 
                              </div>
                          </div>
                            </div>
               
                      </div>
                      <div class="modal-footer">
                        <input type="submit" name="Add" class="btn btn-primary" id="btnAdd" value="Add"/>
                        <?php
                          if (isset($_POST['Add'])){
                          $url = 'localhost';
                          $username = 'root';
                          $password = '';       
                          $exam_code = bin2hex(random_bytes(10));                    
                          $date = $_POST['exam_date'];                      
                          $strand = $_POST['strand_opt'];                      
                          $pref_course = $_POST['course_opt'];                      
                          $related_hobbies = $_POST['related_hobbies_opt'];                      
                          $related_interest = $_POST['related_interest_opt'];                        
                          $conn = new mysqli($url, $username, $password, 'project');
                          if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                          }
                          $sql = mysqli_query($conn,
                          "INSERT INTO generated_codes(exam_key,exam_date, strand, pref_course, hobbies, interest,exam_key_created_at) VALUES ('".$exam_code."','".$date."','".$strand."', '".$pref_course."', '".$related_hobbies."', '".$related_interest."', NOW() )
                          ");
                              echo "<script> window.location = 'user-profiling.php' </script>";
                          }
                        ?>
                        
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Add Bus-->
          
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
  </body>
</html>