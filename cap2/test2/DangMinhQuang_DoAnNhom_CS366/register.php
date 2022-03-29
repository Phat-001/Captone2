<?php
require_once("connect.php");

if (isset($_POST["register"])) {

	$username = $_POST["username"];
	$mk = $_POST["mk"];
	$email = $_POST["email"];
	$fullname = $_POST["fullname"];
	$birthday = $_POST["birthday"];
	$gender = $_POST["gender"];

	$check_sql = "SELECT * FROM member WHERE username='" . $username . "' AND email='" . $email . "';";
	$check_result = $conn->query($check_sql);
	
	if (!$username || !$mk || !$email || !$fullname || !$birthday || !$gender) {
        	echo "<h2 class='message'>Vui lòng nhập đầy đủ thông tin! <a href='javascript: history.go(-1)'>Tr? l?i</a>";
        	die();
   	 }

	if ($check_result->num_rows > 0) {
		echo "Username da ton tai";

	} else {

		$insert_sql = "INSERT INTO member (username, mk, email, fullname, birthday, gender) VALUES ('".$username."', MD5('".$mk."'), '".$email."', '".$fullname."', '".$birthday."', '".$gender."');";
		if ($conn->query($insert_sql) === TRUE) {
			echo "<h2 class='message'>Đăng Ký Thành Công.</h2>";
			$_SESSION['username'] = $username;
			header("Location: login.php");
			
		} else {
			echo "<h2 class='error'>Đăng Ký Thất Bại.</h2>";
		}
	}
	$conn->close();	
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

		<div class="menu">
          	<ul>
              <div class="menu-right">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="login.php">Đăng nhập<i class="fas fa-registered"></i></a></li>
                <li><a href="register.php">Đăng ký<i class="fas fa-sign-in-alt"></i></a></li>
              </div>
          	</ul>
          
        </div>

    <div class="container">

        <form id="signup" action="" method="POST">
    
            <div class="header">
            
                <h3>Đăng Ký</h3>
                     
            </div>
            
            <div class="sep"></div>
    
            <div class="inputs">    
                <input type="text" id="tendangky" name="username" placeholder="ten dang ky" title="nhap ten dang ky" >

                <input type="password" class="lock" name="mk" placeholder="Mat khau" id="password" >

                <input type="email" id="email" name="email" placeholder="mail@example.com" title=" nhap email" >

                <input id="hoten" name="fullname" type="text" placeholder="ho ten">

                <input type="date" name="birthday" id="birthday" placeholder="Birthday">

                <div class="checkboxy">
						<table width="70%" style="margin-left: 90px;">
							<tbody>
								<tr>
									<td>
										<input type="radio" id="Male" name="gender" value="Male" checked>
										<label for="Male" style="color: rgb(19, 20, 20);">Male</label>
									</td>
									<td>
										<input type="radio" id="Female" name="gender" value="Female">
										<label for="Female" style="color: rgb(18, 18, 19);">Female</label>
									</td>
								</tr>
							</tbody>
						</table>
				</div>	
                
				<input  id="submit" type="submit" name="register" value="đăng ký">
            
            </div>
    
        </form>
    
    </div>
</body>
</html>