<?php
if(isset($_GET['log']) && ($_GET['log']=='out')){
    //if the user logged out, delete any SESSION variables
session_start();
unset($_SESSION['valid']);
unset($_SESSION['type']);
unset($_SESSION['fullname']);
session_unset();
//then redirect to login page
header('location:../index.php');
}
?>