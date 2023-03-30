<?php 
include '../forms/adminQueries.php';
include '../file/logout-function.php';
include "admin-checker.php";

 //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';


// Assume we have a database connection called $conn
include '../forms/database.php';

if (isset($_POST['approve'])) {
  $userIds = $_POST['user_ids'];
  foreach ($userIds as $userId) {
  $mail = new PHPMailer(true);
 
        try {
          $sql = "SELECT * FROM generated_codes WHERE id='".$userId."'"; 
          $result = mysqli_query($conn, $sql);
          if (mysqli_affected_rows($conn) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              // access the columns by their name
            $recipient_name = $row['fullname'];
            $email = $row['email'];
            $exam_key = $row['exam_key'];
            $exam_date = $row['exam_date'];
            $exam_time = date('h:i A', strtotime($row['exam_time']));
            $exam_time_end = date('h:i A', strtotime($row['exam_time_end']));
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'lebbraumjayce3@gmail.com';
 
            //SMTP password
            $mail->Password = 'rnimmwsahakqkmmb';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 465;
 
            //Recipients
            $mail->setFrom('lebbraumjayce3@gmail.com', 'KURSONADA');
 
            //Add a recipient
            $mail->addAddress($email, $recipient_name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $mail->Subject = 'Exam Schedule and Key Approved';
            $mail->Body = '<html>
  <head>
    <style>
      /* styles for the email body */
      body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333333;
        line-height: 1.5;
      }
      h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }
      p {
        margin-bottom: 10px;
      }
      /* styles for the key */
      .key {
        display: inline-block;
        font-size: 30px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #ffffff;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <h1>Exam Schedule and Key Approved</h1>
    <p>Your Key is now valid on Exam Schedule:</p>
    <p><strong>Date:</strong> ' . $exam_date . '</p>
    <p><strong>Time:</strong> ' . $exam_time . ' - ' . $exam_time_end . '</p>
    <p>Your key is:</p>
    <p class="key">' . $exam_key . '</p>
  </body>
</html>';
            $mail->send();
            

            // Generate a new reset link token
            $status = "active";
          
            // Update the database with the new token
            $sql = "UPDATE generated_codes SET status='".$status."' WHERE id='".$userId."'";
            mysqli_query($conn, $sql);

            // Check if any rows were updated
            if (mysqli_affected_rows($conn) > 0) {
              // Display SweetAlert and redirect to a certain page
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
              <script> 
                setTimeout(function() {
                  Swal.fire({
                    title: 'Approve Successful',
                    icon: 'success',
                    showConfirmButton: true,
                    text: '',
                  }).then(function() {
                    window.location = '../views/unverified.php';
                  });
                }, 100);
              </script>";
            }
          }
        }
        }
          catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }
        
            
          
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Unverified</title>
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
              <li class="breadcrumb-item active"><a href="../views/results.php">Results</a></li>
                <li class="breadcrumb-item"><a href="../views/examiners.php">Examiners</a></li>
                <li class="breadcrumb-item active">Unverified</li>
                <li class="breadcrumb-item"><a href="../views/admin.php">Home</a></li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
              <form id="myform" action="" method="POST">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                  <p class="lead mb-0 ">Unverified Students</p>
                  </div>
                  <div class="table-responsive border rounded p-1">    
                      <table class="table table-hover text-nowrap datatable">
                      <thead>
                      <tr>
                          <th class="font-weight-bold text-center" scope="col">SELECT</th>
                          <th class="font-weight-bold text-center" id="status" scope="col" >STATUS</th>
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
                         // Create connection
                         $conn = new mysqli('localhost', 'root', '', 'project');
                         // Check connection
                         if ($conn->connect_error) {
                           die("Connection failed: " . $conn->connect_error);
                         }
                        $rows = getUnapprovedStudent();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results {
                           $row = $rows[$i];
                          $status = $row["status"];
                          $id = $row["id"];
                          $email = $row['email'];
                          $exam_key = $row["exam_key"];
                          $exam_date = $row["exam_date"];
                          $formattedTime = date('h:i A', strtotime($row['exam_time']));
                          $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                          $pref_course = $row["pref_course"];
                          $traits = $row["traits"];
                          $interest = $row["interest"];
                          $skill = $row["skill"];
                          $career_goal = $row["career_goal"];
                          $exam_key_created_at = $row["exam_key_created_at"];
                          echo "<tr>";
                          echo "<td><input type='checkbox' name='user_ids[]' value='".$row['id']."'></td>";
                          echo "<td><div class='badge badge-danger p-2'>" . $status . "</div></td>";
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
                          echo "</tr>";
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
                <button type="submit" name="approve" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">approve selected students</button>
              </div>
                </div>
               </form>
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
    <!-- Other Custom JS -->
    <script>
   // Assume the form has an ID of "myForm"
const form = document.getElementById("myForm");
const submitButton = form.querySelector("button[name='approve']");

submitButton.addEventListener("click", (event) => {
  event.preventDefault();

  const selectedRows = form.querySelectorAll("input[type='checkbox']:checked");
  const selectedIds = [];

  selectedRows.forEach((row) => {
    selectedIds.push(row.value);
  });

  const formData = new FormData(form);
  selectedIds.forEach((id) => {
    formData.append("user_ids[]", id);
  });

  fetch("../forms/approved.php", {
    method: "POST",
    body: formData
  })
  .then((response) => response.text())
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
});
</script>
<script>
 $(document).on("click", ".view-btn", function () {
    var id = $(this).data('id');
    $.ajax({
        url: "../forms/get_unapproved_student.php",
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