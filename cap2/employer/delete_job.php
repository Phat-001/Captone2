<?php
require('../include/connection.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM job_information WHERE job_id='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header('location:index.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>