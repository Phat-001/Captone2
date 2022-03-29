<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>thêm việc làm</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
require('../include/connection.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit_job'])){
    $job_date=$_POST['job_date'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $desciption=$_POST['desciption'];
    $job_type=$_POST['job_type'];
    $job_title=$_POST['job_title'];

    $sql = "insert into job_information (job_date,address,salary,desciption,job_type,job_title,account_id) values('{$job_date}','{$address}','{$salary}','{$desciption}','{$job_type}','{$job_title}','{$_SESSION['id_user']}')";

    $conn->query($sql);
    header('location:index.php');
}


?>
<form method="POST" class="form">
<h2>thêm việc làm</h2>

<label>tiêu đề: <input type="text" value="" name="job_title" required></label><br/>
<label>ngày: <input type="datetime-local" name="job_date" required><br/>
<label>địa chỉ:</label> <input type="text" value="" name="address" required><br/>
<label>lương: <input type="text" value="" name="salary" required></label><br/>
<label>mô tả công việc: <input type="text" value="" name="desciption" required></label><br/>
<label>loại công việc: <input type="text" value="" name="job_type" required></label><br/>
<input type="submit" value="thêm" name="submit_job">


</form>
</body>
</html>