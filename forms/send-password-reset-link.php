<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

if (isset($_POST["submit_email"]))
    {
      //  $link = "<a href='www.yourwebsite.com/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
             $conn = mysqli_connect('localhost', "root", "", "project");
            $email = $_POST['email'];
            $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $email . "'");
           $row= mysqli_fetch_array($result);
           if($row){
            $token = md5($emailId).rand(10,9999);

            $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
            );

            $expDate = date("Y-m-d H:i:s",$expFormat);

            $update = mysqli_query($conn,"UPDATE users set reset_link_token='" . $token . "' ,expiry_reset_link_token='" . $expDate . "' WHERE email='" . $email . "'");
           
            //naka fixed pa tong $link location sa local file ko di pa kasi online website natin
            $link = "<a href='localhost/github/OAEWCA-project/views/reset-password.php?key=".$email."&token=".$token."'>Click To Reset password</a>";
            
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
           $mail->setFrom('lebbraumjayce3@gmail.com', 'OAEWCA');

           //Add a recipient
           $mail->addAddress($email);

           //Set email format to HTML
           $mail->isHTML(true);

           $mail->Subject = 'Password Reset';
           $mail->Body    = '<p>Click here to reset you password: <b style="font-size: 30px;"></b>'.$link.'</p>';

           if ($mail->send()){
            $submit_email_status = "an email link has been sent your gmail";
           }
           else {
            $submit_email_status = "email link send failed";
           }
           // echo 'Message has been sent';

           // connect with database
  //          $conn = mysqli_connect('localhost', "root", "", "project");

  //          // check email
  //          $select = mysqli_query($conn, "SELECT email FROM users WHERE email= '$email'");
  //          if (mysqli_num_rows($select) > 0) {
  //             $submit_email_status = "send success";
  //          }else{
  //           $submit_email_status = "send failed";
  //  }
           }
           else {
            $submit_email_status = "invalid email address";
           }
      }
        catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
?>