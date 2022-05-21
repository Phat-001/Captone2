<?php
    session_start();
    require('./include/connection.php');
    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }

    
    $p_id = $_GET['post_id'];
    $post_information = "select * from posts where post_id = {$p_id}";
    
    $query = mysqli_query($conn, $post_information);
    $detail = mysqli_fetch_assoc($query);

    
    
    $other_post = "SELECT * FROM `posts` WHERE `visible`=1 ORDER BY `created_at` DESC Limit 7";
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

    <!-- <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- link slick slider -->
    

    <!-- end slick slider -->


    <!-- <link href="./assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" /> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js">
</script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
</script><![endif]-->
        <style>
            .search_job_a{
                background: #fff;
                padding: 5px 35px;
                border-radius: 10px;
                box-shadow: 20px 20px 50px grey !important;
            }
            #search_result{
                margin-top: 20px;
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }
            .item_job{
                margin-top: 10px;
            }
            
            .img_search{
                width: 65px !important;
            }
            .profile_icon{
                position: absolute !important;
                top: 10% !important;
                right: 10px !important;
                color: black;
            }
            .hover-icon{
                color: 422e2e;
                font-size: 34px;
            }
            .hover-icon:hover{
                color: #fff;
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
    
    
        
        <!-- start post -->

        <section class="blog_post_container bgc-fa" style="margin-top: 80px !important;">

<div class="container">

    <div class="row">

        <div class="col-lg-8">

            <div class="main_blog_post_content">

                <div class="mbp_thumb_post"><img class="img-fluid" src="./assets/images/blog/<?php echo $detail['post_img']?>" alt="12.jpg">
                    
                    <div class="details">
                        <h4><?php echo $detail['title']?></h4>
                        <ul class="post_meta">
                            
                            <li>
                                <span> <?php echo $detail['created_at'];?></span>
                            
                            
                        </ul>

                        <p>
                        <?php echo $detail['body'];?>
                        </p>
                        
                        <div class="mbp_blockquote">
                            <blockquote class="blockquote">

                                <p class="mb-0"><sub class="font-italic fz48">"</sub>Công việc khó khăn chắc chắn sẽ phải trải qua một chặng đường dài. Ngày nay có rất nhiều người làm việc chăm chỉ, vì vậy bạn phải chắc chắn rằng bạn làm việc chăm chỉ hơn nữa và thực sự cống hiến hết mình cho những điều bạn đang làm và những mục tiêu bạn đã đặt ra.<sub
                                        class="font-italic fz48">"</sub></p>
                            </blockquote>
                        </div>
                        <div class="mbp_blockquote">
                            <blockquote class="blockquote">

                                <p class="mb-0"><sub class="font-italic fz48">"</sub>“Tôi mạnh mẽ, tôi tham vọng và tôi biết chính xác điều tôi muốn. Nếu điều đó có biến tôi trở thành một người đàn bà lẳng lơ thì cũng không sao”.<sub
                                        class="font-italic fz48">"</sub></p>
                            </blockquote>
                        </div>
                        
                    </div>

                </div>

                

                <div class="mbp_pagination_comments">
                    <h4 class="title">Bình luận</h4>

                    <div class="mbp_first media"><img src="./images test/team/1.jpg" class="mr-3 rounded-circle"
                            alt="1.jpg">

                        <div class="media-body">
                            <h4 class="sub_title mt-0">Nguyễn Tuấn <a class="float-right text-thm"
                                    href="#">Reply

                                   </a></h4>
                            <ul>
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"><a href="#">

                                       29/3/2022</a></li>
                            </ul>Bài viết khá hữu ích, cảm ơn tác giả nhiều. thả tym nè

                            <div class="mbp_sub media"><a href="#"><img src="./images test/team/8.jpg"
                                        class="mr-3 rounded-circle" alt="8.jpg"></a>

                                <div class="media-body">
                                    <h5 class="mt-0">Trần Thơm</h5>
                                    <ul>
                                        <li class="list-inline-item"></li>
                                        <li class="list-inline-item"><a href="#">

                                        30/3/2022</a></li>
                                    </ul>Html có phải ngôn ngữ lập trình không bạn ?.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mbp_second media"><img src="./images test/team/2.jpg"
                            class="align-self-start mr-3 rounded-circle" alt="2.jpg">

                        <div class="media-body">
                            <h4 class="sub_title mt-0">Trần Nghĩa<a
                                    class="float-right text-thm" href="#">Reply

                                   </a></h4>
                            <ul>
                                <li class="list-inline-item">
                                </li>
                                <li class="list-inline-item"><a href="#">

                                28/3/2022</a></li>
                            </ul>

                            <p>Good ! cố gắng tạo ra nhiều bài viết nữa nhé.</p>
                        </div>
                    </div>
                </div>

                <div class="mbp_comment_form">
                    <h4>Phàn hồi của bạn</h4>

                    <form class="comments_form">

                        <div class="form-group">
                            <label for="exampleInputName1">Tên
                            </label>
                            <input type="text" class="form-control" id="exampleInputName1"
                                aria-describedby="textHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email
                            </label>
                            <input type="email" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Phản hồi
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">
</textarea>
                        </div><button type="submit" class="btn btn-thm">Gửi

                           </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="main_blog_post_widget_list">


                <div class="blog_recent_post_widget">
                    <h4 class="title">Các bài viết liên quan</h4>
                    <ul class="list-group">
                        <?php foreach($conn->query($other_post) as $row){?>
                        <div class="media"><img style="width: 70px; height: 70px; object-fit: cover;" class="align-self-start mr-3" src="./assets/images/blog/<?php echo $row['post_img']?>"
                                alt="s1.jpg">

                            <div class="media-body">

                                <p class="mt-0 post_title"><?php echo $row['title']?>
                                </p><a href="detail_post.php?post_id=<?php echo $row['post_id'];?>">Đọc bài viết...</a>
                            </div>
                        </div>
                        <?php }?>
                    </ul>
                </div>

               
            </div>
        </div>
    </div>
</div>
</section>

        <!-- end post -->
        
        <section class="footer_bottom_area home6 p0">

            <div class="container">

                <div class="row pt30 pb20">

                    <div class="col-lg-4">

                        <div class="copyright-widget tac-smd">

                            <p>© 2022 Capstone 2. All Rights <a href="http://www.bootstrapmb.com/"
                                target="_blank"    title="bootstrapmb">Team 21</a>.</p>
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
    
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="text/javascript" src="./assets/js/home-page.js">
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