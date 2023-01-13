<?php
    if(session_status() !== PHP_SESSION_ACTIVE) 
    {
     session_start();
    }
     if ($_SESSION['type'] != 'admin'){
        //  echo "<script> window.location = '../index.php' </script>";
        echo "<script> window.location = '../index.php' </script>";
     }
     else{
        // include "file/session.php";
     }

?>