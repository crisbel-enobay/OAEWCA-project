<?php
   if(session_status() !== PHP_SESSION_ACTIVE) 
   {
    session_start();
   }
    if (isset($_SESSION['valid'])){
    if ($_SESSION['valid'] == true){
        if ($_SESSION['type'] == 'admin'){
             echo "<script> window.location = './views/admin.php' </script>";
        }
        else if ($_SESSION['type'] == 'student'){
             echo "<script> window.location = './views/user-dashboard.php' </script>";
        }
    }
}

?>