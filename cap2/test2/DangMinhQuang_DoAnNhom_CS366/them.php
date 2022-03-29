<?php
   
    $username = "admin"; 
    $password = "123456";      
    $server   = "localhost";   
    $dbname   = "doannhom";      
    
    
    $connect = mysqli_connect($server, $username, $password, $dbname);
    
   
    if (!$connect) {
        die("Không kết nối :" . mysqli_connect_error());
        exit();
    }

    $manv = "";
    $hoten = "";
    $gioitinh = "";
    $email = "";
    $sdt = "";
    $giolammotngay = "";
    $luong = "";

    //Lấy giá trị POST từ form vừa submit
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["manv"])) { $manv = $_POST['manv']; }
        if(isset($_POST["hoten"])) { $hoten = $_POST['hoten']; }
        if(isset($_POST["gioitinh"])) { $gioitinh = $_POST['gioitinh']; }
        if(isset($_POST["email"])) { $email = $_POST['email']; }       
        if(isset($_POST["sdt"])) { $sdt = $_POST['sdt']; }
        if(isset($_POST["giolammotngay"])) { $giolammotngay = $_POST['giolammotngay']; }
        if(isset($_POST["luong"])) { $luong = $_POST['luong']; }

        //Code xử lý, insert dữ liệu vào table
        $sql = "INSERT INTO nhanvien (manv, hoten, gioitinh, email, sdt, giolammotngay, luong)
        VALUES ('$manv', '$hoten', '$gioitinh', '$email', '$sdt','$giolammotngay','$luong')";

        if (mysqli_query($connect, $sql)) {
            echo "Thêm dữ liệu thành công";
            header("Location: nhanvien.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
}

//Đóng database
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/themnv.css">
	<title>thêm nhân viên</title>
</head>
<body>
	<div class="menu">
        <ul>
            <div class="menu-right">
              <li><a href="">Trang chủ</a></li>
              <li><a href="nhanvien.php">Nhân viên<i class="fas fa-registered"></i></a></li>
              <li><a href="logout.php">Logout<i class="fas fa-sign-in-alt"></i></a></li>
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
              <a href="#" class="nav_mobile_link"><i class="fas fa-sign-in-alt"></i>       Đăng ký</a>
            </li>
          </ul>
        </div>
    </div>


	<form action="" method="POST">
        <div class="inpus">
			<input type="text" name="manv" placeholder="Nhập mã nhân viên" id="manv">	
            <input type="text" name="hoten" placeholder="Nhập họ và tên" id="hoten">
			<input type="text" name="gioitinh" placeholder="giới tính" id="gioitinh">
			<input type="text" name="email" placeholder="email" id="email">
			<input type="text" name="sdt" placeholder="số điện thoại" id="sdt">
			<input type="text" name="giolammotngay" placeholder="giờ làm trong 1 ngày" id="giolam">
			<input type="text" name="luong" placeholder="lương" id="luong">
			<button type="submit" name="REQUEST_METHOD" class="them">Thêm mới</button>			
        </div>
	</form>
</body>
</html>





