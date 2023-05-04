<?php 

  include '../file/logout-function.php';
  include "student-checker.php";
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admission Exam</title>
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
          <a class="navbar-brand brand-logo-mini"><img src="../assets/img/Kursonada-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?>!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
          <li class="nav-item dropdown"> <!--for mobile ui user drop down -->
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"><?php echo ($_SESSION['fullname']); ?> </span></a>
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
            <li class="nav-item nav-category sidebar-menu-title"><span class="nav-link">Entrance Exam</span></li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Examination</span>
                <i class="icon-arrow-right-circle menu-icon"></i>
              </a>
            </li>
            
          </ul>
        </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
    <div class="container-scroller">
    <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex"> 
                     <h5 class="mb-0 font-weight-medium d-none d-lg-flex">
                      <?php
                      include 'conn.php';
                      $select = mysqli_query($conn,
                        "SELECT subj_name
                        FROM tbl_exam_subjects where subj_id = ".$_SESSION['subjectexam']."
                        ");
                        
                        $seek = $select->fetch_assoc();
                        echo $seek['subj_name'];
                      ?>
                     </h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
          <?php

// Get the current time
$current_time = time();

// Get the start time from the session
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}
$start_time = $_SESSION['start_time'];

// Calculate the elapsed time
$allotted_time = 120*60;
$elapsed_time = $current_time - $start_time;

// Check if the elapsed time is greater than the allotted time
if ($elapsed_time > $allotted_time) {
    echo "The exam has ended.";
} else {
    // Display the remaining time
    $remaining_time = $allotted_time - $elapsed_time;
?>
<div id="timer">Time remaining: <span id="time-remaining"></span> seconds</div>

<?php
}?>
          </ul>
        </div>
      </nav>
       <!-- partial -->
     
        <div class="card-body d-flex align-items-center justify-content-center">
          <div class="row flex-grow">
            <div class="container-fluid">
            <form method="POST" >
            <?php
            include 'conn.php';
            $pages = array();
            $sql = mysqli_query($conn,
            "SELECT *
            FROM tbl_topic_questions where que_topic = ".$_SESSION['topicvalue']."
            ");
            $sqlrows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            $rows = $sqlrows;
            $i = 0;
            while ($i < count($rows)) {   //Creates a loop to loop through results
              $row = $rows[$i];
              array_push($pages, $row['que_id']);
              /*$name = $row['que_desc'];
              $value = array();
              $answers = array();
              $other = "";
              
              include 'conn.php';
              $answersql = "select * from tbl_que_answers where que_id = '".$id."'";
              $result = $conn->query($answersql);
              while ($check = $result->fetch_assoc()){
                array_push($value, $check['correct']);
                array_push($answers, $check['ans_desc']);
              }
              $l = $i+1;
              $exam = "exam".$l;
              
              echo '<li>
                
              <h4>'.$name.'</h4>
              
              <div>
                  <input type="radio" name="'.$exam.'"  value="'.$value[0].'" />
                  <label for="'.$exam.'">A) '.$answers[0].' </label>
              </div>
              
              <div>
                  <input type="radio" name="'.$exam.'"  value="'.$value[1].'" />
                  <label for="'.$exam.'-B">B) '.$answers[1].'</label>
              </div>
              
              <div>
                  <input type="radio" name="'.$exam.'"  value="'.$value[2].'" />
                  <label for="'.$exam.'-C">C) '.$answers[2].'</label>
              </div>
              
              <div>
                  <input type="radio" name="'.$exam.'"  value="'.$value[3].'" />
                  <label for="'.$exam.'-D">D) '.$answers[3].'</label>
              </div>
          
          </li>';
*/
              $i++;
            }
            if (!isset($_SESSION["displayed_pages"])) {
              $_SESSION["displayed_pages"] = array();
            }

            if (!isset($_SESSION["score"])) {
              $_SESSION["score"] = 0;
            }

            if (!isset($_SESSION["totalscore"])) {
              $_SESSION["totalscore"] = 0;
            }
      
            // Display the current page
            if (isset($_POST["next"])) {
              // Randomize the next page
              do {
                $next_page = $pages[array_rand($pages)];
              } while (in_array($next_page, $_SESSION["displayed_pages"]));

              $_SESSION["score"] += $_POST['exam'];
              $_SESSION["totalscore"] += 1;
      
              $_SESSION["displayed_pages"][] = $next_page;
              $_SESSION["current_page"] = $next_page;
            } elseif (isset($_POST["previous"])) {
              // Go back to the previous page
              array_pop($_SESSION["displayed_pages"]);
              if ($_SESSION["totalscore"] <= $_SESSION["score"]){
              $_SESSION["score"] -= 1;
              }
              $_SESSION["totalscore"] -= 1;

              $_SESSION["current_page"] = end($_SESSION["displayed_pages"]);
            } else {
              // Display the first page
              $_SESSION["current_page"] = $pages[0];
              $_SESSION["displayed_pages"][] = $pages[0];
            }

            if (isset($_POST["finish"])) {

              // Unset the set_time
              //unset($_SESSION['set_time']);
              // Get the remaining time and unset the start_time
              //$remaining_time = $allotted_time - $elapsed_time;
              //unset($_SESSION['start_time']);

              $_SESSION["score"] += $_POST['exam'];
              $_SESSION["totalscore"] += 1;
              $_SESSION['topicexam']+=1;
              $totaltopics = mysqli_query($conn,
              "SELECT row_number() OVER (ORDER BY topic_id, topic_name) n,
              topic_id, topic_name
              FROM tbl_exam_topics where topic_subj = ".$_SESSION['subjectexam']."
              ;
              ");
              $rowcount=mysqli_num_rows($totaltopics);
              if ($_SESSION['topicexam'] <= $rowcount){
                $result = mysqli_query($conn,
                "SELECT row_number() OVER (ORDER BY topic_id, topic_name) n,
                topic_id, topic_name
                FROM tbl_exam_topics where topic_subj = ".$_SESSION['subjectexam']."
                ;
                ");
                
                while ($row = $result->fetch_assoc()) {
                if ($row['n'] == $_SESSION['topicexam']){
                  $_SESSION['topicvalue'] =  $row['topic_id'];
                }
                //$_SESSION['topicexam'];
                }
                echo "<script> window.location = 'user-exam-topic.php' </script>";
                return;
              }

              else if ($_SESSION['topicexam'] > $rowcount && $_SESSION['subjectexam'] != 4){
                $_SESSION['subjectexam']++;
                $_SESSION['topicexam'] = 0;
              echo "<script> window.location = 'user-exam-subject.php' </script>";
              }

              
              if ($_SESSION['subjectexam'] == 4){
              $percentile = ($_SESSION["score"]/$_SESSION["totalscore"])*100;
              $email = $_SESSION['email'];

              if ($percentile >= 75) {
                $remarks = 'passed';
              } else {
                $remarks = 'failed';
              }
              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              // SQL query to get rows where email is equal to session email
              $sql = "SELECT * FROM generated_codes WHERE email = '$email'";

              $result = mysqli_query($conn, $sql);

              // Check if any rows were returned
              if (mysqli_num_rows($result) > 0) {
                // Loop through the rows and store the specific results column in variables
                while($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row['fullname'];
                    $exam_key = $row['exam_key'];
                    $exam_date = $row['exam_date'];
                    $exam_time = $row['exam_time'];
                    $exam_time_end = $row['exam_time_end'];
                    $status = 'finished';
                    $strand = $row['strand'];
                    $pref_course = $row['pref_course'];
                    $traits_var = $row['traits'];
                    $interest_var = $row['interest'];
                    $skill_var = $row['skill'];
                    $career_goal_var = $row['career_goal'];
                    $traits_string = explode(',', $traits_var);
                    $interests_string = explode(',', $interest_var);
                    $skills_string = explode(',', $skill_var);
                    $career_goals_string = explode(',', $career_goal_var);
                    // $f_course = $row['f_course'];
                    // $f_related_course = $row['f_related_course'];
                    // $s_course = $row['s_course'];
                    // $s_related_course = $row['s_related_course'];
                    // $t_course = $row['t_course'];
                    // $t_related_course = $row['t_related_course'];
                    $exam_key_created_at = $row['exam_key_created_at'];

                    
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
                                  'related_courses' => array_map('trim', explode(',', $row['related_course'])),
                                  'math_score_requirement' => intval($row['Math']),
                                  'english_score_requirement' => intval($row['English']),
                                  'filipino_score_requirement' => intval($row['Filipino']),
                                  'logic_score_requirement' => intval($row['Logic']),
                                  'science_score_requirement' => intval($row['Science']),
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
                            $first_course_related = '';
                            $second_course = '';
                            $second_course_related = '';
                            $third_course = '';
                            $third_course_related = '';
                              // Retrieve user's score per subject input
                              $predefined_math_score = 20;
                              $predefined_english_score = 20;
                              $predefined_logic_score = 20;
                              $predefined_science_score = 20;
                              $predefined_filipino_score = 20;
                            

                              // Calculate match score for each course based on user's input
                              $match_scores = array();
                            foreach ($course_data as $course => $data) {
                                $score = 0;
                                $course_score = 0;
                                foreach ($traits_string as $trait) {
                                    if (in_array($trait, $traits_array)) {
                                        $score++;
                                    }
                                }
                                foreach ($interests_string as $interest) {
                                  if (in_array($interest, $data['interests'])) {
                                      $score++;
                                  }
                              }
                              foreach ($skills_string as $skill) {
                                  if (in_array($skill, $data['skills'])) {
                                      $score++;
                                  }
                              }
                                foreach ($career_goals_string as $career_goal) {
                                  if (in_array($career_goal, $data['career_goals'])) {
                                      $score++;
                                  }
                              }
                              if ($predefined_math_score <= $data['math_score_requirement']) {
                                $course_score++;
                              }
                              if ($predefined_english_score <= $data['english_score_requirement']) {
                                $course_score++;
                              }
                              if ($predefined_logic_score <= $data['logic_score_requirement']) {
                                $course_score++;
                              }
                              if ($predefined_science_score <= $data['science_score_requirement']) {
                                $course_score++;
                              }
                              if ($predefined_filipino_score <= $data['filipino_score_requirement']) {
                                $course_score++;
                              }
                                // Add the score to an array for the current course
                                $match_scores[$course] = array(
                                  'total_score' => $score + $course_score,
                                  'score' => $score,
                                  'subject_course_score' => $course_score,
                                  'math_score_requirement' => $data['math_score_requirement'],
                                  'personality_traits' => $data['personality_traits'],
                                  'related_courses' => $data['related_courses']
                              );
                            }

                          //   foreach ($match_scores as $course_name => $course_data) {
                          //     $score = $course_data['score'];
                          //     $total_score = $course_data['total_score'];
                          //     $subject_course_score = $course_data['subject_course_score'];
                          //     echo $course_name . ': ' . $score . ' ' . $subject_course_score . ' ' . $total_score . '<br>';
                          // }

                          
                            // Sort courses by match score and output top 3
                            arsort($match_scores);
                            $top_courses = array_slice($match_scores, 0, 3);
                            foreach ($top_courses as $course => $data) {
                                $total_scores = $data['score'];
                                $related_courses = $data['related_courses'];
                                
                                // Store top 3 courses in separate variables
                                if ($total_scores > 0 && $first_course == '') {
                                    $first_course = $course;
                                    $first_course_related = implode(", ", $related_courses);
                                } elseif ($total_scores > 0 && $second_course == '') {
                                    $second_course = $course;
                                    $second_course_related = implode(", ", $related_courses);
                                } elseif ($total_scores > 0 && $third_course == '') {
                                    $third_course = $course;
                                    $third_course_related = implode(", ", $related_courses);
                                }
                            }
                 
                // Check if a row with the same email already exists in the 'results' table
                    $sql_check = "SELECT * FROM results WHERE email = '$email'";
                    $result_check = mysqli_query($conn, $sql_check);

                    if (mysqli_num_rows($result_check) > 0) {
                        // If a row is found, delete it
                        $sql_delete = "DELETE FROM results WHERE email = '$email'";
                        if (mysqli_query($conn, $sql_delete)) {
                            // If the row is deleted successfully, insert the new row
                            $sql_insert = "INSERT INTO results (fullname, email, exam_key, score, remarks, exam_date, exam_time, exam_time_end, status, strand, pref_course, traits, interest, skill, career_goal, f_course, f_related_course, s_course, s_related_course, t_course, t_related_course, exam_key_created_at)
                            VALUES ('$fullname', '$email', '$exam_key', '$percentile', '$remarks', '$exam_date', '$exam_time', '$exam_time_end', '$status', '$strand', '$pref_course', '$traits_var', '$interest_var', '$skill_var', '$career_goal_var', '$first_course', '$first_course_related', '$second_course', '$second_course_related', '$third_course', '$third_course_related', '$exam_key_created_at')";

                              if (mysqli_query($conn, $sql_insert)) {
                                
                              $sql_delete2 = "DELETE FROM generated_codes WHERE email = '$email'";
                              if (mysqli_query($conn, $sql_delete2)) {
                                  // If the row is deleted successfully, insert the new row
                                  $sql_insert = "INSERT INTO generated_codes (fullname, email, exam_key, exam_date, exam_time, exam_time_end, status, strand, pref_course, traits, interest, skill, career_goal, exam_key_created_at)
                                  VALUES ('$fullname', '$email', '$exam_key', '$exam_date', '$exam_time', '$exam_time_end', '$status', '$strand', '$pref_course', '$traits_var', '$interest_var', '$skill_var', '$career_goal_var', '$exam_key_created_at')";
      
                                    if (mysqli_query($conn, $sql_insert)) {
                                      echo "<script>
                                      setTimeout(function() {
                                          Swal.fire({
                                              title: 'Finished',
                                              text: 'Congratulations, you have finished the exam!',
                                              icon: 'success',
                                              confirmButtonText: 'Awesome',
                                              // timer: 3000,
                                              allowOutsideClick: true,
                                              didDestroy: function() {
                                                  window.location.href = 'user-dashboard.php';
                                              }
                                          });
                                      }, 1000);
                                    </script>";
      
                                    } else {
                                      echo "<script>
                                      setTimeout(function() {
                                              swal({
                                                title: 'Error inserting record',
                                                text: '".mysqli_error($conn)."',
                                                icon: 'error',
                                                timer: 3000,
                                                button: false,
                                              });
                                            }, 1000);
                                            </script>";
                                  }
                              }
                              } else {
                                echo "<script>
                                        swal({
                                          title: 'Error inserting record',
                                          text: '".mysqli_error($conn)."',
                                          icon: 'error',
                                          timer: 3000,
                                          button: false,
                                        });
                                      </script>";
                            }
                        } else {
                            // If there is an error deleting the row, display an error message
                            echo "<script>
                                    swal({
                                      title: 'Error deleting existing record',
                                      text: '".mysqli_error($conn)."',
                                      icon: 'error',
                                      timer: 3000,
                                      button: false,
                                    });
                                  </script>";
                        }
                    } else {
                        // If no row is found, insert the new row
                        $sql_insert = "INSERT INTO results (fullname, email, exam_key, score, remarks, exam_date, exam_time, exam_time_end, status, strand, pref_course, traits, interest, skill, career_goal, f_course, f_related_course, s_course, s_related_course, t_course, t_related_course, exam_key_created_at)
                        VALUES ('$fullname', '$email', '$exam_key', '$percentile', '$remarks', '$exam_date', '$exam_time', '$exam_time_end', '$status', '$strand', '$pref_course', '$traits_var', '$interest_var', '$skill_var', '$career_goal_var', '$first_course', '$first_course_related', '$second_course', '$second_course_related', '$third_course', '$third_course_related', '$exam_key_created_at')";

              if (mysqli_query($conn, $sql_insert)) {
                $sql_update = "UPDATE generated_codes SET
                                status = '$status',
                                skill = '$skill_var',
                                interest = '$interest_var',
                                pref_course = '$pref_course',
                                traits = '$traits_var',
                                career_goal = '$career_goal_var',
                                exam_date = '$exam_date',
                                exam_time = '$exam_time',
                              exam_time_end = '$exam_time_end'
                              WHERE email = '$email' AND fullname = '$fullname'";
        
                        if (mysqli_query($conn, $sql_update)) {
                            echo "<script>
                                  setTimeout(function() {
                                      Swal.fire({
                                    title: 'Finished',
                                    text: 'Congratulations, you have finished the exam!',
                                    icon: 'success',
                                    confirmButtonText: 'Awesome',
                                    // timer: 3000,
                                    allowOutsideClick: true,
                                    didDestroy: function() {
                                        window.location.href = 'user-dashboard.php';
                                    }
                                });
                            }, 1000);
                          </script>";
                  }
                else {
                                      echo "<script>
                                      setTimeout(function() {
                                              swal({
                                                title: 'Error inserting record',
                                                text: '".mysqli_error($conn)."',
                                                icon: 'error',
                                                // timer: 3000,
                                                button: false,
                                              });
                                            }, 1000);
                                            </script>";
                                  }
                              
                            } else {
                                echo "<script>
                                        swal({
                                          title: 'Error inserting record',
                                          text: '".mysqli_error($conn)."',
                                          icon: 'error',
                                          timer: 3000,
                                          button: false,
                                        });
                                      </script>";
                            }
                    }

              

                }
              } else {
                echo "No rows found";
              }}
            }

            $newsql = mysqli_query($conn,
            "SELECT *
            FROM tbl_topic_questions where que_id = '".$_SESSION['current_page']."'
            ");
            $newsqlrows = mysqli_fetch_all($newsql, MYSQLI_ASSOC);
            $rowes = $newsqlrows;
            $j = 0;
            $question = "";
            $value = array();
            $answers = array();
            while ($j < count($rowes)) {   //Creates a loop to loop through results
              $row = $rowes[$j];
              $question = $row['que_desc'];
              $j++;
              
              include 'conn.php';
              $answersql = "select * from tbl_que_answers where que_id = '".$_SESSION['current_page']."'";
              $result = $conn->query($answersql);
              while ($check = $result->fetch_assoc()){
                array_push($value, $check['correct']);
                array_push($answers, $check['ans_desc']);
              }
            }
      
            echo "<h1 style='font-size: 24px; padding-left: 2%;'>" . $question . "</h1>";
            //echo "<h1 style='font-size: 24px;'>" . $_SESSION['score'] . $_SESSION['totalscore'] . "</h1>";

            echo '<li style="padding-left: 5%; text-decoration: none;">
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[0].'" required/>
                  <label for="exam"> '.$answers[0].' </label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[1].'" required/>
                  <label for="exam-B"> '.$answers[1].'</label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[2].'" required/>
                  <label for="exam-C"> '.$answers[2].'</label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[3].'" required/>
                  <label for="exam-D"> '.$answers[3].'</label>
              </div>
          
          </li>';
      
            // Display the "Previous" button if there is a previous page
            if (count($_SESSION["displayed_pages"]) > 1) {
              echo "<button type='submit' class='btn btn-danger' style='margin-left: 5%;' name='previous'>Previous</button>";
            }
      
            // Display the "Next" button if there are more pages to display
            if (count($_SESSION["displayed_pages"]) < count($pages)) {
              echo "<button type='submit' class='btn btn-primary mx-3' style='margin-left: 5%;' name='next'>Next</button>";
            } else if (count($_SESSION["displayed_pages"]) == count($pages)) {

        

              echo "<button type='submit' class='btn btn-primary mx-3' style='margin-left: 5%;' name='finish'>Finish</button>";

                    }


            
            
            ?>
            </br>
          
          <?php    
              if (isset($_POST['submit'])){
                $i++;
              $counter = 1;$total = 0;
              while ($counter < $i){
                $text = "exam".$counter;
                if ($_POST[$text] == "1") {$total++;}
                $counter++;
              }
              echo $total;}
            ?>
              </form>


                  </div>
                 </div>
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
    <script src="../js/hoverable-collapse.js"></script><!--for sidebar user drop down -->
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
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script>
    // Get the remaining time from PHP
    var remainingTime = <?php echo $remaining_time; ?>;

    // Update the timer display every second
    setInterval(function() {
        remainingTime--;
        var hours = Math.floor(remainingTime / 3600);
        var minutes = Math.floor((remainingTime - (hours * 3600)) / 60);
        var seconds = remainingTime - (hours * 3600) - (minutes * 60);
        document.getElementById("time-remaining").innerHTML = hours + ":" + minutes + ":" + seconds;
    }, 1000);
</script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--Timer-->
    <script>
      // let hours = 1; // starting number of hours
      // let minutes = 0; // starting number of minutes
      // let seconds = 0; // starting number of seconds

      // // converts all to seconds
      // let totalSeconds = hours * 60 * 60 + minutes * 60 + seconds;

      // //temporary seconds holder
      // let tempSeconds = totalSeconds;

      // // calculates number of days, hours, minutes and seconds from a given number of seconds
      // const convert = (value, inSeconds) => {
      // if (value > inSeconds) {
      //     let x = value % inSeconds;
      //     tempSeconds = x;
      //     return (value - x) / inSeconds;
      // } else {
      //     return 0;
      // }
      // };

      // //sets seconds
      // const setSeconds = (s) => {
      // document.querySelector("#seconds").textContent = s + "s";
      // };

      // //sets minutes
      // const setMinutes = (m) => {
      // document.querySelector("#minutes").textContent = m + "m";
      // };

      // //sets hours
      // const setHours = (h) => {
      // document.querySelector("#hours").textContent = h + "h";
      // };

      // // Update the count down every 1 second
      // var x = setInterval(() => {
      // //clears countdown when all seconds are counted
      // if (totalSeconds <= 0) {
      //     clearInterval(x);
      // }
      // setHours(convert(tempSeconds, 60 * 60));
      // setMinutes(convert(tempSeconds, 60));
      // setSeconds(tempSeconds == 60 ? 59 : tempSeconds);
      // totalSeconds--;
      // tempSeconds = totalSeconds;
      // }, 1000);
      
    </script>

  </body>
</html>