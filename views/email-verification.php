<?php
 
    if (isset($_POST["verify_email"]))
    {
        $log_email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect('localhost', "root", "", "project");
 
        // mark email as verified
        $sql = "UPDATE users SET verified_date = NOW() WHERE email = '" . $log_email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
           function verifyFailed(){
            $verify_failed = "verification failed";
            return $verify_failed;
           }

        }
        else {
        echo "<p>You can login now.</p>";
        exit();
    }
    }
 
?>

<form method="POST">
     <input type="hidden" name="email" value="<?php // echo $_GET['email']; ?>" required/> 
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
 
    <input type="submit" name="verify_email" value="Verify Email">
    <?php if (isset($_POST["verify_email"])){
        echo verifyFailed();
    }  ?>
</form>