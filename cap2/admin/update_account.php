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
    <title>Cập nhật user</title>
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
        <h2>Sửa thông tin user</h2>

        <table class="table table-bordered">
            <tr>
                <th><label for="">Họ tên:</label></th>
                <td><input type="text" value="<?php echo $row['name']; ?>" name="name" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">email:</label></th>
                <td><input type="text" value="<?php echo $row['email']; ?>" name="email" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">số điện thoại:</label></th>
                <td><input type="number" value="<?php echo $row['phone']; ?>" name="phone" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">Địa chỉ:</label></th>
                <td><input type="text" value="<?php echo $row['address']; ?>" name="address" class="text-input" required></td>
            </tr>
            <tr>
                <th><label for="">Vai trò:</label></th>
                <td>
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
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Cập nhật" name="submit_update_account" id="btn-cap2"></td>
            </tr>
        </table>
        
        </form>
</body>
</html>



<?php

if (isset($_POST['submit_update_account'])){
$id=$_GET['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$role=$_POST['role'];
$unique_id= rand(time(), 10000);




// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `account` SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}', role='{$role}', unique_id='{$unique_id}' WHERE account_id='{$id}'";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("cập nhật thành công")</script>';
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