
<?php
require_once("connection.php");
if (isset($_POST["submit"])) {

	$tensach = $_POST["tensach"];
	$tacgia = $_POST["tacgia"];
	$soluong = $_POST["soluong"];
	$dongia = $_POST["dongia"];
	$ngay_phat_hanh = $_POST["ngay_phat_hanh"];

	if ($tensach == "" || $tacgia == "" || $soluong == "" || $dongia == ""  || $ngay_phat_hanh  == "")
		echo "<br/><i style='color:red; font-weight: bold; margin-left:110pt'>Vui lòng điền thông tin trước khi thực hiện</i>";
	else {
		$query = "INSERT INTO thongtinsach(tensach,tentacgia,soluong,dongia,ngayphathanh) VALUES('{$tensach}','{$tacgia}','{$soluong}','{$dongia}', '{$ngay_phat_hanh}')";
		$connection->query($query);
	  echo '<script>alert("thêm thành công")</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí sách</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container" >
            <h1>NHẬP THÔNG TIN SÁCH</h1>
            <p>tên sách:</p>
            <input type="text" name="tensach" required>

            <p>tên tác giả:</p>
            <input type="text" name="tacgia" required>

            <p>số lượng:</p>
            <input type="text" name="soluong" required>

            <p>đơn giá:</p>
            <input type="text" name="dongia" required>

            <p>ngày phát hành:</p>
            <input class='' type="date" name="ngay_phat_hanh" required>

            <input type="submit" class="btn" value="Thêm vào CSDL" name="submit">
            <button class="thoat"> thoát</button>
        </div>
    </form>
    <a href="view.php">Danh sách của sách</a>
</body>
</html>