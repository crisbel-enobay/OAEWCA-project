<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'] && $_POST["reset-password"])
{
$conn = mysqli_connect('localhost', "root", "", "project");
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query = mysqli_query($conn,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,expiry_reset_link_token='" . NULL . "' WHERE email='" . $emailId . "'");
    $password_reset_status = "<p>Congratulations! Your password has been updated successfully.</p>";
}else{
     $password_reset_status = "<p>Congratulations! Your password has been updated successfully.</p>";
}
}
?>