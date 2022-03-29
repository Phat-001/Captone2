<?php

session_start();

$server = "localhost";
$username = "root";
$password = "";
$db_name = "qlsach";

$connection = new mysqli($server, $username, $password, $db_name);

if ($connection->connect_error) {
	die("<h5 class='error'>Kết nối thành công.</h5><br />" . $conn->connect_error);
}

//http://lamp366.rf.gd/

//hosting
// $server = "sql109.epizy.com";
// $username = "epiz_30179641";
// $password = "yPZFlRZqGw3j4";
// $db_name = "epiz_30179641_qlsach";

// $connection = new mysqli($server, $username, $password, $db_name);

// if ($connection->connect_error) {
// 	die("<h5 class='error'>Kết nối thành công.</h5><br />" . $conn->connect_error);
// }

?>