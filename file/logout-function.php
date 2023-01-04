<?php

if(isset($_GET['log']) && ($_GET['log']=='out')){
    //if the user logged out, delete any SESSION variables
session_start();
unset($_SESSION['valid']);
unset($_SESSION['type']);
session_destroy();
//then redirect to login page
header('location:../index.php');
}
?>