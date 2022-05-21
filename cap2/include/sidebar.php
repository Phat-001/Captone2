<?php 
include_once 'database.php';

$db = new Database;
?>
<div class="sidebar-wrapper mb-4">
      <div class="card">
       <div class="card-header">
       <div class="message-to d-flex">
          <?php 
             $sql = "SELECT * FROM account WHERE unique_id='$id'";
             $res = $db->select($sql);
             if($res){
             foreach($res as $user){ ?>
             <img src="./images/avata/<?php echo $user['img']; ?>"> 
             <i class="fa fa-circle"></i>
             <h6><?php echo $user['name']; ?></h6>
          <?php } } ?>
       </div>
       <!-- <a href="?action=logout"><i class="fa fa-sign-out"></i> Logout</a> -->
       </div>
       <div class="card-body">
       <div class="user-list-box">
           <p>Bạn có thể hỏi tại đây!</p>
            <ul>
              <?php 
               $query  = "SELECT * FROM account WHERE unique_id != '$id' and role = 4";
               $result = $db->select($query);
               if($result){
               foreach($result as $list){ ?>
                <li>
                    <a href="chat.php?sender=<?php echo $id; ?>&receiver=<?php echo $list['unique_id']; ?>" class="d-flex align-items-center">
                        <img src="./images/avata/<?php echo $list['img']; ?>">
                        
                        <h6><?php echo $list['name']; ?></h6>
                    </a>
                </li>
                <?php } } ?>   
            </ul>   
        </div>
       </div>
      </div>
    </div>