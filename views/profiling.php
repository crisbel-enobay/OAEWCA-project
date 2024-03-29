<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admission Exam</title>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>


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
        <div class="justify-content-center navbar-menu-wrapper d-flex align-items-center flex-grow-1 "> 
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <h1 class="mb-0 font-weight-medium d-none d-lg-flex text-primary">Profiling</h1>
          </ul>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <div id="countdown-container">
                <div id="countdown">
                    <h1><span id="hours">0h</span> :  <span id="minutes">2m</span> : <span id="seconds">0s</span></h1>
                </div>
            </div>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
       <!-- partial -->
       <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper">
          <div class="row flex-grow">
          <div class="container-fluid mt-sm-5 my-0">
              <div class="question ml-sm-5 pl-sm-5 pt-2">
                      <div class="py-2 h5"><b>Choose Hobbies</b></div>
                            <div class="row">   
                          <div class="col-sm-2 grid-margin stretch-card">
                              <select class="selectpicker">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                              </select>
                            </div>
                          <div class="col-sm-2 grid-margin stretch-card">
                              <select class="selectpicker">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                              </select>
                            </div>
                          <div class="col-sm-2 grid-margin stretch-card">
                              <select class="selectpicker">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                              </select>
                          </div>
                      </div>
                    
                  </div>
                  <div class="question ml-sm-5 pl-sm-5 pt-2">
                    <div class="py-2 h5"><b>Choose Preferred Courses</b></div>
                      <div class="row">   
                        <div class="col-sm-2 grid-margin stretch-card">
                            <select class="selectpicker">
                              <option>Mustard</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </select>
                          </div>
                        <div class="col-sm-2 grid-margin stretch-card">
                            <select class="selectpicker">
                              <option>Mustard</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </select>
                          </div>
                        <div class="col-sm-2 grid-margin stretch-card">
                            <select class="selectpicker">
                              <option>Mustard</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="d-flex align-items-center pt-3">
                      <div class="ml-auto mr-sm-5">
                        <form action="../views/exam-english.php">
                            <button type="submit" class="btn btn-success">Next</button>
                        </form>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!--Timer-->
    <script>
      let hours = 0; // starting number of hours
      let minutes = 2; // starting number of minutes
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
      $(document).ready(function(e) {
        $('.selectpicker').selectpicker();
      });
    </script>
  </body>
</html>