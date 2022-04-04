<?php
    session_start();
    require('./include/connection.php');
    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }

    $job_list = "select job_type,job_title,salary,address,job_date from job_information";
    
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

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

    <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js">
</script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
</script><![endif]-->
</head>

<body>
    <div class="header-login" id="fixed-top-menu" style="box-shadow:none !important; height:80px !important; ">
    <div class="logo-header1">
                <a href="#wrapper"><img src="./assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
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
        <span class="guess_name">hi! <?php echo $_SESSION['name'];?> </span>
            <a href="logout.php" id="logoutss"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
        
        
    </div>
    <div class="wrapper" id="wrapper">

        <div class="preloader">
        </div>
        <!-- Main Header Nav -->

        
        <!-- Modal -->

        
        
        <!-- Home Design -->
        <section class="home-six parallax ulockd_bgi3" data-stellar-background-ratio="0.3">

            <div class="container">

                <div class="row home-content">

                    <div class="col-lg-8">

                        <div class="home-text">
                            <h2 class="fz40">Tìm kiếm công việc cho bạn</h2>

                            <p class="color-white">Welcome to our website. IT job</p>
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="home-job-search-box mt20 mb20">

                            <form class="form-inline">

                                <div class="search_option_one">

                                    <div class="form-group">
                                        <label for="exampleInputName">

                                        <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control h70" id="exampleInputName"
                                            placeholder="Job Title or Keywords">
                                    </div>
                                </div>

                                <div class="search_option_two">

                                    <div class="form-group">
                                        <label for="exampleInputEmail">

                                        <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control h70" id="exampleInputEmail"
                                            placeholder="Location">
                                    </div>
                                </div>

                                <div class="search_option_button"><button type="submit"
                                        class="btn btn-thm btn-dark h70">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>

                        <p class="color-white">Từ khóa nổi bật: DesignCer, Developer, Web, IOS, PHP, Senior, Engineer
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Job List Design -->
        <section class="popular-job pb30">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="feature_job_list row">

                            <div class="col-lg-6 offset-lg-3 text-center">

                                <div class="nav_container">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" style="color: #fff;">Việc làm mới nhất</li>
                                       
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content row" id="pills-tabContent">

                                <div class="tab-pane fade show active col-lg-12" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">

                                    <div class="row">
                                        <?php 
                                            foreach($conn->query($job_list) as $value){
                                        ?>
                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/1.jpg" alt="1.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0"><?php echo $value['job_type'];?></h5>
                                                    <h4 class="mt0 pt0"><?php echo $value['job_title'];?></h4>

                                                    <p class="text-thm4">$<?php echo $value['salary'];?></p>

                                                    <i class="fa-solid fa-location-dot"></i>
                                                    </span><a href="#"><?php echo $value['address'];?></a>
                                                    <p>Ngày đăng:<?php 
                                                        
                                                        $date = date("Y-m-d H:i:s",strtotime(str_replace('/','/',$value['job_date'])));
                                                        echo $date;
                                                        
                                                        ?> </p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }?>

                                        
                                    </div>
                                </div>

                                <!-- <div class="tab-pane fade col-lg-12" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">

                                    <div class="row">

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/1.jpg" alt="1.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Full Time</h5>
                                                    <h4 class="mt0 pt0">JEB Product Sales Specialist</h4>

                                                    <p class="text-thm4">Wiggle CRC</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">Bothell, WA, USA</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/2.jpg" alt="2.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Part Time</h5>
                                                    <h4 class="mt0 pt0">General Ledger Accountant</h4>

                                                    <p class="text-thm4">Robert Half Finance & Accounting</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">RG40, Wokingham</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/3.jpg" alt="3.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Full Time</h5>
                                                    <h4 class="mt0 pt0">Junior Digital Graphic Designer</h4>

                                                    <p class="text-thm4">Parkside Recruitment - Uxbridge Finance</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">New Denham, UB8 1JG</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/4.jpg" alt="4.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Full Time</h5>
                                                    <h4 class="mt0 pt0">UX/UI Designer</h4>

                                                    <p class="text-thm4">NonStop Recruitment Ltd</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">Bothell, WA, USA</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/1.jpg" alt="1.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Full Time</h5>
                                                    <h4 class="mt0 pt0">JEB Product Sales Specialist</h4>

                                                    <p>Wiggle CRC</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">Bothell, WA, USA</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6">

                                            <div class="fj_post home6">

                                                <div class="details">

                                                    <div class="thumb fn-smd"><img class="img-fluid"
                                                            src="./assets/images/partners/2.jpg" alt="2.jpg">
                                                    </div>
                                                    <h5 class="job_chedule text-thm2 mt0">Part Time</h5>
                                                    <h4 class="mt0 pt0">General Ledger Accountant</h4>

                                                    <p class="text-thm4">Robert Half Finance & Accounting</p>

                                                    <span class="flaticon-location-pin">
                                                    </span><a href="#">Bothell, WA, USA</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="popular-job home6 pb30">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ulockd-main-title">
                            <h3 class="mt0">Popular Job Categories</h3>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg1 home6"
                            style="background-image: url(./assets/images/service/1.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-pen">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Design, Art & Multimedia</h5>

                                    <p>22 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg2 home6"
                            style="background-image: url(./assets/images/service/2.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-mortarboard">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Education Training</h5>

                                    <p>48 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg3 home6"
                            style="background-image: url(./assets/images/service/3.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-bars">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Accounting / Finance</h5>

                                    <p>97 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg4 home6"
                            style="background-image: url(./assets/images/service/4.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-interview">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Human Resource</h5>

                                    <p>17 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg5 home6"
                            style="background-image: url(./assets/images/service/5.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-antenna">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Telecommunications</h5>
                                    <p>60 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg6 home6"
                            style="background-image: url(./assets/images/service/6.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-food">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Restaurant / Food Service</h5>

                                    <p>22 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg7 home6"
                            style="background-image: url(./assets/images/service/7.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-customer-support">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Construction / Facilities</h5>

                                    <p>05 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="icon_hvr_img_box sbbg8 home6"
                            style="background-image: url(./assets/images/service/8.jpg);">

                            <div class="overlay">

                                <div class="icon">

                                    <span class="flaticon-care">
                                    </span>
                                </div>

                                <div class="details">
                                    <h5>Health</h5>

                                    <p>10 Open Positions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Job Categories -->
       
       
        
        
        
        <!-- Our Footer Bottom Area -->
        <section class="footer_bottom_area home6 p0">

            <div class="container">

                <div class="row pt30 pb20">

                    <div class="col-lg-4">

                        <div class="copyright-widget tac-smd">

                            <p>© 2022 Capstone 2. All Rights <a href="http://www.bootstrapmb.com/"
                                    title="bootstrapmb">Team 21</a>.</p>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="footer_social_widget home6">
                            <ul>
                                <li class="list-inline-item"><a href="https://www.facebook.com/phat8888.77"
                                        target="_blank"><i class="fa-brands fa-facebook"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><a class="scrollToHome text-thm" href="#"><i class="flaticon-rocket-launch"></i></a>
    </div>
    <!-- Wrapper End -->
    <script type="text/javascript" src="./assets/js/jquery-3.3.1.js">
    </script>
    <script type="text/javascript" src="./assets/js/jquery-migrate-3.0.0.min.js">
    </script>
   
    <script type="text/javascript" src="./assets/js/bootstrap.min.js">
    </script>
    
    <script type="text/javascript" src="./assets/js/ace-responsive-menu.js">
    </script>
    <script type="text/javascript" src="./assets/js/bootstrap-select.min.js">
    </script>
  
    <script type="text/javascript" src="./assets/js/parallax.js">
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
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="./assets/js/script.js">
    </script>
</body>

</html>