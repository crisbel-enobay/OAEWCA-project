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
    background-color: #F48A54; /* orange */
    color: white;
    font-weight: bold;
  }
  th.status {
    background-color: #333; /* dark gray */
    color: white;
  }
  td.status_message {
    background-color: #ffd54f; /* light orange */
    font-weight: bold;
    text-align: center;
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
                    <h5 class="mb-0">Existing Exam Schedule</h5>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table table-hover text-nowrap datatable">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th class="status" scope="col">STATUS</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">EXAM KEY</th>
                          <th scope="col">EXAM DATE</th>
                          <th scope="col">PREFERRED COURSE</th>
                          <th scope="col">PREFERRED SECOND COURSE</th>
                          <th scope="col">PREFERRED THIRD COURSE</th>
                          <th scope="col">INTEREST</th>
                          <th scope="col">SECOND INTEREST</th>
                          <th scope="col">THIRD INTEREST</th>
                          <th scope="col">HOBBY</th>
                          <th scope="col">SECOND HOBBY</th>
                          <th scope="col">THIRD HOBBY</th>
                          <th scope="col">EXAM KEY CREATED AT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "project");
                        $email = ($_SESSION['email']);
                        $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE email = '$email'");
                        while($row = mysqli_fetch_assoc($result)) {
                          $id = $row["id"];
                          $exam_key = $row["exam_key"];
                          $exam_date = $row["exam_date"];
                          $status = $row["status"];
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
                          echo "<td>" . $row["id"] . "</td>";
                          echo "<td class=\"status_message\">" . $status . "</td>";
                          echo "<td>" . $row["email"] . "</td>";
                          echo "<td>" . $row["exam_key"] . "</td>";
                          echo "<td>" . $row["exam_date"] . "</td>";
                          echo "<td>" . $pref_course . "</td>";
                          echo "<td>" . $pref_second_course . "</td>";
                          echo "<td>" . $pref_third_course . "</td>";
                          echo "<td>" . $row["interest"] . "</td>";
                          echo "<td>" . $second_interest . "</td>";
                          echo "<td>" . $third_interest . "</td>";
                          echo "<td>" .  $hobby1 . "</td>";
                          echo "<td>" .  $hobby2 . "</td>";
                          echo "<td>" .  $hobby3 . "</td>";
                          echo "<td>" . $row["exam_key_created_at"] . "</td>";
                          // echo      "<td>". "<div class='d-flex '>
                          //       <form method='POST' action='../forms/delete_bus.php'>
                          //                 <button type='button' id='editButton' class = 'btn btn-primary mx-3 editbtn' data-bs-toggle='modal' data-bs-target='#editmodal' data-courseID='$id' data-coursename='$email' data-eng='$exam_date' data-mat='$pref_course' data-fil='$interest' data-sci='$hobbies' onClick='editCourse(this)'>EDIT</button>
                          //               </form>" .
                          //     "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id' onClick='archiveCourse(this)'>ARCHIVE</button>" .
                          //     "</div>" .
                          //     "</td>" .
                               "</tr>";
                        }
                        mysqli_close($conn);
                      ?>

                      </tbody>
                    </table>
                  </div>
              <!-- Add Bus-->
              <div>
                <button type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">Add/Edit Exam Schedule and Profile</button>
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
                        <div class="form-group">
                              <?php 
                              include '../forms/database.php';
                                  $query1 ="SELECT exam_date FROM admin_schedule";
                                  $result = $conn->query($query1);
                                  if($result->num_rows> 0){
                                    $date_options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                  }
                              ?>
                                <label> Select Date </label>
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
                          <label>Select Interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_interest_options = array();                   
                        $query2 ="SELECT interest FROM interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['interest'], $selected_interest_options)) {
                            $selected_interest_options[] = $row['interest'];
                          }
                        }
                        ?>
                        <select required name="related_interest_opt1" class="form-control">
                          <option value="">-- select interest --</option>
                          <?php
                          foreach ($selected_interest_options as $arr) {
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
                          <label>Select second interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_interest_options = array();                   
                        $query2 ="SELECT interest FROM interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['interest'], $selected_interest_options)) {
                            $selected_interest_options[] = $row['interest'];
                          }
                        }
                        ?>
                        <select required name="related_interest_opt2" class="form-control">
                          <option value="">-- select interest --</option>
                          <?php
                          foreach ($selected_interest_options as $arr) {
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
                          <label>Select third interest</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_interest_options = array();                   
                        $query2 ="SELECT interest FROM interests";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['interest'], $selected_interest_options)) {
                            $selected_interest_options[] = $row['interest'];
                          }
                        }
                        ?>
                        <select required name="related_interest_opt3" class="form-control">
                          <option value="">-- select interest --</option>
                          <?php
                          foreach ($selected_interest_options as $arr) {
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
                          <label>Select Hobby</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobby FROM hobbies";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobby'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobby'];
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
                          <label>Select Hobby</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobby FROM hobbies";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobby'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobby'];
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
                          <label>Select Hobby</label>
                          <div class="form-group">
                          <?php
                        include '../forms/database.php';
                        $selected_hobbies_options = array();                   
                        $query2 ="SELECT hobby FROM hobbies";
                        $result = $conn->query($query2);
                        
                        while ($row = mysqli_fetch_array($result)) {
                          if (!in_array($row['hobby'], $selected_hobbies_options)) {
                            $selected_hobbies_options[] = $row['hobby'];
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
                        <input disabled type="submit" name="exam_schedule_date" class="btn btn-primary" id="btnAdd" value="Add"/>
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
                          $date = $_POST['exam_date'];                      
                          $strand = $_POST['strand_opt'];                      
                          $pref_course = $_POST['course_opt1'];  
                          $pref_secondary_course = $_POST['course_opt2'];  
                          $pref_tertiary_course = $_POST['course_opt3'];                                       
                          $related_interest1 = $_POST['related_interest_opt1'];  
                          $related_interest2 = $_POST['related_interest_opt2']; 
                          $related_interest3 = $_POST['related_interest_opt3']; 
                          $related_hobbies1 = $_POST['related_hobbies_opt1']; 
                          $related_hobbies2 = $_POST['related_hobbies_opt2'];         
                          $related_hobbies3 = $_POST['related_hobbies_opt3']; 
                              // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "project");

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            else{

                            // Check if the email address already exists in the database
                            $check_query = "SELECT * FROM generated_codes WHERE email = '$email'";
                            $check_result = mysqli_query($conn, $check_query);

                            if (mysqli_num_rows($check_result) > 0) {
                                // Delete the existing data
                                $delete_query = "DELETE FROM generated_codes WHERE email = '$email'";
                                $delete_result = mysqli_query($conn, $delete_query);

                                if ($delete_result) {   
                                  //process of modifying profiling
                                  $insert_result = mysqli_query($conn,
                            "INSERT INTO generated_codes(email,exam_key,exam_date, status, strand, pref_course,pref_secondary_course,pref_tertiary_course, interest, secondary_interest, tertiary_interest, hobby, secondary_hobby, tertiary_hobby ,exam_key_created_at) VALUES ('". $email . "','".$exam_code."','".$date."','pending','".$strand."', '".$pref_course. "', '".$pref_secondary_course."', '".$pref_tertiary_course."', '".$related_interest1."', '".$related_interest2."', '".$related_interest3."', '".$related_hobbies1."', '".$related_hobbies2."', '".$related_hobbies3."', NOW() )
                            ");

                            if ($insert_result) {
                              echo "<script> window.location = '../views/user-exam_key.php' </script>";
                            } else {
                              
                            }

                            // Close the database connection
                            mysqli_close($conn);  
                          }
                           } 
                            
                            else{ 

                            // Insert the new profiling data
                            $insert_result = mysqli_query($conn,
                            "INSERT INTO generated_codes(email,exam_key,exam_date, status, strand, pref_course,pref_secondary_course,pref_tertiary_course, interest, secondary_interest, tertiary_interest, hobby, secondary_hobby, tertiary_hobby ,exam_key_created_at) VALUES ('". $email . "','".$exam_code."','".$date."','pending','".$strand."', '".$pref_course. "', '".$pref_secondary_course."', '".$pref_tertiary_course."', '".$related_interest1."', '".$related_interest2."', '".$related_interest3."', '".$related_hobbies1."', '".$related_hobbies2."', '".$related_hobbies3."', NOW() )
                            ");

                            if ($insert_result) {
                              echo "<script> window.location = '../views/user-exam_key.php' </script>";
                            } else {

                            }

                            // Close the database connection
                            mysqli_close($conn);  
                          }
                        }
                        }  
                        ?>          
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Add Bus-->

               

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

  </body>
</html>