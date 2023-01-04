<?php
     session_start();
     if ($_SESSION['valid'] != true){
         echo "<script> window.location = '../index.php' </script>";
     }
?>