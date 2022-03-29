<?php
require('../include/connection.php');
if(isset($_REQUEST['user_id']) and $_REQUEST['user_id']!=""){
$id=$_GET['user_id'];
$sql = "DELETE FROM account WHERE account_id='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header('location:index.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>