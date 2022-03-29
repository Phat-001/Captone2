<?php 
require('./include/connection.php');
    if (isset($_POST["submit-register"])) {
        $username = $_POST["username"];
        // $password = $_POST["password"];
        $password = stripslashes($_REQUEST['password']);
	    $password = mysqli_real_escape_string($conn,$password);
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $address = $_POST["address"];
        $full_name = $_POST["full_name"];
        $role = 2;
        // Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM account WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
// header('Location: index.php');
echo '<script>alert("Email or username already exists")</script>';
}else{
            $query = "INSERT INTO account(username,password,phone,email,address,role,name) VALUES('{$username}','".md5($password)."','{$phone_number}','{$email}', '{$address}','{$role}','{$full_name}')";
//             $query = "INSERT into `account` (username,password,phone,email,address,role,name)
// VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
            $conn->query($query);
          echo '<script>alert("Sign Up Success")</script>';
    }
}
/**
 * admin899
*/
?>