<?php
if (isset($_POST['login'])){
    $username = $_POST['email'];
  $plaintext_password = $_POST['password'];
  $conn = new mysqli('localhost', "root", "", "project");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from users where email = '".$username."'";
  $find = $conn->query($sql) or die ("Error");
  $check = mysqli_fetch_assoc($find);
  if ($check == ""){
    Echo "<a>Invalid Email</a>";
  } else if ($check['username'] == $username){
    //$hash = $check['password'];
    //temporary
    $hashed = password_hash($check['password'], PASSWORD_DEFAULT);
    
    $verify = password_verify($plaintext_password, $hashed);
    if ($verify) {
      $_SESSION['valid'] = true;
      $_SESSION['name'] = $check['firstname']." ".$check['lastname'];
      $_SESSION['user'] = $check['username'];
      if ($check['type'] == '1'){
        $_SESSION['type'] = 'admin';
        echo "<script> window.location = './views/admin.php' </script>";}
      else if ($check['type'] == '0'){
        $_SESSION['type'] = 'student';
        echo "<script> window.location = './views/admin.php' </script>";}
    }
    else { echo "<a>Incorrect Password</a>";}
    $_SESSION['valid'] = false;
  }
  $conn->close();
}
?>