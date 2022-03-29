<?php 

require_once("connect.php");

if (isset($_SESSION['username'])) {
	$profile = null;
	$username = $_SESSION['username'];
	$select_sql = "SELECT * FROM member WHERE username='{$username}';";
	$result = $conn->query($select_sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$profile = array();
		$profile["username"] = $row["username"];
		$profile["email"] = $row["email"];
		$profile["fullname"] = $row["fullname"];
		$profile["birthday"] = $row["birthday"];
		$profile["gender"] = $row["gender"];
	} else {
		session_destroy();
		header("Location: login.php");
		header("Location: profile.php");
	}
} else {
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div style="margin-left:80%; margin-right:auto; width:auto; color:white">
	<a href="nhanvien.php">nhân viên</a>     |     	<a href="logout.php">logout</a>
	</div>
	<table class="profile" width="100%">
		<form action="update_profile.php" method="POST">
			<tr>
				<td class="header">Email</td>
				<td>
					<input name="email" class="form-control" type="email" value="<?php echo $profile['email'] ?>">
					
				</td>
			</tr>
			<tr>
				<td class="header">Fullname</td>
				<td>
					<input name="fullname" class="form-control" type="text" value="<?php echo $profile['fullname'] ?>">
				</td>
			</tr>
			<tr>
				<td class="header">Birthday</td>
				<td>
					<input name="birthday" class="form-control" type="date" value="<?php echo explode(' ', $profile['birthday'])[0] ?>">
				</td>
			</tr>
			<tr>
				<td class="header">Gender</td>
				<td>
					<table width="100%" style="padding: 10px 0">
						<tr>
							<td>
								<input type="radio" id="Male" name="gender" value="Male" <?php echo ($profile["gender"] == "Male" ? "checked='true'" : "") ?>>
								<label for="Male">Male</label>
							</td>
							<td>
								<input type="radio" id="Female" name="gender" value="Female" <?php echo ($profile["gender"] == "Female" ? "checked='true'" : "") ?>>
								<label for="Female">Female</label>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="form-group">
					<input type="submit" name="update_profile" class="btn btn-primary btn-block" value="UPDATE">
				</td>
			</tr>
		</form>
	</table>
	<button class="cancel"><a href="nhanvien.php">Vào trang nhân viên</a></button>
</body>
</html>