<?php
     session_start();
     if ($_SESSION['type'] != 'admin'){
        //  echo "<script> window.location = '../index.php' </script>";
        include "../file/session.php";
     }
     else{
        // include "file/session.php";
     }

?>