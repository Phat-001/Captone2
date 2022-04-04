<?php
    // require('../include/connection.php');
    $a = $_POST['data'];
        $sql = "select * from account where (role > 1 and role = 3) and (name like '%$a%' or account_id like '%$a%' or email like '%$a%' or phone like '%$a%' or address like '%$a%' or username like '%$a%')";
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