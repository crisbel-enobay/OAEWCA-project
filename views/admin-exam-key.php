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
    text-align: center;
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

#viewProfile p {
  margin-bottom: 5px;
}
p {
  font-weight: bold;
}
.view-btn{
  padding:5px;
}
</style>
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
                <li class="breadcrumb-item "><a href="../views/admin-schedule.php">Exam Schedule List</a></li>
                <li class="breadcrumb-item active">Exam Keys</li>
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
                    <h5 class="mb-0">Exam Keys</h5>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table table-hover text-nowrap datatable">
                      <thead>
                      <tr>
                          <th class="font-weight-bold text-center" scope="col">STATUS</th>
                          <th class="font-weight-bold text-center" scope="col">ID</th>
                          <th class="font-weight-bold text-center" scope="col">EMAIL</th>
                          <th class="font-weight-bold text-center" scope="col">EXAM DATE</th>
                          <th class="font-weight-bold text-center" scope="col">EXAM KEY</th>
                          <th class="font-weight-bold text-center" scope="col">START TIME</th>
                          <th class="font-weight-bold text-center" scope="col">END TIME</th>
                          <th class="font-weight-bold text-center" scope="col">ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $rows = getGeneratedCodes();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results {
                          $row = $rows[$i];
                          $id = $row["id"];
                          $email = ($_SESSION['email']);
                          $exam_key = $row["exam_key"];
                          $exam_date = $row["exam_date"];
                          $formattedTime = date('h:i A', strtotime($row['exam_time']));
                          $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                          $pref_course = $row["pref_course"];
                          $exam_key_created_at = $row["exam_key_created_at"];
                          echo "<tr>";
                          if ($row['status'] == 'active') {
                              echo "<td><div class='badge badge-success p-2'>" . $row['status'] . "</div></td>";
                          } elseif ($row['status'] == 'pending') {
                              echo "<td><div class='badge badge-danger p-2'>" . $row['status'] . "</div></td>";
                          } else {
                              echo "<td><div class='badge badge-secondary p-2'>" . $row['status'] . "</div></td>";
                          }
                          echo "<td>" . $row["id"] . "</td>";
                          echo "<td>" . $row["email"] . "</td>";
                          echo "<td>" . $row["exam_date"] . "</td>";
                          echo "<td>" . $row["exam_key"] . "</td>";
                          echo "<td>" . $formattedTime . "</td>";
                          echo "<td>" . $formattedTime2 . "</td>";
                          echo "<td><div class='text-center'><button name='btnmodal' type='button' class='btn btn-primary view-btn' data-toggle='modal' data-target='#viewModal' data-id='" . $id . "'>View Profiling</div></button></td>";
                          // echo      "<td>". "<div class='d-flex '>
                          //       <form method='POST' action='../forms/delete_bus.php'>
                          //                 <button type='button' id='editButton' class = 'btn btn-primary mx-3 editbtn' data-bs-toggle='modal' data-bs-target='#editmodal' data-courseID='$id' data-coursename='$email' data-eng='$exam_date' data-mat='$pref_course' data-fil='$interest' data-sci='$hobbies' onClick='editCourse(this)'>EDIT</button>
                          //               </form>" .
                          //     "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id' onClick='archiveCourse(this)'>ARCHIVE</button>" .
                          //     "</div>" .
                          //     "</td>" .
                               "</tr>";
                               $i++;
                        }
                        
                        mysqli_close($conn);
                      ?>
                      </tbody>
                    </table>
                  </div>
              <div>

              <!-- View Modal -->
              <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="viewModalLabel">View Profiling</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="viewProfile"></div>
                    </div>
                  </div>
                </div>
              </div>
            <div>
                <button hidden type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">Add Course</button>
              </div>

              <!-- Add Bus-->
              <!-- <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header" >
                      <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                    </div>

                    <form method="POST">
                      <div class="modal-body p-5">
                        <div class="mb-3">
                          <label>Course Name</label>
                          <input type="text" name="courseName" class="form-control" placeholder="Enter Course" required />
                        </div>
                        <div class="mb-3">
                          <label>Related Hobbies</label>
                          <input name="relhobby" class="form-control" id="relhobby" placeholder="Enter Department" required  />
                        </div>
                    
                    
                      <div class="modal-footer">
                        <input type="submit" name="Add" class="btn btn-primary" id="btnAdd" value="Add"/> -->
                        <?php
                          // if (isset($_POST['Add'])){
                          // $url = 'localhost';
                          // $username = 'root';
                          // $password = '';                     
                          // $newcrs = $_POST['courseName'];                      
                          // $newhob= $_POST['relhobby'];                      
                          // $newen = $_POST['neng'];                      
                          // $newmt = $_POST['nmat'];                      
                          // $newfl = $_POST['nfil'];                      
                          // $newsc = $_POST['nsci'];                      
                          // $newlg = $_POST['nlog'];                      
                          // $conn = new mysqli($url, $username, $password, 'project');
                          // if ($conn->connect_error) {
                          //     die("Connection failed!:" . $conn->connect_error);
                          // }
                          // $sql = mysqli_query($conn,
                          // "INSERT INTO courses(course, related_hobbies, English, Math, Filipino, Science, Logic) VALUES ('".$newcrs."','".$newhob."', ".$newen.", ".$newmt.", ".$newfl.", ".$newsc.", ".$newlg.")
                          // ");
                          //     echo "<script> window.location = 'admin-courses.php' </script>";
                          // }
                        ?>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- End Add Bus-->

                <!-- Edit Modal-->
                <!-- <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Course Details</h5>
                      </div>
                      <form method="POST">
                        <div class="modal-body">
                          <input type="hidden" name="edit_id" id="edit_id" />
                          <div class="mb-3">
                            <label>Course Name</label>
                            <input type="text" name="editcourseName" id="editcourseName" class="form-control" required />
                          </div>
                          <div class="mb-3">
                          <label>Related Hobbies</label>
                          <select name="relhob" class="form-control" id="edithob" required>
                            <option value="0">-No Changes-</option> -->
                            <?php
                            // $conn = new mysqli('localhost', 'root', '', 'project');
                            // if ($conn->connect_error) {
                            //     die("Connection failed!:" . $conn->connect_error);
                            // }
                            // $find = "select * from hobbies";
                            // $list = $conn->query($find);
                            // while($row = $list->fetch_assoc()){
                            //   echo '<option value="'.$row['hob_id'].'">'.$row['hobby'].'</option>';
                            // }
                            ?>
                          <!-- </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="Update" class="btn btn-primary"/> -->
                          <?php
                          // if (isset($_POST['Update'])){
                          // $url = 'localhost';
                          // $username = 'root';
                          // $password = '';                     
                          // $edtid = $_POST['edit_id'];                      
                          // $edtcrs = $_POST['editcourseName'];                      
                          // $edten = $_POST['editeng'];                      
                          // $edtmt = $_POST['editmat'];                      
                          // $edtfl = $_POST['editfil'];                      
                          // $edtsc = $_POST['editsci'];                      
                          // $edtlg = $_POST['editlog'];                      
                          // $conn = new mysqli($url, $username, $password, 'project');
                          // if ($conn->connect_error) {
                          //     die("Connection failed!:" . $conn->connect_error);
                          // }
                          // if ($_POST['relhob'] == '0'){
                          //   $sql = mysqli_query($conn,
                          // "UPDATE courses SET course='".$edtcrs."' , English=".$edten.",Math=".$edtmt.",Filipino=".$edtfl.",Science=".$edtsc.",Logic=".$edtlg." WHERE crs_id= ".$edtid."
                          // ");
                          // }
                          // else {
                          // $findhob = "select * from hobbies where hob_id = ".$_POST['relhob']." ";
                          //   $showhob = $conn->query($findhob);                 
                          //   $changedhob = $showhob->fetch_assoc();
                          // $sql = mysqli_query($conn,
                          // "UPDATE courses SET course='".$edtcrs."',related_hobbies='".$changedhob['hobby']."',English=".$edten.",Math=".$edtmt.",Filipino=".$edtfl.",Science=".$edtsc.",Logic=".$edtlg." WHERE crs_id= ".$edtid."
                          // ");}
                          //     echo "<script> window.location = 'admin-courses.php' </script>";
                          // }
                        ?>
                          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
                <!-- End Edit Modal -->

                <!-- Archive Modal -->
                <!-- <div class="modal fade" id="delmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove Course</h5>
                      </div>
                      <form method="POST">
                        <div class="modal-body">
                          <input type="hidden" name="rem_course_id" id="course_id" />
                          <h4>Are you sure you want to remove this course??</h4>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="Archive" class="btn btn-danger" value="Yes" /> -->
                          <?php
                            // if (isset($_POST['Archive'])){
                            //   $url = 'localhost';
                            //   $username = 'root';
                            //   $password = '';                     
                            //   $delid = $_POST['rem_course_id'];                   
                            //   $conn = new mysqli($url, $username, $password, 'project');
                            //   if ($conn->connect_error) {
                            //       die("Connection failed!:" . $conn->connect_error);
                            //   }
                            //   // $sql = mysqli_query($conn,
                            //   // "DELETE FROM courses WHERE crs_id = ".$delid."
                            //   // ");
                            //   $sql = mysqli_query($conn,
                            //   "INSERT archived_courses
                            //   (crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic)
                            //   SELECT crs_id, course, related_hobbies, English, Math, Filipino, Science, Logic FROM courses
                            //   WHERE crs_id = ". $delid ."
                            //   ");
                            //   $sql2 = mysqli_query($conn,
                            //   "DELETE FROM courses
                            //   WHERE crs_id = ". $delid ."
                            //   ");
                            //   echo "<script> window.location = 'admin-courses.php' </script>";
                            //   }
                          ?>
                          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
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
    function editCourse(value) {
      let courseID = value.getAttribute("data-courseID");
      let courseName = value.getAttribute("data-coursename");
      let english = value.getAttribute("data-eng");
      let math = value.getAttribute("data-mat");
      let filipino = value.getAttribute("data-fil");
      let science = value.getAttribute("data-sci");
      let logic = value.getAttribute("data-log");
      document.querySelector("#edit_id").value = courseID;
      document.querySelector("#editcourseName").value = courseName;
      document.querySelector("#editeng").value = english;
      document.querySelector("#editmat").value = math;
      document.querySelector("#editfil").value = filipino;
      document.querySelector("#editsci").value = science;
      document.querySelector("#editlog").value = logic;
    }

    function archiveCourse(value) {
      let courseID = value.getAttribute("data-courseid");
      document.querySelector("#course_id").value = courseID;
    }

    /* check duplicate similar values
    $(document).ready(function() {
      $('#check_plateNo').keyup(function(e) {
        var plateNum = $('#check_plateNo').val();
        $.ajax({
          type: "POST",
          url: "../forms/manage_bus.php",
          data: {
            "check_plateNo_btn": 1,
            "plateNo": plateNum,
          },
          success: function(response) {
            var jsonData = JSON.parse(response);
            $("#error_plateNo").removeClass();
            if (jsonData.success == "1") {
              $('#error_plateNo').text("Available");
              $("#error_plateNo").addClass("text-success");
              $("#btnAdd").prop('disabled', false);
            } else {
              $('#error_plateNo').text("Unavailable");
              $("#error_plateNo").addClass("text-danger");
              $("#btnAdd").prop('disabled', true);
            }
          },
          error: function() {
            alert('System Error. Calling ajax failed');
          }
        });
      });
    });*/
  </script>

<script>
 $(document).on("click", ".view-btn", function () {
    var id = $(this).data('id');
    $.ajax({
        url: "../forms/get_generated_codes.php",
        type: "POST",
        data: {id: id},
        success: function (data) {
            $('#viewProfile').html(data);
        }
    });
});
</script>

  </body>
</html>