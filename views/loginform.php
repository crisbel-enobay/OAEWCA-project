
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_POST["submit"])){
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // enable exceptions
$conn = mysqli_connect('localhost', "root", "", "project");
$log_email = $_POST['your_name'];
$log_password = $_POST['your_pass'];
$_SESSION['valid'] = false;
include "../file/session.php";

$sql = "SELECT email, fullname, password, verified_date, type FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $log_email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  if (password_verify($log_password, $row['password'])) {
      $message = "ok";
      // header must be called before any other output
      if ($row['verified_date'] == null){
          header("Location: ../views/email-ui.php?email=" . $log_email . "");
      }
      else{ 
        $_SESSION['valid'] = true;
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['email'] = $row['email'];
          if ($row['type'] == '1'){
              $_SESSION['type'] = 'admin';
              echo "<script> window.location = '../views/admin.php' </script>";
            }
            else if ($row['type'] == '0'){
              $_SESSION['type'] = 'student';
              echo "<script> window.location = '../views/user-dashboard.php' </script>";
            }
          }
  }
}
$message = "Invalid credentials";
// header must be called before any other output
}
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Log in</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Font Icon -->
  <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Favicons -->
  <link href="../assets/img/ucc.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/style2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.9.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="../index.php" class="logo d-flex align-items-center">
          <span>
            <img src="../assets/img/OAEWCA-LOGO copy.png" alt="">
          </span>
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../views/register.php">Register</a></li>
          <li><a class="nav-link scrollto active" href="../views/loginform.php" >Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="faq section-bg">
    <!-- Sing in  Form -->
  <section class="sign-in">
      <div class="container-sign">
          <div class="signin-content">
              <div class="signin-image">
                  <figure><img src="../assets/img/signin-image.jpg" class="sign-img" alt="sing up image"></figure>
              </div>

              <div class="signin-form">
                  <h2 class="form-title">Login</h2>
                  <form method="POST" class="register-form" id="login-form">
                      <div class="form-group">
                          <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="your_name" id="your_name" placeholder="Your Email"/>
                      </div>
                      <div class="form-group">
                          <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                          <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                      </div>
                      <div class="col-12">
                          <input class="btn btn-primary w-100" type="submit" name="submit" value="Login">
                          <div class="col 12 lead small" style="color: red; padding: 8px; font-size: 13px; ">
                            <?php if (isset($_POST["submit"])){
                            echo $message;
                          } ?>
                          </div>
                        </div>
                        <div class="col-12">
                          <p class="col-12 d-flex justify-content-center"><a href="../views/register.php"  class="signup-image-link"> &nbsp; Create an account</a></p>
                          <p class="col-12 d-flex justify-content-center"><a href="../views/forgot-password.php"  class="signup-image-link">Forgot Password?</a></p>
                        </div>
                  </form>
              </div>
          </div>
      </div>
  </section>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <div id="contact" class="footer-top">
        <div style="font-size: small; text-align: center;">
          <div class="copyright">
            &copy; Copyright <strong><span> BSCS 4B Group 3 </span></strong>. All Rights Reserved
          </div>
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <!-- JS -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>