<!DOCTYPE html>
<html lang="en">
  <?php include '../forms/send-password-reset-link.php'; ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Forgot Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Font Icon -->
  <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
        <a href="index.php" class="logo d-flex align-items-center">
          <span>
            <img src="../assets/img/OAEWCA-LOGO copy.png" alt="">
          </span>
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
          <li><a href="../views/register.php">Register</a></li>
          <li><a href="../views/loginform.php" >Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
      <div class="faq section-bg">
        
          <!-- Sign up form -->
          <section class="signup">
              <div class="container" style="width: 500px; height: 300px; padding: 15px; margin: 6% auto;">
                <div class="card mb-3 row g-3 needs-validation">

                    <div class="card-body">
    
                      <div class="pt-4 pb-2 pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                        <p class="text-center small">Enter your Email Address</p>
                      </div>
    
                      <form method="POST" enctype="multipart/form-data">
          
                        <div class="col-12">
                          <input style="font-size: 13px;" type="text" id="email" name="email" class="form-control p-2" placeholder="e.g. user@gmail.com " required>
                          <div class="d-flex justify-content-end px-3 pt-2">
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                          </div>
                        </div>
    
                        <div class="col-12">
                          <input class="btn btn-primary" type="submit" value="submit" name="submit_email">
                          <div class="col 12 lead small" style="color: green; padding: 8px; font-size: 13px; text-align: center;">
                          <?php include '../forms/email-verification.php'; if (isset($_POST["submit_email"])){ echo $submit_email_status;}  ?>
                          </div>
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