<?php 	

date_default_timezone_set('Asia/Bangkok');

$localhost = "chbwapp001";
$username = "root";
$password = "Maxim123";
$dbname = "store";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>