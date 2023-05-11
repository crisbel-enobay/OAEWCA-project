<?php
    include '../file/session_start.php';
    include '../forms/adminQueries.php';
    include "student-checker.php";
   include '../file/logout-function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your exam schedule</title>
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
    <!-- SweetAlert JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
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
              <a class="nav-link" href="../views/admin.php">
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
                <li class="breadcrumb-item "><a href="../views/user-profiling.php">Exam Schedule List</a></li>
                <li class="breadcrumb-item active">Exam Key</li>

              </ol>
            </nav>
          </div> 
         <!-- Quick Action Toolbar Starts-->
         <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                  <p class="lead mb-0 ">Exam Schedule</p>
                  </div>
                  <div class="table-responsive border rounded p-1">    
                      <table class="table table-hover text-nowrap datatable">
                      <thead>
                      <tr>
                          <!-- <th class="font-weight-bold text-center" scope="col">SELECT</th> -->
                          <th class="font-weight-bold text-center" id="status" scope="col" >STATUS</th>
                          <th class="font-weight-bold text-center" scope="col">ID</th>
                          <th class="font-weight-bold text-center" scope="col">EMAIL</th>
                          <th class="font-weight-bold text-center" scope="col">EXAM KEY</th>
                          <th class="font-weight-bold text-center" scope="col">EXAM DATE</th>
                          <th class="font-weight-bold text-center" scope="col">START TIME</th>
                          <th class="font-weight-bold text-center" scope="col">END TIME</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $conn = mysqli_connect("localhost", "root", "", "project");
                      $email = $_SESSION['email'];
                      $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE email = '$email'");
                      $tableList = mysqli_fetch_all($result, MYSQLI_ASSOC);
                      if (count($tableList) > 0) {
                        foreach ($tableList as $row) {
                          $id = $row["id"];
                          $exam_date = $row["exam_date"];
                          $exam_date_formatted = date('F j, Y', strtotime($exam_date));
                          $formattedTime = date('h:i A', strtotime($row['exam_time']));
                          $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                          $status = $row["status"];
                          echo "<tr data-toggle='modal' data-target='#viewModal' data-id='" . $id . "'>";
                          if ($row['status'] == 'active') {
                            echo "<td><div class='badge badge-success p-2'>" . $row['status'] . "</div></td>";
                          } elseif ($row['status'] == 'pending') {
                            echo "<td><div class='badge badge-danger p-2'>" . $row['status'] . "</div></td>";
                          } else {
                            echo "<td><div class='badge badge-secondary p-2'>" . $row['status'] . "</div></td>";
                          }
                          echo "<td class ='tdclass'>" . $row["id"] . "</td>";
                          echo "<td class ='tdclass'>" . $row["email"] . "</td>";
                          echo "<td class ='tdclass'>" . $row["exam_key"] . "</td>";
                          echo "<td class ='tdclass'>" . $exam_date_formatted . "</td>";
                          echo "<td class ='tdclass'>" . $formattedTime . "</td>";
                          echo "<td class ='tdclass'>" . $formattedTime2 . "</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='8' class='text-center'>No entries found in the table.</td></tr>";
                      }
                      mysqli_close($conn);
                    ?>
                      </tbody>
                      
                    </table>
                    <?php
                           $conn = mysqli_connect("localhost", "root", "", "project");
                           $email = $_SESSION['email'];
                           $sql = "SELECT exam_key FROM generated_codes where email = '$email'";
                           $result = $conn->query($sql);
                           if ($result->num_rows > 0) {
                            // Output the exam key value as a hidden input field
                            $row = $result->fetch_assoc();
                            $exam_key = $row["exam_key"];
                            echo "<input type='hidden' id='exam_key' value='$exam_key'>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                      ?>
                      <div class="preview text-muted" style="font-size: 0.8em;">
                         <button type="button" onclick="copyToClipboard()" class="btn btn-inverse-dark btn-sm ml-2"><i class="icon-docs"  data-bs-toggle="tooltip" data-bs-placement="right" title="copy exam key"></i></button>  copy exam key
                      </div>
                  </div>
                </div>
                
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
                      <div id="viewProfile">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "project");
    
    // Query to select row from the 'generated_codes' table
    $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE id = '$id'");
    
    // Check if there is at least one row in the 'generated_codes' table
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        echo "<p>Strand: </p>" . $row['strand'] . "";
        echo "<p>Preferred Course: </p>" . $row['pref_course'] . "";
        echo "<p>Strand: </p>" . $row['strand'] . "";
        echo "<p>Personality Traits: </p>" . $row['traits'] . "";
        echo "<p>Interest: </p>" . $row['interest'] . "";
        echo "<p>Skills: </p>" . $row['skill'] . "";
        echo "<p>Career Goal: </p>" . $row['career_goal'] . "";
        echo "<p style='font-size:20px;margin-top:10px;margin-bottom:10px;'><b>Results</b> <br> </p>";
        // Query to select row(s) from the 'results' table
        $email = $row['email']; // Get email from the 'generated_codes' table
        // $result = mysqli_query($conn, "SELECT * FROM results WHERE email = '$email' AND status = 'released'");
        $result = mysqli_query($conn, "SELECT * FROM results WHERE email = '$email'");
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $exam_date = $row['exam_date'];
          $exam_date_formatted = date('F j, Y', strtotime($exam_date));
          echo "<p>Exam date taken At: </p>" . $exam_date_formatted . "";
          echo "<p>Your overall score: </p>" . $row['score'] . "";
          echo "<p>Your remarks: </p>" . $row['remarks'] . "";
          echo "<p>top 1 recommended course: </p>" . $row['f_course'] . "";
          echo "<p>related course/s:</p>" . $row['f_related_course'] . "";
          echo "<p>top 2 recommended course: </p>" . $row['s_course'] . "";
          echo "<p>related course/s:</p>" . $row['s_related_course'] . "";
          echo "<p>top 3 recommended course: </p>" . $row['t_course'] . "";
          echo "<p>related course/s:</p>" . $row['t_related_course'] . "";
          echo "<p>Your subject scores: </p>";
          $getscores = mysqli_query($conn, "SELECT * FROM data_analytics WHERE email = '$email'");
          if (mysqli_num_rows($getscores) > 0) {
            $row = mysqli_fetch_assoc($getscores);
            echo "<p>english: </p>" . $row['english'] . "";
            echo "<p>math: </p>" . $row['math'] . "";
            echo "<p>filipino: </p>" . $row['filipino'] . "";
            echo "<p>science: </p>" . $row['science'] . "";
            echo "<p>abstract: </p>" . $row['logic'] . "";
            }
        
        } else {
            echo "<p>No results found please take the exam first</p>";
        }

    } else {
        echo "<p>No data found for this ID</p>";
    }
    ?>
</div>

                      </div>
                    </div>
                  </div>
                </div>
                        
                <div>
                <?php
                // assume $tableList is an array of items in the table

                if (count($tableList) > 0) {
                  // render the modal button
                  //echo '<button type="button" class="btn btn-primary my-4 py-2 px-4 align-items-center" style="margin: 40%;" data-bs-toggle="modal" data-bs-target="#transactionModal">Edit Exam Schedule and Profile</button>';
                } else {
                  // render a disabled modal button
                  echo '<button type="button" disabled class="btn btn-primary my-4 py-2 px-4 align-items-center" style="margin-left: 40%;" data-bs-toggle="modal" data-bs-target="#transactionModal">Edit Exam Schedule and Profile</button>';
                }
                ?>
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
    </script>
    <!-- copy to clipboard -->
    <script>
        function copyToClipboard() {
          // Get the value of the hidden input field
          var exam_key = document.getElementById("exam_key").value;

          // Create a temporary input field and set its value to the exam key
          var tempInput = document.createElement("input");
          tempInput.value = exam_key;

          // Append the temporary input field to the document
          document.body.appendChild(tempInput);

          // Select the value of the temporary input field
          tempInput.select();

          // Copy the selected value to the clipboard
          document.execCommand("copy");

          // Remove the temporary input field from the document
          document.body.removeChild(tempInput);

          // Show a message using SweetAlert2 indicating that the value has been copied
            Swal.fire({
              title: "Exam Key Copied!",
              text: exam_key,
              icon: "success",
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false
            });
        }
      </script>
       <script>
  const form = document.querySelector("form");
  const submitBtn = form.querySelector("input[type='submit']");
  const selects = form.querySelectorAll("select");

  // Check if all selects are filled out
  function checkSelects() {
    let filledOut = true;
    selects.forEach(select => {
      if (!select.value) {
        filledOut = false;
      }
    });
    return filledOut;
  }

  // Enable or disable submit button based on select values
  function toggleSubmitBtn() {
    if (checkSelects()) {
      submitBtn.removeAttribute("disabled");
    } else {
      submitBtn.setAttribute("disabled", true);
    }
  }

  selects.forEach(select => {
    select.addEventListener("change", toggleSubmitBtn);
  });
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
  </script>
  <script> const allSelects = document.querySelectorAll("select");

for (let i = 0; i < allSelects.length; i++) {
  allSelects[i].addEventListener("change", function() {
    const selectedValue = this.value;
    for (let j = 0; j < allSelects.length; j++) {
      if (i !== j) {
        const options = allSelects[j].querySelectorAll("option");
        for (let k = 0; k < options.length; k++) {
          if (options[k].value === selectedValue) {
            options[k].disabled = true;
          }
        }
      }
    }
  });
}
</script>
<script>
  $(document).ready(function() {
    $('.view-btn').click(function() {
      var id = $(this).data('id');
      $.ajax({
        url: 'get_profile.php',
        type: 'POST',
        data: { id: id },
        success: function(response) {
          $('#viewProfile').html(response);
        }
      });
    });
  });
</script>
  </body>
</html>