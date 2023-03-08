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
    <title>Category-Courses</title>
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
    <!-- SweetAlert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <style>


  </style>
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
                
                <?php
                  function log_off() {
                    $_SESSION['valid'] = false;
                    unset($_SESSION['user']);
                    unset($_SESSION['type']);
                    unset($_SESSION['name']);
                    echo "<script> window.location = './loginform.php' </script>";
                  }
                
                  if (isset($_GET['off'])) {
                    log_off();
                  }
                  ?>

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
            <li class="nav-item active">
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
                  <li class="nav-item"> <a class="nav-link" href="../views/passers.php">Passers</a></li>
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
                <li class="breadcrumb-item active">Exam Schedule List</li>
                <li class="breadcrumb-item"><a href="../views/admin-exam-key.php">Exam Keys</a></li>
                <li class="breadcrumb-item"><a href="../views/archived_schedule.php">Archive</a></li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Exam Schedules</h5>
                  </div>
                  <div class="table-responsive border rounded p-1">
                  <table class="table table-hover text-nowrap datatable">
                        <thead>
                            <tr>
                            <th class="font-weight-bold" scope="col">ID</th>
                            <th class="font-weight-bold" scope="col">EXAM DATE</th>
                            <th class="font-weight-bold" scope="col">START TIME</th>
                            <th class="font-weight-bold" scope="col">END TIME</th>
                            <th class="font-weight-bold" scope="col">EXAM DATE CREATED AT</th>
                            <th class="font-weight-bold" scope="col">ACTION</th>
                          </thead>
                        <tbody>

                            <?php
                            $rows = getExamDates();
                            $i = 0;
                                while ($i < count($rows)) {   //Creates a loop to loop through results
                                    $row = $rows[$i];
                                    $id = $row['id'];
                                    $formattedTime = date('h:i A', strtotime($row['exam_time']));
                                    $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                                    $exam_date = $row['exam_date'];
                                    $datecreated = $row['exam_date_created'];                      
                                    echo "<tr>
                                    <td>" . $id . "</td>
                                    <td>" .$exam_date . "</td>
                                    <td>" . $formattedTime . "</td>
                                    <td>" . $formattedTime2 . "</td>
                                    <td>" . $datecreated . "</td>
                                    <td>" .
                                  "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-dateid='$id' onClick='deleteSchedule(this)'>Delete</button>" .
                                         "</td>

                                    </tr>";  //$row['index'] the index here is a field name
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                  </div>
              <div>
                <button type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">Add Exam Date</button>
              </div>

              <!-- Add Bus-->
              <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Exam Schedule</h5>
                    </div>

                    <form method="POST">
                      <div class="modal-body p-5">
                        <div class="mb-3">
                          <label>Select Date</label>
                          <input type="date" value="<?= date('Y-m-d') ?>" name="date" id="schedule date"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label>Select Time</label>
                          <select name="start_time" id="time">
                              <option value="06:00:00">06:00 AM</option>
                              <option value="07:00:00">07:00 AM</option>
                              <option value="08:00:00">08:00 AM</option>
                              <option value="09:00:00">09:00 AM</option>
                              <option value="10:00:00">10:00 AM</option>
                              <option value="11:00:00">11:00 AM</option>
                              <option value="12:00:00">12:00 PM</option>
                              <option value="13:00:00">01:00 PM</option>
                              <option value="14:00:00">02:00 PM</option>
                              <option value="15:00:00">03:00 PM</option>
                              <option value="16:00:00">04:00 PM</option>
                              <option value="17:00:00">05:00 PM</option>
                              <option value="18:00:00">06:00 PM</option>
                              <option value="19:00:00">07:00 PM</option>
                              <option value="20:00:00">08:00 PM</option>
                              <option value="21:00:00">09:00 PM</option>
                              <option value="22:00:00">10:00 PM</option>
                              <option value="23:00:00">11:00 PM</option>
                        </select>
                        <label>Select Time</label>
                          <select name="end_time" id="time">
                              <option value="06:00:00">06:00 AM</option>
                              <option value="07:00:00">07:00 AM</option>
                              <option value="08:00:00">08:00 AM</option>
                              <option value="09:00:00">09:00 AM</option>
                              <option value="10:00:00">10:00 AM</option>
                              <option value="11:00:00">11:00 AM</option>
                              <option value="12:00:00">12:00 PM</option>
                              <option value="13:00:00">01:00 PM</option>
                              <option value="14:00:00">02:00 PM</option>
                              <option value="15:00:00">03:00 PM</option>
                              <option value="16:00:00">04:00 PM</option>
                              <option value="17:00:00">05:00 PM</option>
                              <option value="18:00:00">06:00 PM</option>
                              <option value="19:00:00">07:00 PM</option>
                              <option value="20:00:00">08:00 PM</option>
                              <option value="21:00:00">09:00 PM</option>
                              <option value="22:00:00">10:00 PM</option>
                              <option value="23:00:00">11:00 PM</option>
                        </select>
                        </div>
                    
                      <div class="modal-footer">
                        <input type="submit" name="exam_schedule_date" class="btn btn-primary" id="btnAdd" value="Add"/>
                        <?php
                            if(session_status() !== PHP_SESSION_ACTIVE) 
                            {
                                session_start();
                            }
                            $con = mysqli_connect("localhost","root","","project");

                            if (isset($_POST['exam_schedule_date'])) {
                              $ExamDate = date('Y-m-d', strtotime($_POST['date']));
                              // Get the selected time value from the form
                              $start_time = $_POST['start_time'];
                              $end_time = $_POST['end_time'];
                          
                              // Convert the selected value into a PHP time string
                              $start_timeString = date('H:i:s', strtotime($start_time));
                              $end_timeString = date('H:i:s', strtotime($end_time));
                          
                              $query = "INSERT INTO admin_schedule (exam_date, exam_time,exam_time_end, exam_date_created) 
                                        VALUES ('$ExamDate', TIME(' $start_timeString'), TIME('$end_timeString'), NOW())";
                              $query_run = mysqli_query($con, $query);
                          
                                
                                if($query_run)
                                {
                                    echo "<script> window.location = '../views/admin-schedule.php' </script>";
                                }
                                else
                                {
                                    echo "<script> window.location = '../views/admin-schedule.php' </script>";
                                }

                            }
                            ?>
                         
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Add Bus-->

               <!-- Archive Modal -->
               <div class="modal fade" id="delmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove Schedule</h5>
                      </div>
                      <form method="POST">
                        <div class="modal-body">
                          <input type="hidden" name="rem_id" id="exam_date_id" />
                          <h4>Are you sure you want to remove this Schedule?</h4>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="Archive" class="btn btn-danger" value="Yes" />
                          <?php
                            if (isset($_POST['Archive'])){
                              $url = 'localhost';
                              $username = 'root';
                              $password = '';                     
                              $delid = $_POST['rem_id'];                   
                              $conn = new mysqli($url, $username, $password, 'project');
                              if ($conn->connect_error) {
                                  die("Connection failed!:" . $conn->connect_error);
                              }
                              // $sql = mysqli_query($conn,
                              // "DELETE FROM courses WHERE crs_id = ".$delid."
                              // ");
                              // $sql = mysqli_query($conn,
                              // "INSERT archived_courses
                              // (crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic)
                              // SELECT crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic FROM courses
                              // WHERE crs_id = ". $delid ."
                              // ");
                              $sql2 = mysqli_query($conn,
                              "DELETE FROM admin_schedule
                              WHERE id = ". $delid ."
                              ");
                              echo "<script> window.location = '../views/admin-schedule.php' </script>";
                              }
                          ?>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Archive Modal -->

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
      function deleteSchedule(value) {
      let dateID = value.getAttribute("data-dateid");
      document.querySelector("#exam_date_id").value = dateID;
    }
  </script>
  </body>
</html>