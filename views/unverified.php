<?php 
include '../forms/adminQueries.php';
include '../file/logout-function.php';
include "admin-checker.php";
?>

<?php

// Assume we have a database connection called $conn
include '../forms/database.php';

if (isset($_POST['approve'])) {
  $userIds = $_POST['user_ids'];
  
  foreach ($userIds as $userId) {
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
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    
  }
  th {
    color: black;
    font-weight: bold;
  }
 

</style>
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
                <li class="breadcrumb-item"><a href="../views/passers.php">Passers</a></li>
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
                          <th class="font-weight-bold" scope="col">SELECT</th>
                          <th class="font-weight-bold" id="status" scope="col" >STATUS</th>
                          <th class="font-weight-bold" scope="col">ID</th>
                          <th class="font-weight-bold" scope="col">EMAIL</th>
                          <th class="font-weight-bold" scope="col">EXAM KEY</th>
                          <th class="font-weight-bold" scope="col">EXAM DATE</th>
                          <th class="font-weight-bold" scope="col">PREFERRED COURSE</th>
                          <th class="font-weight-bold" scope="col">PREFERRED SECOND COURSE</th>
                          <th class="font-weight-bold" scope="col">PREFERRED THIRD COURSE</th>
                          <th class="font-weight-bold" scope="col">INTEREST</th>
                          <th class="font-weight-bold" scope="col">SECOND INTEREST</th>
                          <th class="font-weight-bold" scope="col">THIRD INTEREST</th>
                          <th class="font-weight-bold" scope="col">HOBBY</th>
                          <th class="font-weight-bold" scope="col">SECOND HOBBY</th>
                          <th class="font-weight-bold" scope="col">THIRD HOBBY</th>
                          <th class="font-weight-bold" scope="col">EXAM KEY CREATED AT</th>
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
                          $email = ($_SESSION['email']);
                          $exam_key = $row["exam_key"];
                          $exam_date = $row["exam_date"];
                          $pref_course = $row["pref_course"];
                          $pref_second_course = $row["pref_secondary_course"];
                          $pref_third_course = $row["pref_tertiary_course"];
                          $interest = $row["interest"];
                          $second_interest = $row["secondary_interest"];
                          $third_interest = $row["tertiary_interest"];
                          $hobby1 = $row["hobby"];
                          $hobby2 = $row["secondary_hobby"];
                          $hobby3 = $row["tertiary_hobby"];
                          $exam_key_created_at = $row["exam_key_created_at"];
                          echo "<tr>";
                          echo "<td><input type='checkbox' name='user_ids[]' value='".$row['id']."'></td>";
                          echo "<td><div class='badge badge-danger p-2'>" . $status . "</div></td>";
                          echo "<td>" . $row["id"] . "</td>";
                          echo "<td>" . $row["email"] . "</td>";
                          echo "<td>" . $row["exam_key"] . "</td>";
                          echo "<td>" . $row["exam_date"] . "</td>";
                          echo "<td>" . $row["pref_course"] . "</td>";
                          echo "<td>" .$row["pref_secondary_course"] . "</td>";
                          echo "<td>" .  $row["pref_tertiary_course"] . "</td>";
                          echo "<td>" . $row["interest"] . "</td>";
                          echo "<td>" . $row["secondary_interest"] . "</td>";
                          echo "<td>" . $row["tertiary_interest"] . "</td>";
                          echo "<td>" .  $row["hobby"] . "</td>";
                          echo "<td>" .  $row["secondary_hobby"] . "</td>";
                          echo "<td>" .  $row["tertiary_hobby"] . "</td>";
                          echo "<td>" . $row["exam_key_created_at"] . "</td>";
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
  </body>
</html>