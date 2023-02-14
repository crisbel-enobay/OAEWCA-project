<?php
     if(session_status() !== PHP_SESSION_ACTIVE) 
     {
      session_start();
     }
     if ($_SESSION['type'] != 'student'){
      //   include "../file/session.php";
          echo "<script> window.location = '../views/loginform.php' </script>";
     }

?>