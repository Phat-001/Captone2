<?php
    session_start();
    require('./include/connection.php');
    // id công việc: dùng để lấy công việc cụ thể
    $job_id = $_GET['job_id'];
    //id người đăng tuyển: xem ai là người đăng
    $hr_id = $_GET['hr_id'];
    //get user hiện tại muốn ứng tuyển
    $user_id = $_SESSION['id_user'];
    $job_information = "select * from job_information where job_id = '{$job_id}'";
    
    $query = mysqli_query($conn, $job_information);
    $detail = mysqli_fetch_assoc($query);


    $job_information_other = "select * from job_information where account_id = '{$hr_id}'";
    

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylemain.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive stylesheet -->

    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- Title -->
    <title>Việc làm
    </title>
    <style>
        .profile_icon{
                position: absolute !important;
                top: 33% !important;
                right: 10px !important;
                color: black;
            }
            .chat_sp{
                position: absolute !important;
                top: 28px !important;
                right: 40% !important;
                color: black;
                font-weight: bold;
            }
            .chat_sp:hover{
                
                color: black;
            }
            .avata_img{
                max-width: 50px;
            }
    </style>
    <!-- Favicon -->

    <!-- <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" /> -->

    <!-- <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" /> -->
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
                <a href="homepage.php"><img src="././assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
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
        <span><a href="chat_page.php" class="chat_sp"><i style="font-size: 20px; color: black; margin-right: 5px;" class="fa-solid fa-circle-arrow-right"></i> Gửi câu hỏi</a></span>
        <span class="guess_name"><img class="avata_img" src="./images/avata/<?php 
$stmt = $conn->prepare("select * from account where account_id = ?");
$stmt->bind_param("s", $_SESSION["id_user"]);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$id_account = $data ? $data['account_id'] : null;

$stmt = $conn->prepare("select * from account where account_id = ?");
$stmt->bind_param("s", $id_account);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$value = $data ? $data['img'] : null;
echo  $value;

?>" alt=""> <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?> </span>
            <a href="logout.php" id="logoutss"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
            <span class="profile_icon" style=""><a class="hover-icon" href="profile.php?"><i style="font-size: 20px; color: black;" class="fa-solid fa-user-gear"></i></a></span>
    </div>
    <!-- <div class="modal">
        <div class="submit-cv">
            
        </div>
    </div> -->
    <div class="wrapper" id="wrapper" style="margin-top: 80px;">

        <div class="preloader">
        </div>
        <!-- Main Header Nav -->

       

        
        <!-- Job Single Page Section -->
        <section class="job_single_v5_banner mt-30" style="background-image: url('././assets/images/background/banner1.jpg') ;"></section>
        <!-- Job Single Page Section -->
        <section class="bgc-fa pt40" style="background: #fff !important;">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 offset-xl-2">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="candidate_personal_info mbt45 style2 job_singe_v5">

                                    <div class="thumb one text-center"><img class="img-fluid rounded"
                                            src="images/logo_company/<?php echo $detail['logo']?>" alt="cl1.jpg">
                                    </div>

                                    <div class="details">
                                        <h3><?php echo $detail['job_title']?></h3>
                                        <p class="mb0"><i class="fa-solid fa-location-dot"></i> <?php echo $detail['address']?></p>
                                        <ul class="address_list">
                                            <li class="list-inline-item"><a href="#">

                                            <?php echo $detail['job_type']?></a></li>
                                            <li class="list-inline-item"><a href="#">$ 

                                                  <?php echo $detail['salary']?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row job_meta_list mt30 mb30">

                            <div class="col-sm-4 col-lg-4">
                                <a href="submit_cv.php?account_id=<?php echo $user_id;?>&hr_id=<?php echo $detail['account_id']?>&job_id=<?php echo $_GET['job_id']?>">
                                <button class="btn btn-block btn-thm">Ứng tuyển

<i class="fa-solid fa-circle-arrow-left"></i>
        </span></button>
                                </a>
                            </div>

                            
                        </div>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="candidate_about_info style2 mt10">
                                    <h4 class="fz20 mb30">Mô tả công việc</h4>
                                    <p>Thể loại: <?php echo $detail['job_type']?></p>
                                    <p>Yêu cầu cấp bậc : <?php echo $detail['level']?></p>
                                    <p class="mb30"><?php echo str_replace("\n","<br />", $detail['description'])?></p>
                                    
                                    <p class="mb40">The Job will be working with a world-class team of
                                        designers, engineers, and product mana gers to develop innovative user
                                        experiences that will shape the industry’s pioneering products.</p>

                                    <p class="fwb">Công ti chúng tôi:</p>

                                    <p>- <i class="fa-solid fa-calendar-days"></i> Thứ 2 - thứ 6, lương thứ 13.</p>

                                    <p>- <i class="fa-solid fa-clock"></i> Không có OT</p>

                                    <p>- <i class="fa-solid fa-earth-americas"></i> Viet Nam</p>
                                    <p>- <i class="fa-solid fa-user-group"></i> 1-50</p>

                                    <p class="fwb">Địa điểm công việc</p>

                                    <p>- <i class="fa-solid fa-location-dot"></i> <?php echo $detail['address']?> </p>

                                    <p>-- Through your online portfolio, you are able to share your UX/UI design
                                        capabilities by showcasing your design chops and demonstrates originality,
                                        innovation and strong problem solving skills</p>

                                    <p>-- design chops and demonstrates originality, innovation and strong problem
                                        solving skills</p>

                                    <p>-- Demonstrable experience with end-to-end product design, including consumer
                                        product/s</p>

                                    <p>-- Talent for managing multiple projects simultaneously, from concept through to
                                        completion</p>

                                    <p>-- Talent for managing multiple projects simultaneously, from concept through to
                                        completion show it</p>

                                    <p>-- Excellent communicator who has conviction to champion of view, but can also
                                        successfully collabo rate with others</p>

                                    <p>-- A Degree in Design or related field is preferred</p>

                                    <p class="mb20">-- You enjoy a fast paced and dynamic working environment</p>
                                </div>
                            </div>
                            <div class="banner">
                                <div class="img-banner">
                                    <img src="./assets/images/home/2.jpg" alt="">
                                </div>
                                <p class="mb20">-- You enjoy a fast paced and dynamic working environment</p>
                                <p>-- Excellent communicator who has conviction to champion of view, but can also
                                        successfully collabo rate with others</p>
                                        <p>-- Through your online portfolio, you are able to share your UX/UI design
                                        capabilities by showcasing your design chops and demonstrates originality,
                                        innovation and strong problem solving skills</p>
                                <div class="img-banner" style="margin-top: 10px;">
                                    <img src="./assets/images/home/3.jpg" alt="">
                                </div>
                            </div>

                            
                            <div class="col-lg-12">

                                <div class="my_resume_eduarea">
                                    <h4 class="title mb20">Các công việc khác của công ty</h4>
                                </div>
                            </div>

                           

                            <div class="col-lg-12">
                                <?php foreach($conn->query($job_information_other) as $row){?>
                                    <a href="detail_job.php?hr_id=<?php echo $row['account_id'];?>&job_id=<?php echo $row['job_id']?>">
                                    <div class="fj_post style2 one">

<div class="details">
    <h5 class="job_chedule text-thm2"><?php echo $row['job_type']?></h5>

    <div class="thumb fn-smd"><img class="img-fluid"
            src="images/logo_company/<?php echo $row['logo']?>" alt="3.jpg">
    </div>
    <h4><?php echo $row['job_title']?></h4>

    <p>$<?php echo $row['salary'];?></p>
    <ul class="featurej_post">
        <li class="list-inline-item">

            
           <a href=""><i class="fa-solid fa-location-dot"></i><?php echo $row['address']?></a>
        </li>
        <li class="list-inline-item">
           
        </li>
    </ul>
</div>
</div>
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="footer_bottom_area home6 p0">

            <div class="container">

                <div class="row pt30 pb20">

                    <div class="col-lg-4">

                        <div class="copyright-widget tac-smd">

                            <p>© 2022 Capstone 2. All Rights <a href="http://www.bootstrapmb.com/"
                                target="_blank"    title="bootstrapmb">Team C2SE.21</a>.</p>
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
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="./assets/js/script.js">
    </script>
</body>

</html>