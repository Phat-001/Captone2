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
    $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $role=$_POST['role'];

    $sql = "insert into account (username,password,name,phone,address,role,email) values('{$username}','{$password}','{$name}','{$phone}','{$address}','{$role}','{$email}')";

    $conn->query($sql);
    header('location:index.php');
}


?>
<form method="POST" class="form">
<h2>Thêm user</h2>

<label>Username: <input type="text" value="" name="username" required></label><br/>
<label>password: <input type="password" name="password" required><br/>
<label>Họ tên:</label> <input type="text" value="" name="name" required><br/>
<label>email:</label> <input type="text" value="" name="email" required><br/>
<label>số điện thoại: <input type="number" value="" name="phone" required></label><br/>
<label>địa chỉ: <input type="text" value="" name="address" required></label><br/>
<label>vai trò:</label>
<select name="role" id="role">
    <option value="2">Company</option>
    <option value="3">Ứng viên</option>
    <option value="4">Supporter</option>
    <option value="5">Quản lí blog</option>
</select>
<input type="submit" value="thêm" name="submit_account">


</form>
</body>
</html>