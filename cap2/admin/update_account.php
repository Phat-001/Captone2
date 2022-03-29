<!DOCTYPE html>
<html>
<head>
<title>cập nhật user</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
require('../include/connection.php');
$user_id=$_GET['user_id'];
$query=mysqli_query($conn,"select * from account where account_id='$user_id'");
$row=mysqli_fetch_assoc($query);
?>
<form method="POST" class="form">
<h2>Sửa thông tin user</h2>

<label>Họ và tên: <input type="text" value="<?php echo $row['name']; ?>" name="name"></label><br/>
<label>email:</label> <input type="text" value="<?php echo $row['email']; ?>" name="email"><br/>
<label>phone:</label> <input type="number" value="<?php echo $row['phone']; ?>" name="phone"><br/>
<label>address: <input type="text" value="<?php echo $row['address']; ?>" name="address"></label><br/>
<label>vai trò:</label>
<select name="role" id="role">
    <option value="<?php echo $row['role']; ?>">
    <?php
        switch ($row['role']) {
            case '2':
                echo "Human Resource";
                break;
                case '3':
                  echo "Ứng viên";
                  break;
                  case '4':
                    echo "supporter";
                    break;
                    case '5':
                      echo "người đăng bài";
                      break;
            default:
                # code...
                break;
        }
    ?>
</option>
    <option value="2">Human Resource</option>
    <option value="3">Ứng viên</option>
    <option value="4">supporter</option>
    <option value="5">người đăng bài</option>
</select>  
<input type="submit" value="Update" name="submit_update_account">
<?php

if (isset($_POST['submit_update_account'])){
$id=$_GET['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$role=$_POST['role'];




// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `account` SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}', role='{$role}' WHERE account_id='{$id}'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('cập nhật thành công')</script>";
    header('location:index.php');
} else {
    echo "<script>alert('cập nhật thất bại')</script>" . $conn->error;
}

$conn->close();
}
?>

</form>
</body>
</html>