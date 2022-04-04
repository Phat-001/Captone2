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
        $role = 3;
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
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="stylemain.css">
    
    <!-- Responsive stylesheet -->

    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Title -->
    <title>IT Rabbit
    </title>
    <!-- Favicon -->

    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />

    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js">
</script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
</script><![endif]-->
</head>

<body>

    <div class="wrapper">

        <div class="preloader">
        </div>
        <!-- Main Header Nav -->
        
        
        <div class="header-login">
            <div class="logo-header1">
                <a href="index.php"><img src="./assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
    font-size: 34px;
    color: rgb(27, 46, 32);">Rabbit Job</span></a>
            </div>
        </div>
        <!-- Modal -->

        <div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;
                            </span></button>
                    </div>
                    <!-- <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a></li>
                    </ul> -->

                    
                </div>
            </div>
        </div>
        <!-- Main Header Nav For Mobile -->

        <div id="page" class="stylehome1 h0">

            <div class="mobile-menu">

                
            </div>
            <!-- /.mobile-menu -->
            
        </div>
        <!-- Inner Page Breadcrumb -->
       
        <!-- Our LogIn Register -->
        <section class="our-log-reg bgc-fa">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 col-lg-6">
                            <div class="sign_up_form">

                            <div class="heading">
                                <h3 class="text-center">Tạo tài khoản</h3>

                                
                            </div>
                            

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="Tài khoản" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Mật khẩu" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="full_name" class="form-control" id="exampleInputEmail2" placeholder="Họ và tên" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="phone" class="form-control" name="phone_number" id="exampleInputPhone1" placeholder="Số điện thoại" required>
                                        </div>

                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" required>
                                        </div>
                                        
                                        

                                       <button type="submit" name="submit-register" class="btn btn-log btn-block btn-dark">Đăng Ký</button>
                                        <hr>

                                       
                                    </form>
                                </div>

                                
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-sm-12 col-lg-6">
                        
                        <img src="./assets/images/rabbit/login.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Footer -->
        
    </div>
    <!-- Wrapper End -->
    <script type="text/javascript" src="./assets/js/jquery-3.3.1.js">
    </script>
    <script type="text/javascript" src="./assets/js/jquery-migrate-3.0.0.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/popper.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/jquery.mmenu.all.js">
    </script>
    <script type="text/javascript" src="./assets/js/ace-responsive-menu.js">
    </script>
    <script type="text/javascript" src="./assets/js/bootstrap-select.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/snackbar.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/simplebar.js">
    </script>
    <script type="text/javascript" src="./assets/js/parallax.js">
    </script>
    <script type="text/javascript" src="./assets/js/scrollto.js">
    </script>
    <script type="text/javascript" src="./assets/js/jquery-scrolltofixed-min.js">
    </script>
    <script type="text/javascript" src="./assets/js/jquery.counterup.js">
    </script>
    <script type="text/javascript" src="./assets/js/wow.min.js">
    </script>
    <script type="text/javascript" src="./assets/js/progressbar.js">
    </script>
    <script type="text/javascript" src="./assets/js/slider.js">
    </script>
    <script type="text/javascript" src="./assets/js/timepicker.js">
    </script>
    <script type="text/javascript" src="./assets/js/wow.min.js">
    </script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="./assets/js/script.js">
    </script>


        
</body>

</html>