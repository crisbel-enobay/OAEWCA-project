<?php
if (isset($_POST['submit'])){
    $username = $_POST['your_name'];
  $plaintext_password = $_POST['your_pass'];
  $conn = new mysqli('localhost', "root", "", "project");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from users where username = '".$username."'";
  $find = $conn->query($sql) or die ("Error");
  $check = mysqli_fetch_assoc($find);
  if ($check == ""){
    Echo "<a>Invalid Email</a>";
  } else if ($check['username'] == $username){
    $hash = $check['password'];
    $verify = password_verify($plaintext_password, $hash);
    if ($verify) {
      $_SESSION['valid'] = true;
      $_SESSION['name'] = $check['firstname']." ".$check['lastname'];
      $_SESSION['user'] = $check['username'];
      if ($check['type'] == '1'){
        $_SESSION['type'] = 'admin';
        echo "<script> window.location = './admin.php' </script>";}
      else if ($check['type'] == '0'){
        $_SESSION['type'] = 'student';
        echo "<script> window.location = '' </script>";}
    }
    else { echo "<a>Incorrect Password</a>";}
  }
  $conn->close();
}
?>