<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>thêm user</title>
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
if (isset($_POST['submit_account'])){
    $username=$_POST['username'];
    $password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $role=$_POST['role'];

    $sql = "insert into account (username,password,name,phone,address,role,email) values('{$username}','".md5($password)."','{$name}','{$phone}','{$address}','{$role}','{$email}')";

    $conn->query($sql);
    header('location:index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../stylemain.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thêm account</title>
    <style>
        h2{
            text-align: center;
        }
        .text-input{
            width: 360px;
            color: rgb(97, 93, 93);
            padding: 7px 12px;
            height: 40px;
            border: solid 1px rgba(0, 0, 0, 0.4);
            background-color: #fff;
        }
        #btn-cap2{
            padding: 7px 35px;
            cursor: pointer;
            background: #79b530;
            border: none;
        }
    </style>
</head>
<body>
        <form method="POST" class="form">
        <h2>Thêm user</h2>

        <table class="table table-bordered">
            <tr>
                <th><label for="">Tên tài khoản:</label></th>
                <td><input type="text" value="" name="username" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">mật khẩu:</label></th>
                <td><input type="password" value="" name="password" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">Họ tên:</label></th>
                <td><input type="text" value="" name="name" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">email:</label></th>
                <td><input type="text" value="" name="email" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">số điện thoại:</label></th>
                <td><input type="number" value="" name="phone" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">Địa chỉ:</label></th>
                <td><input type="text" value="" name="address" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">Vai trò:</label></th>
                <td>
                    <select name="role" id="role">
                        <option value="2">Company</option>
                        <option value="3">Ứng viên</option>
                        <option value="4">Supporter</option>
                        <option value="5">Quản lí blog</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="thêm" name="submit_account" id="btn-cap2"></td>
            </tr>
        </table>
        
        </form>
</body>
</html>
</body>
</html>