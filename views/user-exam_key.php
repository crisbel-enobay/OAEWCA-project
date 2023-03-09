<?php
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
              <a class="nav-link" href="../views/admin.php">
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
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-results.php">
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
                <li class="breadcrumb-item "><a href="../views/user-profiling.php">Exam Schedule List</a></li>
                <li class="breadcrumb-item active">Exam Keys</li>

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
                          <th class="font-weight-bold text-center" scope="col">ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "project");
                        $email = ($_SESSION['email']);
                        $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE email = '$email'");
                        while($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"];
                          $exam_date = $row["exam_date"];
                          $formattedTime = date('h:i A', strtotime($row['exam_time']));
                          $formattedTime2 = date('h:i A', strtotime($row['exam_time_end']));
                          $status = $row["status"];
                          echo "<tr>";
                          if ($row['status'] == 'active') {
                            echo "<td><div class='badge badge-success p-2'>" . $row['status'] . "</div></td>";
                        } elseif ($row['status'] == 'pending') {
                            echo "<td><div class='badge badge-danger p-2'>" . $row['status'] . "</div></td>";
                        } else {
                            echo "<td><div class='badge badge-secondary p-2'>" . $row['status'] . "</div></td>";
                        }
                          echo "<td class ='tdclass'>" . $row["id"] . "</td>";
                          echo "<td class ='tdclass'>" . $row["email"] . "</td>";
                          echo "<td class ='tdclass'>" . $row["exam_date"] . "</td>";
                          echo "<td class ='tdclass'>" . $row["exam_key"] . "</td>";
                          echo "<td class ='tdclass'>" . $formattedTime . "</td>";
                          echo "<td class ='tdclass'>" . $formattedTime2 . "</td>";
                          echo "<td><div class='text-center'><button type='button' class='btn btn-primary view-btn' data-toggle='modal' data-target='#viewModal' data-id='" . $id . "'>View Profiling</div></button></td>";
                          echo "</tr>";
                        }
                        mysqli_close($conn);
                      ?>
                      </tbody>
                    </table>
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
                        $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE id = '$id'");
                        if (mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                          echo "<p>Strand: </p>" . $row['strand'] . "";
                          echo "<p>Preferred Course: </p>" . $row['pref_course'] . "";
                          echo "<p>Strand: </p>" . $row['strand'] . "";
                          echo "<p>Personality Traits: </p>" . $row['traits'] . "";
                          echo "<p>Interest: </p>" . $row['interest'] . "";
                          echo "<p>Skills: </p>" . $row['skill'] . "";
                          echo "<p>Career Goal: </p>" . $row['career_goal'] . "";
                          echo "<p>Exam Key Created At: </p>" . $row['exam_key_created_at'] . "";
                        }
                       ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div>
                <button type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">Edit Exam Schedule and Profile</button>
              </div>
               <!-- Add Bus-->
               <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Your Exam Schedule</h5>
                    </div>

                    <form method="POST">
                      <div class="modal-body p-5">
                        <div class="mb-3">
                        <label> Select Date and Time </label>
                        <div class="form-group">
                              <select class="form-control" name="exam_datetime" id="exam_datetime">
                                <option value="">-- select date and time --</option>
                              <?php
                                // PHP code to generate option tags
                                include '../forms/database.php';
                                $query = "SELECT exam_date, exam_time, exam_time_end FROM admin_schedule";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                    $optionValue = $row['exam_date'] . ' ' . $row['exam_time'] . ' ' . $row['exam_time_end'];
                                    echo '<option value="' . $optionValue . '">' . $optionValue . '</option>';
                                  }
                                } 
                              ?>
                            </select>
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Select Strand</label>
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
                        <div class="mb-3">
                        <label>preferred Course</label>
                        <div class="form-group">
                        <?php
                        include '../forms/database.php';
                        $selected_course_options = array();
                        $query2 ="SELECT course FROM courses";
                        $result = $conn->query($query2);

                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['course'],$selected_course_options)) {
                            $selected_course_options[] = $row['course'];
                          }
                        }
                        ?>
                        <select required name="course_opt1" class="form-control">
                          <option value="">-- select course --</option>
                          <?php
                          foreach ($selected_course_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select> 
                              </div>
                                    </div>
                                    <div class="mb-3">
                          <label>Select second preferred course</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_course_options = array();                   
                        $query2 ="SELECT course FROM courses";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['course'], $selected_course_options)) {
                            $selected_course_options[] = $row['course'];
                          }
                        }
                        ?>
                        <select required name="course_opt2" class="form-control">
                          <option value="">-- select course --</option>
                          <?php
                          foreach ($selected_course_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        
                        <!-- repeat this for other select tags -->
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Select third preferred course</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_course_options = array();                   
                        $query2 ="SELECT course FROM courses";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['course'], $selected_course_options)) {
                            $selected_course_options[] = $row['course'];
                          }
                        }
                        ?>
                        <select required name="course_opt3" class="form-control">
                          <option value="">-- select course --</option>
                          <?php
                          foreach ($selected_course_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        
                        <!-- repeat this for other select tags -->
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Hobbies/Interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobbies_interests FROM hobbies_interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobbies_interests'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobbies_interests'];
                          }
                        }
                        ?>
                        <select required name="related_hobbies_opt1" class="form-control">
                          <option value="">-- select hobbies --</option>
                          <?php
                          foreach ($selected_hobbies_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        
                        <!-- repeat this for other select tags -->
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Second Hobbies/Interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobbies_interests FROM hobbies_interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobbies_interests'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobbies_interests'];
                          }
                        }
                        ?>
                        <select required name="related_hobbies_opt2" class="form-control">
                          <option value="">-- select hobbies --</option>
                          <?php
                          foreach ($selected_hobbies_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        
                        <!-- repeat this for other select tags -->
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Third Hobbies/Interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobbies_interests FROM hobbies_interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobbies_interests'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobbies_interests'];
                          }
                        }
                        ?>
                        <select required name="related_hobbies_opt3" class="form-control">
                          <option value="">-- select hobbies --</option>
                          <?php
                          foreach ($selected_hobbies_options as $arr) {
                          ?>
                            <option><?php print($arr); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        
                        <!-- repeat this for other select tags -->
                              </div>
                        </div>
                      <div class="modal-footer">
                        <input type="submit" disabled name="Add" data-toggle="modal" data-target="#myModal" class="btn btn-primary" id="myBtn" value="Add"/>       
<?php
                             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                          // if (isset($_POST['Add'])){
                          // $url = 'localhost';
                          // $username = 'root';
                          // $password = '';       
                          // $email = ($_SESSION['email']);                                                 
                          // $first = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4);
                          // $last = substr(str_shuffle("1234567890"), 0, 4);
                          // $exam_code = $first . $last;       
                          // $date = $_POST['exam_date'];                      
                          // $strand = $_POST['strand_opt'];                      
                          // $pref_course = $_POST['course_opt'];                      
                          // $related_hobbies = $_POST['related_hobbies_opt'];                      
                          // $related_interest = $_POST['related_interest_opt'];                        
                          // $conn = new mysqli($url, $username, $password, 'project');
                          // if ($conn->connect_error) {
                          //     die("Connection failed!:" . $conn->connect_error);
                          // }
                          // $sql2 = mysqli_query($conn,
                          // "INSERT INTO generated_codes(email,exam_key,exam_date, strand, pref_course, hobbies, interest,exam_key_created_at) VALUES ('". $email . "','".$exam_code."','".$date."','".$strand."', '".$pref_course."', '".$related_hobbies."', '".$related_interest."', NOW() )
                          // ");
                          // }         
                   
                          // Get the email address from the form or wherever it is coming from 
                          $email = ($_SESSION['email']);   
                          $first = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4);
                          $last = substr(str_shuffle("1234567890"), 0, 4);
                          $exam_code = $first . $last; 
                          $examDatetime = $_POST['exam_datetime']; 
                          list($examDate, $examTime, $examtimeend) = explode(' ', $examDatetime);                       
                          $strand = $_POST['strand_opt'];                      
                          $pref_course = $_POST['course_opt1'];  
                          $pref_secondary_course = $_POST['course_opt2'];  
                          $pref_tertiary_course = $_POST['course_opt3'];                                       
                          $related_hobbies1 = $_POST['related_hobbies_opt1']; 
                          $related_hobbies2 = $_POST['related_hobbies_opt2'];         
                          $related_hobbies3 = $_POST['related_hobbies_opt3']; 
                              // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "project");

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            

                            // Check if the email address already exists in the database
                            $check_query = "SELECT * FROM generated_codes WHERE email = '$email'";
                            $check_result = mysqli_query($conn, $check_query);

                            if (mysqli_num_rows($check_result) > 0) {
                              $row = mysqli_fetch_assoc($check_result);   
                               // Check if the status is already approved
                               if ($row['status'] == 'active') {
                                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                                <script> 
                                  setTimeout(function() {
                                    Swal.fire({
                                      title: 'Exam Schedule already approved',
                                      icon: 'error',
                                      showConfirmButton: true,
                                      text: 'cannot be modified again',
                                    }).then(function() {
                                      window.location = '../views/user-exam_key.php';
                                    });
                                  }, 100);
                                </script>";
                              }
                              else { 

                                // Delete the existing data
                                $delete_query = "DELETE FROM generated_codes WHERE email = '$email'";
                                $delete_result = mysqli_query($conn, $delete_query);

                                if ($delete_result) {   
                                    //process of modifying profiling
                                    $insert_result = mysqli_query($conn,  "INSERT INTO generated_codes(email,exam_key,exam_date,exam_time,exam_time_end,status, 
                                    strand, pref_course,pref_secondary_course,pref_tertiary_course, hobby, secondary_hobby, tertiary_hobby ,
                                     exam_key_created_at) VALUES ('". $email . "','".$exam_code."',
                                     '".$examDate."','". $examTime."','". $examtimeend."','pending','".$strand."',
                                      '".$pref_course. "', '".$pref_secondary_course."',
                                       '".$pref_tertiary_course."','".$related_hobbies1."', 
                                       '".$related_hobbies2."', '".$related_hobbies3."', NOW() )
                                    ");
                                    if ($insert_result) {
                                      echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                                        <script> 
                                          setTimeout(function() {
                                            Swal.fire({
                                              title: 'Success',
                                              icon: 'success',
                                              showConfirmButton: true,
                                              text: 'Exam schedule and profile modified',
                                            }).then(function() {
                                              window.location = '../views/user-exam_key.php';
                                            });
                                          }, 100);
                                        </script>";  
                                    } else {
                                        // Handle the error
                                        printf("Error: %s\n", mysqli_error($conn));
                                        echo "SQL query: " . $sql;
                                        exit();
                                    }
                                                                
                                } 
                                
                                else {  
                                  
                                     
                                }
                            }
                          }

                            else{
                              // Insert the new data
                              $insert_result = mysqli_query($conn,  "INSERT INTO generated_codes(email,exam_key,exam_date,exam_time,exam_time_end,status, 
                              strand, pref_course,pref_secondary_course,pref_tertiary_course, hobby, secondary_hobby, tertiary_hobby ,
                               exam_key_created_at) VALUES ('". $email . "','".$exam_code."',
                               '".$examDate."','". $examTime."','". $examtimeend."','pending','".$strand."',
                                '".$pref_course. "', '".$pref_secondary_course."',
                                 '".$pref_tertiary_course."','".$related_hobbies1."', 
                                 '".$related_hobbies2."', '".$related_hobbies3."', NOW() )
                              ");

                            if ($insert_result) {
                              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                                <script> 
                                  setTimeout(function() {
                                    Swal.fire({
                                      title: 'Success',
                                      icon: 'success',
                                      showConfirmButton: true,
                                      text: 'Add exam schedule complete',
                                    }).then(function() {
                                      window.location = '../views/user-exam_key.php';
                                    });
                                  }, 100);
                                </script>";   
                            } 
                            
                            else {
                            }
                          }
                            // Close the database connection
                            mysqli_close($conn);  
                          }    
                        ?>                  
                          </div>
                        </div>
                    </form>
                  
                  </div>
                </div>
              </div>
              <!-- End Bus-->

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