<?php
    session_start();
    if ($_SESSION['valid'] == true){
        if ($_SESSION['type'] == 'admin'){
            echo "<script> window.location = './admin.php' </script>";
        }
        else if ($_SESSION['type'] == 'student'){
            echo "<script> window.location = './student.php' </script>";
        }
    }
?>