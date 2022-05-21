<?php
    session_start();
    require('./include/connection.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user_id = $_SESSION['id_user'];
    $user_information = "select * from account where account_id = '{$user_id}'";
    
    $query = mysqli_query($conn, $user_information);
    $detail = mysqli_fetch_assoc($query);

    //update
    if (isset($_POST['submit-profile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fb_link = $_POST['fb_link'];
        $address = $_POST['address'];
        //change password variables
        
        if(!empty($_POST['old_password'])){
            $old_password=$_POST['old_password'];

        }
        if(!empty($_POST['new_password'])){
            $new_password=$_POST['new_password'];

        }
        if(!empty($_POST['con_password'])){
            $con_password=$_POST['con_password'];

        }
        
    
        if (empty($_FILES["image"]["name"])) {
            $target_file = $detail['img'];
        }else if(isset($_FILES["image"])){
            $target_file = $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], "./images/avata/" . $target_file);
        }
        
        if(empty($old_password)){
            $password_update = $detail["password"];
        }
        // change password
        if(($detail["password"]==md5($old_password))and ($new_password == $con_password)){
            
                $password_update = md5($new_password);
            
        }else{
            $password_update = $detail["password"];
        }
    
    
        $sql = "UPDATE `account` SET name='{$name}', email='{$email}', phone='{$phone}', link='{$fb_link}', address='{$address}', img = '{$target_file}', password = '{$password_update}' WHERE account_id='{$user_id}'";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('cập nhật thông tin thành công')</script>";
        } else {
            echo "<script>alert('cập nhật thông tin thất bại')</script>" . $conn->error;
        }

        
        
        // if($data_pwd==$old_password){
        // if($new_password==$con_password){
        // $update_pwd=mysql_query("update users set password='$new_password' where id='1'");
        // $change_pwd_error="Update Sucessfully !!!";
        // }
        // else{
        // $change_pwd_error="Your new and Retype Password is not match !!!";
        // }
        // }
        // else
        // {
        // $change_pwd_error="Your old password is wrong !!!";
        // }


        $conn->close();
    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="stylemain.css">
    <!-- Responsive stylesheet -->

    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Title -->
    <title>IT rabbit
    </title>
    <!-- Favicon -->

    <!-- <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .avata_img{
                max-width: 50px;
            }
    </style>
</head>
<body>
<div class="header-login" id="fixed-top-menu" style="box-shadow:none !important; height:80px !important; ">
    <div class="logo-header1">
                <a href="homepage.php"><img src="./assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
    font-size: 34px;
    color: rgb(27, 46, 32);">Rabbit Job</span></a>
            </div>
            
        <div class="item-menu">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <span class="guess_name"><img class="avata_img" src="./images/avata/<?php echo $detail["img"];?>" alt=""> <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?> </span>
            <a href="logout.php" id="logoutss"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
            
        
        
    </div>
    <form method="POST" class="form" enctype="multipart/form-data" style="margin-top: 80px;">
    <p style="line-height: 80px; text-align: center;
    font-size: 34px;
    color: rgb(27, 46, 32);">Thông tin cá nhân</p></a>
<div class="col-sm-12 col-lg-8 col-xl-9">

<div class="my_profile_form_area employer_profile">

    <div class="row">

        <div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="formGroupExampleInput1">Họ và tên
    </label>
    <input type="text" class="form-control" name="name" value="<?php echo $detail["name"];?>" id="formGroupExampleInput1" placeholder="">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="exampleFormControlInput1">Địa chỉ email
    </label>
    <input type="email" name="email" value="<?php echo $detail["email"];?>" class="form-control" id="exampleFormControlInput1" placeholder="">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="exampleInputPhone">Số điện thoại
    </label>
    <input type="text" name="phone" value="<?php echo $detail["phone"];?>" class="form-control" id="exampleInputPhone" aria-describedby="phoneNumber" placeholder="">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="exampleFormControlInput2">Ảnh đại diện
    </label>
    <input type="file" name="image" class="form-control" id="exampleFormControlInput2">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="formGroupExampleInput2">Địa chỉ nhà</label>
    <input type="text" name="address" value="<?php echo $detail["address"];?>" class="form-control datepicker" id="formGroupExampleInput2">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="validationServerUsername">Link Facebook
    </label>
    <input type="text" value="<?php echo $detail["link"];?>" name="fb_link"  class="form-control" id="formGroupExampleInput1">
</div>
</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="validationServerUsername2">Mật khẩu cũ
    </label>
    <input type="password" name="old_password" autocomplete="off" class="form-control" id="formGroupExampleInput1">
</div>
</div>
<div class="col-md-6 col-lg-6">

</div>

<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="validationServerUsername2">Mật khẩu mới
    </label>
    <input type="password" name="new_password" autocomplete="off"  class="form-control" id="formGroupExampleInput1">
    
</div>
</div>
<div class="col-md-6 col-lg-6">

<div class="my_profile_input form-group">
    <label for="validationServerUsername2">Xác nhận mật khẩu
    </label>
    <input type="password" name="con_password" autocomplete="off" class="form-control" id="formGroupExampleInput1">
</div>
</div>


<div class="col-lg-4">
<div class="my_profile_input">
<input type="submit" name="submit-profile" class="btn btn-lg btn-thm" value="Cập nhật">
</div>
</div>
        
    </div>
</div>
</div>
</form>
</body>
</html>