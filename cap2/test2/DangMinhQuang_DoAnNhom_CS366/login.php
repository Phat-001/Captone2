<?php
require_once("connect.php");

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$mk = $_POST["mk"];

	$sql = "SELECT * FROM member WHERE username='" . $username . "' AND mk=MD5('" . $mk . "');";
	$result = $conn->query($sql);

	if ($mk != $row['mk']) {
		echo "<h2 class='message'>Đăng Nhập Thành Công</h2>";
	$_SESSION['username'] = $username;
	
	header("Location: profile.php");
	
	} else {
		echo "<h2 class='error'>Đăng Nhập Thất Bại</h2>";
	}
	$conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>doannhom</title>
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="arealogin">
        <div class="menu">
          <ul>
              <div class="menu-right">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Đăng nhập<i class="fas fa-registered"></i></a></li>
                <li><a href="register.php">Đăng ký<i class="fas fa-sign-in-alt"></i></a></li>
              </div>
          </ul>
          
        </div>
        <div class="mobile">
          
          <!-- check kiểm tra overlay -->
          
          <input type="checkbox" name="" class="navss" id="nav-mobile-input">
          <!-- Vùng đen -->
          <label for="nav-mobile-input" class="nav__overlay"></label>
          <!-- icon menu -->
          
          <label for="nav-mobile-input" class="nav__bars-btn"><i class="fas fa-bars"></i></label>
          <div class="nav_mobile">
            <label for="nav-mobile-input" class="nav_bars-close"><i class="fas fa-times"></i></label>
            
            <ul class="nav_mobile-list">
              <li>
                <a href="#" class="nav_mobile_link">    Trang chủ</a>
              </li>
              <li>
                <a href="#" class="nav_mobile_link"><i class="fas fa-award"></i>       Giới thiệu</a>
              </li>
              <li>
                <a href="#" class="nav_mobile_link"><i class="fas fa-file-signature"></i>       Liên hệ</a>
              </li>
              <li>
                <a href="#" class="nav_mobile_link"><i class="fas fa-user-plus"></i>       Đăng nhập</a>
              </li>
              <li>
                <a href="register.php" class="nav_mobile_link"><i class="fas fa-sign-in-alt"></i>       Đăng ký</a>
              </li>
            </ul>
          </div>
        </div>
        <form action="" method="POST" >
            <div class="imgcontainer">
                <div class="avatar">
                  <i class="far fa-user-circle"></i>
                </div>
              </div>
            
              <div class="container">
                <label for="uname"><b style="color:#fff">Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
            
                <label for="psw"><b style="color:#fff">Password</b></label>
                <input type="password" placeholder="Enter Password" name="mk" required>
            
                <input class="btn" type="submit" name="login" value="Login">
                <label>
                  <input type="checkbox" checked="checked" name="remember"> <b style="color:#fff">Remember</b>
                </label>
                <label for="">
                  <a href="#" id="icon-fb"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" id="icon-gg"><i class="fab fa-google"></i></a>
                  <a href="register.php" id="signup-btn">Sign up</a>
                </label>
              </div>
            
              <div class="container" style="background-color:#5553538c">
                <button type="button" class="cancelbtn">Cancel</button>
                <a href="#" style="text-decoration: none; color:#fff;float: right;padding-top: 16px;">forgot password?</a>
              </div>
        </form>
    </div>

	
</body>
</html>
