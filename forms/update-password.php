<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'] && $_POST["reset-password"])
{
$conn = mysqli_connect('localhost', "root", "", "project");
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$new_password = $_POST['password'];
$query = mysqli_query($conn,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_fetch_assoc($query);
if($row){
  $old_password = $row["password"];
  if (password_verify($new_password, $old_password)) {
    $password_reset_status = "<p>Error: New password should not be the same as the old password.</p>";
  } else {
    $password = password_hash($new_password, PASSWORD_DEFAULT);
    mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,expiry_reset_link_token='" . NULL . "' WHERE email='" . $emailId . "'");
    $password_reset_status = "<p>Congratulations! Your password has been updated successfully.</p>";
  }
}else{
     $password_reset_status = "<p>Error: Invalid email or reset link token.</p>";
}
}
?>
