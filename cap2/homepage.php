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
    <div class="header-login" id="fixed-top-menu" style="box-shadow:none !important; height:66px !important; ">
        <div class="logo-header1">
            <img src="./assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt=""><span>Rabbit Job</span>
        </div>
        <div class="item-menu">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <span class="guess_name">hi! <?php echo $_SESSION['name']; echo $_SESSION['id_user']; echo $_SESSION['user_role'];?> </span>
            <a href="logout.php" id="logoutss">Đăng xuất</a>
        
        
    </div>
    <div class="wrapper">

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

                                            <span class="flaticon-search">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control h70" id="exampleInputName"
                                            placeholder="Job Title or Keywords">
                                    </div>
                                </div>

                                <div class="search_option_two">

                                    <div class="form-group">
                                        <label for="exampleInputEmail">

                                            <span class="flaticon-location-pin">
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

                                                    <p class="text-thm4"><?php echo $value['salary'];?></p>

                                                    <span class="flaticon-location-pin">
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
        <!-- Browse Local Jobs -->
        <section class="carrer-tips home6">

            <div class="container">

                <div class="row">

                    <div class="col-xl-3">
                        <h3>How We Can Help
                            <br>You
                        </h3>

                        <p>Search all the open positions on the web. Get your own personalized salary estimate.</p>
                    </div>

                    <div class="col-xl-9">

                        <div class="row">

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                <div class="icon_box_home6">

                                    <div class="icon text-thm4">

                                        <span class="flaticon-unlocked">
                                        </span>
                                    </div>

                                    <div class="details">
                                        <h4>Create An Account</h4>

                                        <p>Post a job to tell us about your project. We'll quickly match you with the
                                            right freelancers.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                <div class="icon_box_home6">

                                    <div class="icon text-thm4">

                                        <span class="flaticon-job">
                                        </span>
                                    </div>

                                    <div class="details">
                                        <h4>Search Jobs</h4>

                                        <p>Browse profiles, reviews, and proposals then interview top candidates.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                <div class="icon_box_home6">

                                    <div class="icon text-thm4">

                                        <span class="flaticon-interview">
                                        </span>
                                    </div>

                                    <div class="details">
                                        <h4>Hire The Best One</h4>

                                        <p>Use the Upwork platform to chat, share files, and collaborate from your
                                            desktop or on the go.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">

                                <div class="icon_box_home6">

                                    <div class="icon text-thm4">

                                        <span class="flaticon-trophy">
                                        </span>
                                    </div>

                                    <div class="details">
                                        <h4>Save & Apply</h4>

                                        <p>Use the Upwork platform to chat, share files, and collaborate from your
                                            desktop or on the go</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Job Categories -->
        <section class="popular-job home6 pb30">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ulockd-main-title">
                            <h3 class="mt0">Popular Job Categories</h3><a class="color-blue float-right" href="#">Browse
                                All Categories <i class="flaticon-right-arrow pl15"></i></a>
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
       
        <!-- Expert Freelancer List -->
        <!-- <section class="expert-freelancer bgc-fa pb20">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ulockd-main-title">
                            <h3 class="mt0">Hire Expert Freelancer</h3>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ef_slider2">

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/1.jpg" alt="1.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Ali TUFAN</h4>

                                        <p>App Designer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">100%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$85
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/2.jpg" alt="2.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Dominikus YURI</h4>

                                        <p>Front-end Developer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>USA</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/usa.png" alt="usa.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">100%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$200
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/3.jpg" alt="3.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Deanna ROSE</h4>

                                        <p>UI - UX Designer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Brazil</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/brazil.png" alt="brazil.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">100%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/4.jpg" alt="4.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Lori Ramos</h4>

                                        <p>UX/UI Designer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/5.jpg" alt="5.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Michele Snyder</h4>

                                        <p>Front-End Developer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/6.jpg" alt="6.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Randall Warren</h4>

                                        <p>Graphics Designer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/7.jpg" alt="7.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Peter Hawkins</h4>

                                        <p>Magento Certified Developer</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/8.jpg" alt="8.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Martha Griffin</h4>

                                        <p>Medical Professed</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="ef_post home6">

                                    <div class="ef_header">
                                        <h4 class="hr_rate">

                                            <span class="text-thm4">$150
                                            </span><small>/hr</small>
                                        </h4><a class="ef_bookmark" href="#" title="BookMark Freelancer">

                                            <span class="flaticon-favorites">
                                            </span></a>
                                    </div>

                                    <div class="thumb text-center"><img class="img-fluid"
                                            src="./assets/images/team/9.jpg" alt="9.jpg">
                                    </div>

                                    <div class="freelancer_review">

                                        <div class="everage_rating">4.5
                                        </div>
                                        <ul class="rating_list">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star color-golden">
                                                    </span></a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="fa fa-star-o">
                                                    </span></a></li>
                                        </ul>
                                        <h4 class="title">Kathleen Moreno</h4>

                                        <p>Marketing Expert</p>
                                    </div>

                                    <div class="details">

                                        <div class="job_locate">

                                            <p>Location</p>
                                            <ul class="float-right">
                                                <li class="list-inline-item m0">

                                                    <p>Turkey</p>
                                                </li>
                                                <li class="list-inline-item m0"><img class="img-fluid pl5"
                                                        src="./assets/images/resource/turkey.png" alt="turkey.png"></li>
                                            </ul>
                                        </div>

                                        <div class="job_srate">

                                            <p>Job Success</p>

                                            <p class="float-right">88%</p>
                                        </div>

                                        <div class="ef_prf_link mt10"><a class="btn btn-block btn-transparent"
                                                href="#">View Profile <i class="flaticon-right-arrow pl10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Browse Local Jobs -->
        <section class="carrer-tips home6">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="ulockd-main-title">
                            <h3 class="mt0">Quick Career Tips</h3>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="carrer_tips_slider2">

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h41.jpg"
                                            alt="h41.jpg">

                                        <div class="serial">01
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>Attract More Attention Sales
                                            <br>And Profits
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h42.jpg"
                                            alt="h42.jpg">

                                        <div class="serial">02
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Marketing</h5>
                                        <h4>11 Tips to Help You Get New
                                            <br>Clients
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h43.jpg"
                                            alt="h43.jpg">

                                        <div class="serial">03
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>An Overworked Newspaper
                                            <br>Editor
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">
                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h41.jpg"
                                            alt="h41.jpg">

                                        <div class="serial">01
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>Attract More Attention Sales
                                            <br>And Profits
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h42.jpg"
                                            alt="h42.jpg">

                                        <div class="serial">02
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Marketing</h5>
                                        <h4>11 Tips to Help You Get New
                                            <br>Clients
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h43.jpg"
                                            alt="h43.jpg">

                                        <div class="serial">03
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>An Overworked Newspaper
                                            <br>Editor
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h41.jpg"
                                            alt="h41.jpg">

                                        <div class="serial">01
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>Attract More Attention Sales
                                            <br>And Profits
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h42.jpg"
                                            alt="h42.jpg">

                                        <div class="serial">02
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Marketing</h5>
                                        <h4>11 Tips to Help You Get New
                                            <br>Clients
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <div class="quick_tips_home4">

                                    <div class="thumb"><img class="img-fluid w100" src="./assets/images/blog/h43.jpg"
                                            alt="h43.jpg">

                                        <div class="serial">03
                                        </div>
                                    </div>

                                    <div class="details">
                                        <h5>Tips</h5>
                                        <h4>An Overworked Newspaper
                                            <br>Editor
                                        </h4>
                                        <ul class="post_meta">
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-clock">
                                                    </span>03rd Nov, 2019</a></li>
                                            <li class="list-inline-item"><a href="#">

                                                    <span class="flaticon-chat">
                                                    </span>0 comments</a></li>
                                        </ul><a class="btn text-thm4" href="#">Read More <i
                                                class="flaticon-right-arrow pl15"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Footer Top Area -->
        <section class="footer_top_area home6">

            <div class="container">

                <div class="row">

                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                        <div class="funfact_one home6">

                            <div class="icon">

                                <span class="flaticon-work">
                                </span>
                            </div>

                            <div class="timer">2395
                            </div>

                            <p>Jobs Added</p>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                        <div class="funfact_one home6">

                            <div class="icon">

                                <span class="flaticon-certified">
                                </span>
                            </div>

                            <div class="timer">1267
                            </div>

                            <p>Tasks Posted</p>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                        <div class="funfact_one home6">

                            <div class="icon">

                                <span class="flaticon-company">
                                </span>
                            </div>

                            <div class="timer">1095
                            </div>

                            <p>Companies</p>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                        <div class="funfact_one home6">

                            <div class="icon">

                                <span class="flaticon-man">
                                </span>
                            </div>

                            <div class="timer">7348
                            </div>

                            <p>Freelancer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Footer -->
        
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
                                        target="_blank"><i class="fa fa-facebook"></i></a></li>

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