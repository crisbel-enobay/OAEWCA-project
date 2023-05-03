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
                          echo "<td class ='tdclass'>" . $row["exam_date"] . "</td>";
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
                <?php
                // assume $tableList is an array of items in the table

                if (count($tableList) > 0) {
                  // render the modal button
                  echo '<button type="button" class="btn btn-primary my-4 py-2 px-4 align-items-center" style="margin: 40%;" data-bs-toggle="modal" data-bs-target="#transactionModal">Edit Exam Schedule and Profile</button>';
                } else {
                  // render a disabled modal button
                  echo '<button type="button" disabled class="btn btn-primary my-4 py-2 px-4 align-items-center" style="margin-left: 40%;" data-bs-toggle="modal" data-bs-target="#transactionModal">Edit Exam Schedule and Profile</button>';
                }
                ?>
              </div>
               <!-- Add Bus-->
               <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit your Exam Schedule</h5>
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
                          <label>Select personality traits</label>
                          <div class="form-group">
                          <select id="traits" name="traits[]" class="form-control" multiple >
                          <option value="">-- select personality traits --</option>
                          <?php
                        include "../forms/database.php";
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }
                                    // fetch distinct personality traits from the course table
                              $sql = "SELECT personality_trait FROM personality_traits";
                              $result = $conn->query($sql);

                              // create an empty array to store the traits
                              $traits_array = array();

                              // loop through the fetched rows and add the traits to the array
                              if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                  $traits = $row["personality_trait"];
                                  array_push($traits_array, $traits);
                                }
                              }

                              // sort the traits alphabetically
                              sort($traits_array);

                              // remove duplicates and create select options
                              $unique_traits = array_unique($traits_array);
                              foreach ($unique_traits as $trait) {
                                echo "<option value=\"$trait\">$trait</option>";
                              }
                      ?>
                        </select>
                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Select interests</label>
                          <div class="form-group">
                          <select class="form-control" id="interests" name="interests[]" multiple >
                              <option value="">-- select interest --</option>
                              <?php
                              include "../forms/database.php";
                              if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                              }

                              // fetch distinct interests from the course table
                              $sql = "SELECT interest FROM interests ORDER BY interest ASC";
                              $result = $conn->query($sql);

                              // loop through the results and create an option for each interest
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      $interest = $row["interest"];
                                      echo "<option value=\"$interest\">$interest</option>";
                                  }
                              }

                              $conn->close();
                          ?>
                         </select>

                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Select skills</label>
                          <div class="form-group">
                          <select class="form-control" id="skills" name="skills[]" multiple >
                        <option value="">-- select skills --</option>
                        <?php
                          include "../forms/database.php";
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT skill FROM skills ORDER BY skill ASC";
                        $result = $conn->query($sql);

                        // loop through the results and create an option for each interest
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $skill = $row["skill"];
                                echo "<option value=\"$skill\">$skill</option>";
                            }
                        }

                        $conn->close();
                        ?>
                      </select>

                              </div>
                        </div>
                        <div class="mb-3">
                          <label>Select career goals</label>
                          <div class="form-group">
                          <select class="form-control" id="career_goals" name="career_goals[]" multiple >
                              <option value="">-- Select Career Goals --</option>
                              <?php
                                  include "../forms/database.php";
                                  if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                  }
                          
                                  $sql = "SELECT career_goal FROM career_goals ORDER BY career_goal ASC";
                              $result = $conn->query($sql);
                          
                              // loop through the results and create an option for each interest
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      $career_goal = $row["career_goal"];
                                      echo "<option value=\"$career_goal\">$career_goal</option>";
                                  }
                              }
                          
                              $conn->close();
                              ?>
                          </select>
                              </div>
                        </div>
                        
                      <div class="modal-footer">
                        <input type="submit" disabled name="Add" data-toggle="modal" data-target="#myModal" class="btn btn-primary" id="myBtn" value="change"/>       
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
                          $traits = $_POST['traits'];
                          $traits_string = implode(',', $traits);
                          $interests = $_POST['interests'];
                          $interests_string = implode(',', $interests);
                          $skills = $_POST['skills'];
                          $skills_string = implode(',', $skills);
                          $career_goals = $_POST['career_goals']; 
                          $career_goals_string = implode(',', $career_goals);
                              // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "project");

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT * FROM courses";
                            $result = $conn->query($query);

                            // Store fetched data in $course_data array
                            while ($row = $result->fetch_assoc()) {
                              $course_data[$row['course']] = array(
                                  'personality_traits' => array_map('trim', explode(',', $row['personality_traits'])),
                                  'interests' => array_map('trim', explode(',', $row['interests'])),
                                  'skills' => array_map('trim', explode(',', $row['skills'])),
                                  'career_goals' => array_map('trim', explode(',', $row['career_goals'])),
                              );
                            }

                          $traits_query = "SELECT personality_trait FROM personality_traits";
                          $traits_result = $conn->query($traits_query);

                          // create an empty array to store the traits
                          $traits_array = array();

                          // loop through the fetched rows and add the traits to the array
                          if ($traits_result->num_rows > 0) {
                              while ($row = $traits_result->fetch_assoc()) {
                                  $traits = $row["personality_trait"];
                                  array_push($traits_array, $traits);
                              }
                          }
                          // Initialize variables to store top 3 courses
                          $first_course = '';
                          $second_course = '';
                          $third_course = '';
                            // Retrieve user's input
                            $traits = $_POST['traits'];
                            $interests = $_POST['interests'];
                            $skills = $_POST['skills'];
                            $career_goals = $_POST['career_goals'];

                            // Calculate match score for each course based on user's input
                            $match_scores = array();
                          foreach ($course_data as $course => $data) {
                              $score = 0;
                              foreach ($traits as $trait) {
                                  if (in_array($trait, $traits_array)) {
                                      $score++;
                                  }
                              }
                              foreach ($interests as $interest) {
                                if (in_array($interest, $data['interests'])) {
                                    $score++;
                                }
                            }
                            foreach ($skills as $skill) {
                                if (in_array($skill, $data['skills'])) {
                                    $score++;
                                }
                            }
                              foreach ($career_goals as $career_goal) {
                                if (in_array($career_goal, $data['career_goals'])) {
                                    $score++;
                                }
                            }
                              // Add the score to an array for the current course
                              $match_scores[$course] = array(
                                  'score' => $score,
                                  'personality_traits' => $data['personality_traits']
                              );
                          }

                          // Sort courses by match score and output top 3
                          arsort($match_scores);
                          $top_courses = array_slice($match_scores, 0, 3);
                          foreach ($top_courses as $course => $data) {
                              $score = $data['score'];
                              
                              // Store top 3 courses in separate variables
                              if ($score > 0 && $first_course == '') {
                                  $first_course = $course;
                              } elseif ($score > 0 && $second_course == '') {
                                  $second_course = $course;
                              } elseif ($score > 0 && $third_course == '') {
                                  $third_course = $course;
                              }
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
                                  $insert_result = mysqli_query($conn,  "INSERT INTO generated_codes(fullname,email,exam_key,exam_date,exam_time,exam_time_end,status, 
                                  strand, pref_course, traits, interest, skill, career_goal,f_course,s_course,t_course,
                                   exam_key_created_at) VALUES ('". $fullname . "','". $email . "','".$exam_code."',
                                   '".$examDate."','". $examTime."','". $examtimeend."','pending','".$strand."',
                                    '".$pref_course. "', '".$traits_string. "',
                                     '".$interests_string."','".$skills_string."', 
                                     '".$career_goals_string."','".$first_course."','".$second_course."','".$third_course."', NOW() )
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
                            $insert_result = mysqli_query($conn,  "INSERT INTO generated_codes(fullname,email,exam_key,exam_date,exam_time,exam_time_end,status, 
                                  strand, pref_course, traits, interest, skill, career_goal,f_course,s_course,t_course,
                                   exam_key_created_at) VALUES ('". $fullname . "','". $email . "','".$exam_code."',
                                   '".$examDate."','". $examTime."','". $examtimeend."','pending','".$strand."',
                                    '".$pref_course. "', '".$traits_string. "',
                                     '".$interests."','".$skills."', 
                                     '".$career_goals."','".$first_course."','".$second_course."','".$third_course."', NOW() )
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