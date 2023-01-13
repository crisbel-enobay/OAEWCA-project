<?php
     session_start();
     if ($_SESSION['type'] != 'student'){
        include "../file/session.php";
        //  echo "<script> window.location = '../index.php' </script>";
     }

?>