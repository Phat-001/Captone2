<?php
   session_start();
   include_once './include/database.php';
   include_once './include/connection.php';
   if(!isset($_SESSION['unique_id'])){
       header('location:index.php');
   }
   
   if(isset($_SESSION['unique_id'])){
    $id = $_SESSION['unique_id'];
   }
?>
<?php  require_once './include/header.php'; ?>
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
            <a href="logout.php" id="logoutss" style="color:black;text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
            <span class="profile_icon" style=""><a class="hover-icon" href="profile.php?"><i style="font-size: 20px; color: black;" class="fa-solid fa-user-gear"></i></a></span>
    </div>
 <section class="container">
  <div class="main-wrapper">
  <div class="row">
   <div class="col-xl-4">
   <!-- Dynamic Sidebar -->
   <?php include './include/sidebar.php'; ?>
   <!-- Dynamic Sidebar -->
   </div>
   <div class="col-xl-8">
    <div class="right-panel mb-4">
     <div class="card">
      <div class="card-header">
       <strong><i class="fa fa-comments"></i> Welcome to Rabbit Support </strong>
      </div>
      <div class="card-body">
       <h1 class="startup-txt display-6 text-center"><i class="fa fa-commenting"></i> Rabbit Chatting</h1>
      </div>
     </div>
    </div>
   </div>
  </div>
  </div>
 </section>
<?php  require_once './include/footer.php'; ?>