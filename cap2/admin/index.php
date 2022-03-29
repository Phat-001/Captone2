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
    </style>
</head>
<body>
    <h1>Đây là trang admin</h1>
    <span>hi! <?php echo $_SESSION['name'];?></span>
    <a href="../logout.php">logout</a>

    <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">email</th>
      <th scope="col">Vai trò</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">địa chỉ</th>
      <th scope="col">username</th>
      <th><button type="button" class="btn btn-success"><a href="add_account.php">Thêm mới</a></button></th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "select * from account where role > 1";
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
                echo "Ứng viên";
                break;
                case '4':
                  echo "supporter";
                  break;
                  case '5':
                    echo "người đăng bài";
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
        <button type="button" class="btn btn-danger"><a href="update_account.php?user_id=<?php echo $row['account_id']; ?>">sửa</a></button>
        <button type="button" class="btn btn-warning"><a href="delete_account.php?user_id=<?php echo $row['account_id']; ?>">xóa</a></button>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>

</body>
</html>