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
            <img src="../assets/img/kursonada.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini"><img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?></h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
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
              <a class="nav-link">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Admission Exam</span></li>
            <li class="nav-item active">
              <a class="nav-link" href="../views/user-exam.php">
                <span class="menu-title">Examination</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
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
                     <h5 class="mb-0 font-weight-medium d-none d-lg-flex">English</h5>
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
$allotted_time = $_SESSION['set_time']*60;
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
            FROM tbl_topic_questions where que_topic = 1
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
              $_SESSION["score"] -= 1;}
              $_SESSION["totalscore"] -= 1;

              $_SESSION["current_page"] = end($_SESSION["displayed_pages"]);
            } else {
              // Display the first page
              $_SESSION["current_page"] = $pages[0];
              $_SESSION["displayed_pages"][] = $pages[0];
            }

            if (isset($_POST["finish"])) {

              $_SESSION["score"] += $_POST['exam'];
              $_SESSION["totalscore"] += 1;
              
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
                    $traits = $row['traits'];
                    $interest = $row['interest'];
                    $skill = $row['skill'];
                    $career_goal = $row['career_goal'];
                    $f_course = $row['f_course'];
                    $f_related_course = $row['f_related_course'];
                    $s_course = $row['s_course'];
                    $s_related_course = $row['s_related_course'];
                    $t_course = $row['t_course'];
                    $t_related_course = $row['t_related_course'];
                    $exam_key_created_at = $row['exam_key_created_at'];
                 
                // Check if a row with the same email already exists in the 'results' table
                    $sql_check = "SELECT * FROM results WHERE email = '$email'";
                    $result_check = mysqli_query($conn, $sql_check);

                    if (mysqli_num_rows($result_check) > 0) {
                        // If a row is found, delete it
                        $sql_delete = "DELETE FROM results WHERE email = '$email'";
                        if (mysqli_query($conn, $sql_delete)) {
                            // If the row is deleted successfully, insert the new row
                            $sql_insert = "INSERT INTO results (fullname, email, exam_key, score, remarks, exam_date, exam_time, exam_time_end, status, strand, pref_course, traits, interest, skill, career_goal, f_course, f_related_course, s_course, s_related_course, t_course, t_related_course, exam_key_created_at)
                            VALUES ('$fullname', '$email', '$exam_key', '$percentile', '$remarks', '$exam_date', '$exam_time', '$exam_time_end', '$status', '$strand', '$pref_course', '$traits', '$interest', '$skill', '$career_goal', '$f_course', '$f_related_course', '$s_course', '$s_related_course', '$t_course', '$t_related_course', '$exam_key_created_at')";

                            if (mysqli_query($conn, $sql_insert)) {
                              echo "<script>
                              setTimeout(function() {
                                Swal.fire({
                                  title: 'FInished',
                                  text: 'Congratulations, you have finished the exam!',
                                  icon: 'success',
                                  confirmButtonText: 'Awesome'
                                  });
                                  }, 1000);
                                  </script>";
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
                            VALUES ('$fullname', '$email', '$exam_key', '$percentile', '$remarks', '$exam_date', '$exam_time', '$exam_time_end', '$status', '$strand', '$pref_course', '$traits', '$interest', '$skill', '$career_goal', '$f_course', '$f_related_course', '$s_course', '$s_related_course', '$t_course', '$t_related_course', '$exam_key_created_at')";

                            if (mysqli_query($conn, $sql_insert)) {
                              echo "<script>
                              setTimeout(function() {
                                Swal.fire({
                                  title: 'FInished',
                                  text: 'Congratulations, you have finished the exam!',
                                  icon: 'success',
                                  confirmButtonText: 'Awesome'
                                  });
                                  }, 1000);
                                  </script>";
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
              }
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
      
            echo "<h1 style='font-size: 24px;'>" . $question . "</h1>";
            //echo "<h1 style='font-size: 24px;'>" . $_SESSION['score'] . $_SESSION['totalscore'] . "</h1>";

            echo '<li>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[0].'" required/>
                  <label for="exam">A) '.$answers[0].' </label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[1].'" required/>
                  <label for="exam-B">B) '.$answers[1].'</label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[2].'" required/>
                  <label for="exam-C">C) '.$answers[2].'</label>
              </div>
              
              <div>
                  <input type="radio" name="exam"  value="'.$value[3].'" required/>
                  <label for="exam-D">D) '.$answers[3].'</label>
              </div>
          
          </li>';
      
            // Display the "Previous" button if there is a previous page
            if (count($_SESSION["displayed_pages"]) > 1) {
              echo "<button type='submit' class='btn btn-danger' name='previous'>Previous</button>";
            }
      
            // Display the "Next" button if there are more pages to display
            if (count($_SESSION["displayed_pages"]) < count($pages)) {
              echo "<button type='submit' class='btn btn-primary mx-3' name='next'>Next</button>";
            } else if (count($_SESSION["displayed_pages"]) == count($pages)) {

        

              echo "<button type='submit' class='btn btn-primary mx-3' name='finish'>Finish</button>";

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