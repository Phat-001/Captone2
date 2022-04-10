<?php
require('../include/connection.php');
if(isset($_REQUEST['ida']) and $_REQUEST['ida']!=""){
$sql = "DELETE FROM job_information WHERE job_id='{$_GET['ida']}'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header('location:index.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>