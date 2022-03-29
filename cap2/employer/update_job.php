<!DOCTYPE html>
<html>
<head>
<title>cập nhật việc làm</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
require('../include/connection.php');
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from job_information where job_id='$id'");
$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
<h2>Sửa việc làm</h2>

<label>tiêu đề: <input type="text" value="<?php echo $row['job_title']; ?>" name="job_title"></label><br/>
<label>ngày: <span><?php echo $row['job_date']; ?></span></label> <input type="datetime-local" name="job_date"><br/>
<label>địa chỉ:</label> <input type="text" value="<?php echo $row['address']; ?>" name="address"><br/>
<label>lương: <input type="text" value="<?php echo $row['salary']; ?>" name="salary"></label><br/>
<label>mô tả công việc: <input type="text" value="<?php echo $row['desciption']; ?>" name="desciption"></label><br/>
<label>loại công việc: <input type="text" value="<?php echo $row['job_type']; ?>" name="job_type"></label><br/>
<input type="submit" value="Update" name="submit_update_job">
<?php

if (isset($_POST['submit_update_job'])){
$id=$_GET['id'];
$job_date=$_POST['job_date'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$desciption=$_POST['desciption'];
$job_type=$_POST['job_type'];
$job_title=$_POST['job_title'];



// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `job_information` SET job_title='{$job_title}', job_type='{$job_type}', desciption='{$desciption}', salary='{$salary}', address='{$address}', job_date='{$job_date}' WHERE job_id='{$id}'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('cập nhật việc làm thành công')</script>";
    header('location:index.php');
} else {
    echo "<script>alert('cập nhật việc làm thất bại')</script>" . $conn->error;
}

$conn->close();
}
?>

</form>
</body>
</html>