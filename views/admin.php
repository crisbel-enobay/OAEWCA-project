<?php 
  include 'conn.php';
  include '../file/logout-function.php';
  include '../forms/adminQueries.php';
  include "admin-checker.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
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
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?>!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
          <li class="nav-item dropdown"> <!--for mobile ui user drop down -->
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"><?php echo ($_SESSION['fullname']); ?></span></a>
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
          <li class="nav-item nav-profile sidebar-menu-title"><!--for sidebar user drop down -->
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
            <li class="nav-item nav-category sidebar-menu-title"><!--for sidebar user drop down -->
              <span class="nav-link">Admin Dashboard</span>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../views/admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-courses.php">
                <span class="menu-title">Courses</span>
                <i class="icon-list menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-subjects" aria-expanded="false" aria-controls="ui-subjects">
                <span class="menu-title">Subjects</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-subjects">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/manage-subjects.php">Manage Subjects</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/new-subject.php">New Subject</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-topics" aria-expanded="false" aria-controls="ui-topics">
                <span class="menu-title">Topics</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-topics">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/manage-topics.php">Manage Topics</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/new-topic.php">New Topic</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-schedule.php">
                <span class="menu-title">Schedule</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-applicants" aria-expanded="false" aria-controls="ui-applicants">
                <span class="menu-title">Applicants</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-applicants">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../views/results.php">Results</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/examiners.php">Examiners</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/unverified.php">Unverified Applicants</a></li>
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
                      <div class="card m-0 p-0">
                        <div class="card-body m-0">
                            <h5 class="card-title">Total Courses
                              <h3 class="text-success"><?php
                                      $rows = getCourses();
                                      echo count($rows);
                                      ?>
                                      <span class="text-muted lead pt-1">courses</span>
                              </h3>
                            </h5>
                        </div>
                        <a href="../views/admin-courses.php" class="align-self-end px-4">View more</a>
                      </div>
                </div>

                <div class="col-sm-3 grid-margin stretch-card">
                      <div class="card m-0 p-0">
                        <div class="card-body m-0">
                            <h5 class="card-title">Total Subjects
                              <h3 class="text-success"><?php
                                      $rows = getResults();
                                      echo count($rows);
                                      ?>
                                      <span class="text-muted lead pt-1">subjects</span>
                              </h3>
                            </h5>
                        </div>
                        <a href="../views/manage-subjects.php" class="align-self-end px-4">View more</a>
                      </div>
                </div>
                
                <div class="col-sm-3 grid-margin stretch-card">
                      <div class="card m-0 p-0">
                        <div class="card-body m-0">
                            <h5 class="card-title">Total Topics
                              <h3 class="text-success"><?php
                                      $rows = getTopics();
                                      echo count($rows);
                                      ?>
                                      <span class="text-muted lead pt-1">topics</span>
                              </h3>
                            </h5>
                        </div>
                        <a href="../views/manage-topics.php" class="align-self-end px-4">View more</a>
                      </div>
                </div>

                <div class="col-sm-3 grid-margin stretch-card">
                      <div class="card m-0 p-0">
                        <div class="card-body m-0">
                            <h5 class="card-title">Total Unverified
                              <h3 class="text-success"><?php
                                      $rows = getUnapprovedStudent();
                                      echo count($rows);
                                      ?>
                                      <span class="text-muted lead pt-1">applicants</span>
                              </h3>
                            </h5>
                        </div>
                        <a href="../views/unverified.php" class="align-self-end px-4">View more</a>
                      </div>
                </div>
              </div>     
              <!-- chart -->
              <div class="row income-expense-summary-chart mt-3">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body performane-indicator-card">
                  <div><canvas id="myChart" style="width:50%; height: 30%;"></canvas>
	                <script src="../js/ave_chart.js"></script></div>
                  </div>
                </div>
              </div>   
        <!-- Quick Action Toolbar Starts-->
            <div class="col-md-12 grid-margin">
              <div class="card">
              <form id="myform" action="" method="POST">
                  <div class="card-header d-block d-md-flex">
                  <p class="lead mb-0 ">Entrance Exam Results</p>
                  </div>
                  <div class="table-responsive border rounded p-1">    
                      <table class="table table-hover text-nowrap datatable">
                      <thead>
                      <tr>
                          <th class="font-weight-bold text-center" id="status" scope="col" >STATUS</th>
                          <th class="font-weight-bold text-center" scope="col">ID</th>
                          <th class="font-weight-bold text-center" scope="col">STUDENT NAME</th>
                          <th class="font-weight-bold text-center" scope="col">EMAIL</th>
                          <th class="font-weight-bold text-center" scope="col">EXAM DATE</th>
                          <th class="font-weight-bold text-center" scope="col">SCORE</th>
                          <th class="font-weight-bold text-center" scope="col">REMARKS</th>
                          <th class="font-weight-bold text-center" scope="col">ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                         // Create connection
                         $conn = new mysqli('localhost', 'root', '', 'project');
                         // Check connection
                         if ($conn->connect_error) {
                           die("Connection failed: " . $conn->connect_error);
                         }
                        $rows = getResults();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results {
                           $row = $rows[$i];
                          $status = $row["status"];
                          $id = $row["id"];
                          $email = $row['email'];
                          // $exam_key = $row["exam_key"];
                          $exam_date = $row["exam_date"];
                          // $formattedTime = date('h:i A', strtotime($row['exam_time']));
                          // $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                          // $pref_course = $row["pref_course"];
                          // $traits = $row["traits"];
                          // $interest = $row["interest"];
                          // $skill = $row["skill"];
                          // $career_goal = $row["career_goal"];
                          // $exam_key_created_at = $row["exam_key_created_at"];
                          echo "<tr>";
                          // echo "<td><input type='checkbox' name='user_ids[]' value='".$row['id']."'></td>";
                          if ($row['status'] == 'active' || $row['status'] == 'finished') {
                            echo "<td><div class='badge badge-success p-2'>" . $row['status'] . "</div></td>";
                        } elseif ($row['status'] == 'pending') {
                            echo "<td><div class='badge badge-danger p-2'>" . $row['status'] . "</div></td>";
                        } else {
                            echo "<td><div class='badge badge-secondary p-2'>" . $row['status'] . "</div></td>";
                        }
                          echo "<td>" . $row["id"] . "</td>";
                          echo "<td>" . $row["fullname"] . "</td>";
                          echo "<td>" . $row["email"] . "</td>";
                          echo "<td>" . $row["exam_date"] . "</td>";
                          echo "<td>" . $row["score"] . "</td>";
                          if ($row['remarks'] == 'passed') {
                            echo "<td><div class='badge badge-success p-2'>" . $row['remarks'] . "</div></td>";
                        } elseif ($row['remarks'] == 'failed') {
                            echo "<td><div class='badge badge-danger p-2'>" . $row['remarks'] . "</div></td>";
                        } else {
                            echo "<td><div class='badge badge-secondary p-2'>" . $row['remarks'] . "</div></td>";
                        }
                          // echo "<td>" . $row["exam_key"] . "</td>";
                          // echo "<td>" . $formattedTime . "</td>";
                          // echo "<td>" . $formattedTime2 . "</td>";
                          echo "<td><div class='text-center'><button name='btnmodal' type='button' class='btn btn-primary view-btn' data-toggle='modal' data-target='#viewModal' data-id='" . $id . "'>View Profiling</div></button></td>";
                    
                          // echo      "<td>". "<div class='d-flex '>
                          //       <form method='POST' action='../forms/delete_bus.php'>
                          //                 <button type='button' id='editButton' class = 'btn btn-primary mx-3 editbtn' data-bs-toggle='modal' data-bs-target='#editmodal' data-courseID='$id' data-coursename='$email' data-eng='$exam_date' data-mat='$pref_course' data-fil='$interest' data-sci='$hobbies' onClick='editCourse(this)'>EDIT</button>
                          //               </form>" .
                          //     "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id' onClick='archiveCourse(this)'>ARCHIVE</button>" .
                          //     "</div>" .
                          //     "</td>" .
                          echo "</tr>";
                               $i++;
                        }
                        
                        mysqli_close($conn);
                      ?>
                      </tbody>
                    </table>
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
    <!-- Other Custom JS -->
  </body>
</html>