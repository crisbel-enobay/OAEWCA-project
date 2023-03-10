<?php
    include '../forms/adminQueries.php';
    include '../file/logout-function.php';
    include "admin-checker.php";
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
            <li class="nav-item active">
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
                <li class="breadcrumb-item "><a href="../views/admin-courses.php">Course List </a></li>
                <li class="breadcrumb-item active">Archives</li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <p class="lead mb-0">Archive list - Courses</p>
                  </div>
                    <div class="table-responsive border rounded p-1">
                    <table class="table table-hover text-nowrap datatable">
                        <thead>
                            <tr>
                            <th scope="col">COURSE ID</th>
                          <th scope="col">COURSES</th>
                          <th scope="col">RELATED HOBBIES</th>
                          <th scope="col">ENGLISH</th>
                          <th scope="col">MATH</th>
                          <th scope="col">FILIPINO</th>
                          <th scope="col">SCIENCE</th>
                          <th scope="col">LOGIC</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $rows = getArchivedCourses();
                            $i = 0;
                                while ($i < count($rows)) {   //Creates a loop to loop through results
                                    $row = $rows[$i];
                                    $id = $row['crs_id'];
                                    $courseName = $row['course'];
                                    $hobbies = $row['related_hobbies'];
                                    $eng = $row['English'];
                                    $mat = $row['Math'];
                                    $fil = $row['Filipino'];
                                    $sci = $row['Science'];
                                    $log = $row['Logic'];
                                    echo "<tr>
                                    <td>" . $id . "</td>
                                    <td>" . $courseName . "</td>
                                    <td>" . $hobbies . "</td>
                                    <td>" . $eng . "</td>
                                    <td>" . $mat . "</td>
                                    <td>" . $fil . "</td>
                                    <td>" . $sci . "</td>
                                    <td>" . $log . "</td>
                                    <td>" .
                                    "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id' onClick='restoreCourse(this)'>RESTORE</button>" .
                                         "</td>

                                    </tr>";  //$row['index'] the index here is a field name
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Archive Modal -->
            <div class="modal fade" id="delmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Restore Course Data</h5>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="res_course_id" id="course_id"/>
                                <h4>Are you sure you want to restore this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="Unarchive" class="btn btn-primary">Yes</button>
                                <?php
                            if (isset($_POST['Unarchive'])){
                              $url = 'localhost';
                              $username = 'root';
                              $password = '';                     
                              $resid = $_POST['res_course_id'];                   
                              $conn = new mysqli($url, $username, $password, 'project');
                              if ($conn->connect_error) {
                                  die("Connection failed!:" . $conn->connect_error);
                              }
                              // $sql = mysqli_query($conn,
                              // "DELETE FROM courses WHERE crs_id = ".$delid."
                              // ");
                              $sql = mysqli_query($conn,
                              "INSERT courses
                              (crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic)
                              SELECT crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic FROM archived_courses
                              WHERE crs_id = ". $resid ."
                              ");
                               $sql2 = mysqli_query($conn,
                               "DELETE FROM archived_courses
                               WHERE crs_id = ". $resid ."
                               ");
                              echo "<script> window.location = 'archived_courses.php' </script>";
                              }
                          ?>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            </div>
                        </form>
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
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main JS File -->
    <script src="../assets/js/main2.js"></script>
    <!-- Other JS Files -->
    <script>
    <?php include '../assets/js/jquery.js' ?>
    </script>
<script> </script>
    <script>
        //DELETE
        $(document).ready(function() {
            $('.delbtn').on('click', function() {
                $('#delmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#del_id').val(data[0]);
            });
        });
        function restoreCourse(value) {
      let courseID = value.getAttribute("data-courseid");
      document.querySelector("#course_id").value = courseID;
    }
    </script>
  </body>
</html>