<!DOCTYPE html>
<html lang="en">
  
<?php

   if(session_status() !== PHP_SESSION_ACTIVE) 
   {
    session_start();
   }
    if (isset($_SESSION['valid'])){
    if ($_SESSION['valid'] == true){
        if ($_SESSION['type'] == 'admin'){
             echo "<script> window.location = 'admin.php' </script>";
        }
        else if ($_SESSION['type'] == 'student'){
             echo "<script> window.location = 'user-dashboard.php' </script>";
        }
    }
}


    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require '../vendor/autoload.php';
 
    if (isset($_POST["signup"]))
    {
        $reg_fullname = $_POST["fullname"];
        $reg_email = $_POST["email"];
        $reg_password = $_POST["password"];
        $reg_password2 = $_POST["password2"];
        

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'lebbraumjayce3@gmail.com';
 
            //SMTP password
            $mail->Password = 'rnimmwsahakqkmmb';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 465;
 
            //Recipients
            $mail->setFrom('lebbraumjayce3@gmail.com', 'KURSONADA');
 
            //Add a recipient
            $mail->addAddress($reg_email, $reg_fullname);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
 
            $encrypted_password = password_hash($reg_password, PASSWORD_DEFAULT);
              if (!isset($_POST['agree-term'])) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                    <script> 
                      setTimeout(function() {
                        Swal.fire({
                          title: 'Error',
                          icon: 'error',
                          text: 'Check agree terms',
                          showConfirmButton: true,
                        }).then(function() {
                          window.location = '../views/register.php';
                        });
                      }, 100);
                    </script>";
              } else {
                  // process the form submission
                  // ...
             
      
          
 
            if ($reg_password == $reg_password2) {
              // Connect to the database
              $conn = mysqli_connect("localhost", "root", "", "project");
          
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

            // check email
            $duplicate_email = mysqli_query($conn, "SELECT email, password, verified_date, type FROM users WHERE email= '$reg_email'");
		          if (mysqli_num_rows($duplicate_email) > 0) {
		          	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                    <script> 
                      setTimeout(function() {
                        Swal.fire({
                          title: 'Error',
                          icon: 'error',
                          text: 'Email already exist',
                          showConfirmButton: true,
                        }).then(function() {
                          window.location = '../views/register.php';
                        });
                      }, 100);
                    </script>";
		          }else{
			          $ins = mysqli_query($conn, "INSERT INTO `users` (fullname, email, password, type, verification_code, verified_date) VALUES ('$reg_fullname','$reg_email','$encrypted_password', 0 ,'$verification_code', NULL )");
			        if ($ins) {
				        header("Location: ./email-ui.php?email=" . $reg_email);
            

			  }
	  	}
            // insert in users table
            // $sql = "INSERT INTO users(fullname, email, password, type, verification_code, verified_date) VALUES ('" . $reg_fullname . "','" . $reg_email . "','" . $encrypted_password . "', 0 ,'" . $verification_code . "', NULL )";
            // mysqli_query($conn, $sql);
 
            //  header("Location: ./email-verification.php?email=" . $reg_email);
            // exit();
          }
          else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
             <script> 
               setTimeout(function() {
                 Swal.fire({
                   title: 'Error',
                   icon: 'error',
                   text: 'Password must be matched',
                   showConfirmButton: true,
                   timer: 1500
                 }).then(function() {
                   window.location = '../views/register.php';
                 });
               }, 100);
             </script>";
          }
        }
       } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Register Form</title>
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
   <!-- SweetAlert JS -->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <img src="../assets/img/Kursonada.png" alt="">
          </span>
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="../views/register.php" active>Register</a></li>
          <li><a class="nav-link scrollto" href="../views/loginform.php" >Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
      <div class="faq section-bg">
        
          <!-- Sign up form -->
          <section class="signup">
              <div class="container-sign">
                  <div class="signup-content">
                      <div class="signup-form">
                          <h2 class="form-title">Register</h2>
                          <form method="POST" class="register-form" id="register-form">
                              <div class="form-group">
                                  <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                  <input type="text" name="fullname" id="name" placeholder="Full Name" required/>                       
                              </div>
                              <div class="form-group">
                                  <label for="email"><i class="zmdi zmdi-email"></i></label>
                                  <input type="email" name="email" id="email" placeholder="Your Email" required/>
                              </div>
                              <div class="form-group">
                                  <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                  <input type="password" name="password" id="pass" placeholder="Password" required/>
                              </div>
                              <div class="form-group">
                                  <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                  <input type="password" name="password2" id="re_pass" placeholder="Repeat your password" required/>
                              </div>
                              <div class="form-group">
                                  <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                  <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                </div>
                                <a href="../views/loginform.php" class="signup-image-link term-service">I am already member</a>

                              <div class="form-group form-button">
                                  <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                              </div>
                          </form>
                      </div>
                      <div class="signup-image">
                          <figure><img src="../assets/img/signup1.svg" class="sign-img" alt="sing up image"></figure>
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
  <!--SweetAlert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>