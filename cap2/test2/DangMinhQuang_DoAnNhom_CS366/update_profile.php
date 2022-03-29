<?php

require_once("connect.php");

$username = $_SESSION["username"];

if (isset($_POST["update_profile"])) {

	$email    = $_POST["email"];
	$fullname = $_POST["fullname"];
	$birthday = $_POST["birthday"];
	$gender   = $_POST["gender"];

	$sql = "UPDATE member SET email='{$email}', fullname='{$fullname}', birthday='{$birthday}', gender='{$gender}' WHERE username='{$username}';";
	echo $sql . "<br />";
	if ($conn->query($sql) === TRUE) {
		echo "Cập nhật thành công.";
	} else {
		echo "Cập nhật thất bại.";
	}
}

header("Location: profile.php");
?>