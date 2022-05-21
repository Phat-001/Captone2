<?php
session_start();
require('./include/connection.php');
$thongbao='';
if (isset($_POST['upload_cv'])){
    $name_user=$_POST['name_user'];
    $your_skill = $_POST['your_skill'];
    $email_user=$_POST['email_user'];
    
    $filename = '';
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $filename = $_FILES["file"]["name"];

        if (file_exists("file_cv/" . $filename)) {
            echo $filename . " đã tồn tại.";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "file_cv/" . $filename);
            echo "Tệp của bạn đã đăng tải thành công";
        }
    } else {
        echo "Error: " . $_FILES["file"]["error"];
    }

    $sql = "insert into cv_file (account_id,hr_id,job_id ,uploadfile,email,strong_point,name_candidate) values('{$_GET['account_id']}','{$_GET['hr_id']}','{$_GET['job_id']}','{$filename}','{$email_user}','{$your_skill}','{$name_user}')";

    
    if($conn->query($sql)){
        $thongbao = "Gửi CV thành công!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nộp CV</title>
    <style>
        h1 {
            color: red;
        }
        #logoutss{
            color: black;
        }
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
    
    <link rel="stylesheet" href="./stylemain.css">
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
    <div class='job_application main-content' style="margin-top: 100px;">
        <div class='content clearfix'>
            <div class='header col-12'>
                <h3>Điền thông tin để nộp CV</h3>
            </div>
            <div class='apply-form'>
                <div class='form-content'>
                    <form class="info col-md-12 px-3" id="apply_form" data-controller="job-applications--new bootstrap-validation" enctype="multipart/form-data" action="" accept-charset="UTF-8" method="post">
                        <div class='row mb-3'>
                            <label class="col-sm-2" for="job_application_fullname">Họ & Tên:</label>
                            <div class='col-sm-10'>
                                <input required type="text" name="name_user" id="name_user" value="<?php $stmt5 = $conn->prepare("select * from account where account_id = ?");
$stmt5->bind_param("s", $id_account);
$stmt5->execute();
$data5 = $stmt5->get_result()->fetch_assoc();
$value5 = $data5 ? $data5['name'] : null;
echo  $value5;?>" required="required" size="65">
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class="col-sm-2" for="job_application_email">Email:</label>
                            <div class='col-sm-10'>
                            <input required type="text" name="email_user" id="email_user" value="<?php $stmt6 = $conn->prepare("select * from account where account_id = ?");
$stmt6->bind_param("s", $id_account);
$stmt6->execute();
$data6 = $stmt6->get_result()->fetch_assoc();
$value6 = $data6 ? $data6['email'] : null;
echo  $value6;?>" required="required" size="65">
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <label class="col-sm-2" for="job_application_cv_local">Your CV:</label>
                            <div class='col-sm-10'>
                                <input required type="file" name="file">
                                <div class='small form-text'>file .doc .docx, .pdf files.</div>
                            </div>
                        </div>
                        <div class='row mb-3 job_application_advantages' data-char-counter-max-length-value='500' data-controller='char-counter'>
                            <label class="text" for="job_application_advantages">What skills, work projects or achievements make you a strong candidate?</label>
                            <div class='col-sm-12'>
                                <textarea required placeholder="Details and specific examples will make your application stronger..." data-rule-maxlength="500" data-msg-maxlength="" data-char-counter-target="input" class="form-control" rows="4" name="your_skill" id="your_skill"></textarea>
                            </div>
                            
                        </div>
                        <div class='actions d-grid mb-4'>
                            <button class='btn btn-success' name="upload_cv" type='submit' data-toggle="modal" data-target="#xampleModal7">Gửi CV</button>
                        </div>
                        
                    </form>
                    <div style="text-align: center;">
                        <h5><?php echo $thongbao;?></h5>
                    </div>
                </div>
            </div>
        </div>

        </div>

        
        <?php


        // $file = scandir("file_cv");

        // for ($i = 2; $i < count($file); $i++) {
        //     echo $file[$i];
        // }
        // echo $_GET['account_id'];
        // echo $_GET['hr_id'];

        // echo count($file);
        // echo "<pre>";
        // var_dump(scandir("file_cv"));
        // echo "</pre>";
        // echo $file[3];
        ?>
</body>

</html>