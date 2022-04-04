<?php
session_start();
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
    $level=$_POST['level'];
    $desciption=$_POST['desciption'];
    $job_type=$_POST['job_type'];
    $job_title=$_POST['job_title'];

    $sql = "insert into job_information (job_date,address,salary,desciption,job_type,job_title,account_id,level) values('{$job_date}','{$address}','{$salary}','{$desciption}','{$job_type}','{$job_title}','{$_SESSION['id_user']}','{$level}')";

    $conn->query($sql);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm công việc</title>
    <style>
        h2{
            text-align: center;
            background-color: #79b530;
        }
    </style>
</head>
<body>
<form method="POST" class="form">
        <h2>Thêm việc làm</h2>

        <table class="table table-striped">
            <tr>
                <th><label for="">Tiêu đề:</label></th>
                <td><input type="text" value="" name="job_title" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Ngày:</label></th>
                <td><input type="datetime-local" value="" name="job_date" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Địa chỉ:</label></th>
                <td><input type="text" value="" name="address" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Lương:</label></th>
                <td><input type="number" value="" name="salary" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Mô tả công việc:</label></th>
                <td><textarea class="form-control" rows="5" name="desciption" id="comment" required></textarea></td>
                
            </tr>
            <tr>
                <th><label for="">Cấp độ:</label></th>
                <td>
                    <select name="level" id="level">
                        <option value="Intern">Intern</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Lead">Lead</option>
                        <option value="Manager">Manager</option>
                        <option value="Senior Leader">Senior Leader</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="">Loại công việc:</label></th>
                <td>
                    <select name="job_type" id="job_type">
                        <option value="Full time">Full time</option>
                        <option value="Part time">Part time</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="thêm" class="btn btn-success" name="submit_job"></td>
            </tr>
        </table>
        
        </form>
</body>
</html>

</body>
</html>