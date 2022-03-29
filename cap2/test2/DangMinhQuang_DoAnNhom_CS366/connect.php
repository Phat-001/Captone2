<?php 

session_start();

//ini_set('display_errors', 1);

$server = "localhost";
$username = "admin";
$password = "123456";
$db_name = "doannhom";

$conn = new mysqli($server, $username, $password, $db_name);

if ($conn->connect_error) {
	die ("<h5 class='error'>Kết Nối Không Thành Công.</h5><br />" . $conn->connect_error);
}

//echo "<h5 class='message'>Kết Nối Thành Công.</h5>";

echo "<br />";