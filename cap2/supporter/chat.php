<?php
    session_start();
    include_once '../include/connection.php';
   if(isset($_SESSION['unique_id'])){
    $id = $_SESSION['unique_id'];
   }
   if(!isset($_SESSION['unique_id'])){
    header('location:../index.php');
   }
   if(!isset($_GET['sender']) && $_GET['receiver'] == null){
     echo "<script>window.location='../index.php';</script>";
   }else{
      $sender   = $_GET['sender'];
      $receiver = $_GET['receiver'];
   }
?>
<!-- Getting Sender & Receiver Id through hidden inputs -->
<input type="hidden" id="receive" value="<?php echo $receiver; ?>"> 
<input type="hidden" id="send" value="<?php echo $sender; ?>">
<!-- Getting Sender & Receiver Id through hidden inputs -->

<?php  require 'header.php'; ?>
<div class="header-login" id="fixed-top-menu" style="box-shadow:none !important; height:80px !important; ">
    <div class="logo-header1">
                <a href="homepage.php"><img src="../assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
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
        
        <span class="guess_name"><img class="avata_img" src="../images/avata/<?php 
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
            <a href="../logout.php" id="logoutss" style="color:black;text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
            <span class="profile_icon" style=""><a class="hover-icon" href="../profile.php?"><i style="font-size: 20px; color: black;" class="fa-solid fa-user-gear"></i></a></span>
    </div>
 <section class="container">
  <div class="main-wrapper">
  <div class="row">
   <div class="col-xl-4">
   <!-- Dynamic Sidebar -->
    <?php include_once 'sidebar.php'; ?>
   <!-- Dynamic Sidebar -->
   </div>
   <div class="col-xl-8">
    <div class="right-panel mb-4">
     <div class="card">
      <div class="card-header">
       <div class="message-to d-flex ">
       <?php 
          $query  = "SELECT * FROM account WHERE unique_id='$receiver'";
          $result = $db->select($query);
          if($result){
          foreach($result as $active_user){ ?>
          <img src="../images/avata/<?php echo $active_user['img']; ?>"> 
          
          <h6><?php echo $active_user['name']; ?></h6>
          
          <?php } } ?>
       </div>
      </div>
      <div class="card-body">
       <div class="chat-wrapper">
        <div class="chat-body">
          <div id="chat_load"></div>
          <script type="text/javascript">
           $(function(){
            const receive = $('#receive').val(); 
            const send    = $('#send').val(); 
            const dataStr = 'receive='+receive+'&send='+send;
             setInterval(function(){
              $.ajax({
                type:'GET',
                url:'chat_loader.php',
                data:dataStr,
                success:function(e){
                  $('#chat_load').html(e);
                }
              });   
             }, 100);
           });
          </script>
        </div> 
        <div class="type-chats">
          <form method="POST" id="chatForm">
           <textarea id="message" style="resize:none;" placeholder="Type Message..." class="form-control mb-3"></textarea>
           <button onclick="return chat_validation()" class="btn btn-sm btn-info text-light"> Gửi</button>
          </form>
          <div id="msg"></div>  
          <script type="text/javascript">
           function chat_validation(){
            const textmsg = $('#message').val();
            const receive = $('#receive').val(); 
            const send    = $('#send').val(); 

            if(textmsg == ""){
             alert('Type Message....');
             return false;
            }
            const datastr = 'message='+textmsg+'&receive='+receive+'&send='+send;
             $.ajax({
              url:'../response/chatlog.php',
              type:'POST',
              data:datastr,
              success:function(e){
                $('#msg').html(e);
              }
            });
            document.getElementById('chatForm').reset();
            return false;
           }
          </script>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  </div>
 </section>
<?php  require 'footer.php'; ?>