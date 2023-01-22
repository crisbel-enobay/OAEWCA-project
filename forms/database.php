<?php
//$url='localhost';
//$username='jckkniva_bscs3a';
//$password='1]{G3cKYyk78';
//$conn=new mysqli($url,$username,$password,'jckkniva_bscs3a');
//if($conn->connect_error){
//	die( "Connection failed!:".$conn->connect_error);
//}
?>

<?php
$url = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($url, $username, $password, 'project');
if ($conn->connect_error) {
    die("Connection failed!:" . $conn->connect_error);
}
?>