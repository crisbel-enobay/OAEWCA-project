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
            <img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" class="logo-dark" />
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
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
              <a class="nav-link">
                <span class="menu-title">Results</span>
                <i class="icon-chart menu-icon"></i>
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
                     <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Logic</h5>
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
$allotted_time = 3600;
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
            <div class="py-2 h4"><b>Choose the best answer.</b></div>
              <div id="exam1">
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                  <div class="py-2 h5"><b>1. which option best describes your job role?</b></div>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> a) Small Business Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> b) Nonprofit Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> c) Journalist or Activist </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> d) other </label>
                            </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                  <button onclick="toggleDiv(this.value)" value="" class="btn btn-success d-flex align-items-center btn-danger disabled" type="button">Previous</button>
                  <button onclick="toggleDiv(this.value)" value="2" class="btn btn-success border-success align-items-center" type="button">Next</button>
                </div>
              </div>
              <div id="exam2" style="display: none">
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                  <div class="py-2 h5"><b>2. which option best describes your job role?</b></div>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> a) Small Business Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> b) Nonprofit Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> c) Journalist or Activist </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> d) other </label>
                            </div>
                    </div>
                </div>
                  <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <button onclick="toggleDiv(this.value)" value="1" class="btn btn-success d-flex align-items-center btn-danger" type="button">Previous</button>
                    <button onclick="toggleDiv(this.value)" value="3" class="btn btn-success border-success align-items-center" type="button">Next</button>
                  </div>
              </div>
              <div id="exam3" style="display: none">
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                  <div class="py-2 h5"><b>3. which option best describes your job role?</b></div>
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> a) Small Business Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> b) Nonprofit Owner or Employee </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> c) Journalist or Activist </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" default> d) other </label>
                            </div>
                    </div>
                </div>
                  <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <button onclick="toggleDiv(this.value)" value="2" class="btn btn-success d-flex align-items-center btn-danger" type="button">Previous</button>
                    <form action="../views/user-results.php">
                      <button onclick="toggleDiv(this.value)" class="btn btn-success border-success align-items-center" type="submit">Next Subject</button>
                    </form>                  
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!--Timer-->
    <script>
      let hours = 1; // starting number of hours
      let minutes = 0; // starting number of minutes
      let seconds = 0; // starting number of seconds

      // converts all to seconds
      let totalSeconds = hours * 60 * 60 + minutes * 60 + seconds;

      //temporary seconds holder
      let tempSeconds = totalSeconds;

      // calculates number of days, hours, minutes and seconds from a given number of seconds
      const convert = (value, inSeconds) => {
      if (value > inSeconds) {
          let x = value % inSeconds;
          tempSeconds = x;
          return (value - x) / inSeconds;
      } else {
          return 0;
      }
      };

      //sets seconds
      const setSeconds = (s) => {
      document.querySelector("#seconds").textContent = s + "s";
      };

      //sets minutes
      const setMinutes = (m) => {
      document.querySelector("#minutes").textContent = m + "m";
      };

      //sets hours
      const setHours = (h) => {
      document.querySelector("#hours").textContent = h + "h";
      };

      // Update the count down every 1 second
      var x = setInterval(() => {
      //clears countdown when all seconds are counted
      if (totalSeconds <= 0) {
          clearInterval(x);
      }
      setHours(convert(tempSeconds, 60 * 60));
      setMinutes(convert(tempSeconds, 60));
      setSeconds(tempSeconds == 60 ? 59 : tempSeconds);
      totalSeconds--;
      tempSeconds = totalSeconds;
      }, 1000);
    </script>

    <script>
        function toggleDiv(value) {

            if (value == "") {
              btn.disabled = true;
            }

            const box = document.getElementById('exam1');
            const box1 = document.getElementById('exam2');
            const box2 = document.getElementById('exam3');
            box.style.display = value == 1 ? 'block' : 'none';
            box1.style.display = value == 2 ? 'block' : 'none';
            box2.style.display = value == 3 ? 'block' : 'none';
        }
    </script>
  </body>
</html>