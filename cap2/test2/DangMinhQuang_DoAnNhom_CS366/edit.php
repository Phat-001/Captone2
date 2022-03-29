<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        require_once('connect.php') ;
        $manv=$_GET['manv'];
        $query=mysqli_query($conn,"SELECT * from nhanvien where manv='$manv'");
        $row=mysqli_fetch_assoc($query);
    ?>
	<div style="margin-left:80%; margin-right:auto; width:auto; color:white">
	<a href="nhanvien.php">nhân viên</a>     |     	<a href="logout.php">logout</a>
	</div>
	<table class="profile" width="100%">
		<form  method="POST">
			<tr>
				<td class="header">Họ và tên</td>
				<td>
					<input name="hoten" class="form-control" type="text" value="<?php echo $row['hoten'] ?>">
					
				</td>
			</tr>

            <tr>
				<td class="header">Giới tính</td>
				<td>
					<input name="gioitinh" class="form-control" type="text" value="<?php echo $row['gioitinh'] ?>">
					
				</td>
			</tr>

			<tr>
				<td class="header">Email</td>
				<td>
					<input name="email" class="form-control" type="text" value="<?php echo $row['email'] ?>">
					
				</td>
			</tr>

			<tr>
				<td class="header">Số điện thoại</td>
				<td>
					<input name="sdt" class="form-control" type="text" value="<?php echo $row['sdt'] ?>">
					
				</td>
			</tr>

            <tr>
				<td class="header">Giờ làm việc / ngày</td>
				<td>
					<input name="giolammotngay" class="form-control" type="text" value="<?php echo $row['giolammotngay'] ?>">
					
				</td>
			</tr>

            <tr>
				<td class="header">Lương</td>
				<td>
					<input name="luong" class="form-control" type="text" value="<?php echo $row['luong'] ?>">
					
				</td>
            </tr>

            <tr>
				<td colspan="2" class="form-group">
					<input type="submit" name="upnhanvien" class="btn btn-primary btn-block" value="UPDATE">                                
				</td>
			</tr>
            <tr>
                <td>
                
                </td>
            </tr>       

            <?php
                if (isset($_POST['upnhanvien'])){
                    $manv=$_GET['manv'];
                    $hoten=$_POST['hoten'];
                    $gioitinh=$_POST['gioitinh'];
                    $email=$_POST['email'];
                    $sdt=$_POST['sdt'];
                    $giolammotngay=$_POST['giolammotngay'];
                    $luong=$_POST['luong'];

                    $sql= "UPDATE nhanvien set hoten='{$hoten}', gioitinh='{$gioitinh}', email='{$email}', sdt='{$sdt}', giolammotngay='{$giolammotngay}', luong='{$luong}'where manv='{$manv}' ; ";
                    echo $sql . "<br />";
                    if ($conn->query($sql) === TRUE) {
                        echo "Cập nhật thành công.";
                        header("location: nhanvien.php");
                    } else {
                        echo "Cập nhật thất bại.";
                    }
                }
            ?>
		</form>
        
	</table>
    <button class="cancel"><a href="nhanvien.php">Cancel</a></button>
    
</body>
</html>




