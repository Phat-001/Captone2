<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:../index.php');
    }
    require('../include/connection.php');
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
<link rel="stylesheet" href="../stylemain.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang admin</title>
    <style>
        button>a{
            color: #fff;
            text-decoration: none;
        }
        button>a:hover{
            color: #fff;
            text-decoration: none;
        }
        .item{
          
          display: flex;
    align-items: center;
    width: 230px;
    justify-content: space-between;

        }
        h2{
          text-align: center;
        }
        .logo-header1{
          position: relative;
        }
        .item{
          position:absolute;
          right: 10px;
          top: 50%;
          transform: translateY(-50%);
        }
    </style>
    <link rel="stylesheet" href="../js/jquery.dataTables.min.css">
</head>
<body>
    
<div class="logo-header1" style="background: #79b530;">
                <a href="#wrapper"><img src="../assets/images/rabbit/logo-cap2.png" class="logo-cap2" alt="" ><span style="line-height: 80px;
    font-size: 34px;
    color: rgb(27, 46, 32);">Rabbit Job</span></a>
    <div class="item">
    <span>hi! <?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?></span>
      <a href="../logout.php" style="color: black; text-decoration:none;"><i class="fa-solid fa-right-from-bracket"></i>????ng xu???t</a>
    </div>
            </div>
            
    
    <h2>???ng vi??n</h2>
  <!-- <nav class="navbar navbar-light bg-light">
    <form class="form-inline" action="" method="post">
      <input class="form-control mr-sm-2 timkiem" type="search" placeholder="???ng vi??n" aria-label="Search">
    </form>
  </nav> -->
    <table class="table table-striped" id="my-Table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">T??n</th>
      <th scope="col">email</th>
      <th scope="col">Vai tr??</th>
      <th scope="col">S??? ??i???n tho???i</th>
      <th scope="col">?????a ch???</th>
      <th scope="col">username</th>
      <th><button type="button" class="btn btn-success"><a href="add_account.php">Th??m m???i</a></button></th>
    </tr>
  </thead>
  <tbody id="account">
      <?php
        $sql = "select * from account where role = 3";
        foreach($conn->query($sql) as $row){
      ?>
    <tr>
      <th scope="row"><?php echo $row['account_id']?></th>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php 
          switch ($row['role']) {
            case '2':
              echo "Human Resource";
              break;
              case '3':
                echo "???ng vi??n";
                break;
                case '4':
                  echo "supporter";
                  break;
                  case '5':
                    echo "ng?????i ????ng b??i";
                    break;
            default:
              # code...
              break;
          }
      ?></td>
      <td><?php echo $row['phone']?></td>
      <td><?php echo $row['address']?></td>
      <td><?php echo $row['username']?></td>
      <td>
        <button type="button" class="btn btn-danger"><a href="update_account.php?user_id=<?php echo $row['account_id']; ?>">s???a</a></button>
        
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#xampleModal">
                X??a
        </button>

        <div class="modal fade" id="xampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">X??a t??i kho???n</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      B???n c?? ch???c mu???n x??a t??i kho???n n??y
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>
                      <a type="submit" name="deletePost" href="delete_account.php?user_id=<?php echo $row['account_id']; ?>" class="btn btn-primary">X??a</a>
                    </div>
                  </div>
                </div>
              </div>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<!-- end ???ng vi??n -->
<h2>Members</h2>
  
<table class="table table-striped" id="my-table2">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">T??n</th>
      <th scope="col">email</th>
      <th scope="col">Vai tr??</th>
      <th scope="col">S??? ??i???n tho???i</th>
      <th scope="col">?????a ch???</th>
      <th scope="col">username</th>
      <th><button type="button" class="btn btn-success"><a href="add_account.php">Th??m m???i</a></button></th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "select * from account where role = 2 or role = 4 or role =5";
        foreach($conn->query($sql) as $row){
      ?>
    <tr>
      <th scope="row"><?php echo $row['account_id']?></th>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php 
          switch ($row['role']) {
            case '2':
              echo "Human Resource";
              break;
              case '3':
                echo "???ng vi??n";
                break;
                case '4':
                  echo "supporter";
                  break;
                  case '5':
                    echo "ng?????i ????ng b??i";
                    break;
            default:
              # code...
              break;
          }
      ?></td>
      <td><?php echo $row['phone']?></td>
      <td><?php echo $row['address']?></td>
      <td><?php echo $row['username']?></td>
      <td>
        <button type="button" class="btn btn-danger"><a href="update_account.php?user_id=<?php echo $row['account_id']; ?>">s???a</a></button>
        <button type="button" class="btn btn-warning"><a href="delete_account.php?user_id=<?php echo $row['account_id']; ?>">x??a</a></button>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<script type="text/javascript">
    $(Document).ready(function(){
      // $(".timkiem").keyup(function(){
      //     var txt = $(".timkiem").val();
      //     $.post('ajax.php',{data:txt},function(data){
      //       $('#account').html(data);
      //     })
      // })
    });

    $(document).ready( function () {
      $('#my-Table').DataTable({
        "pageLength": 5,
        "lengthMenu": [6 , 12 , 15 , 20 , 25, 30]
      });
      
      $('#my-table2').DataTable({
        "pageLength": 5,
        "lengthMenu": [6 , 12 , 15 , 20 , 25, 30]
      });
} );
</script>
<!-- end hr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/jquery.dataTables.min.js"></script>
</body>
</html>