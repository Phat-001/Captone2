

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nv.css">
</head>
<body>
    <div class="menu">
        <ul>
            <div class="menu-right">
              <li><a href="">Trang chủ</a></li>
              <li><a href="nhanvien.php">Nhân viên</a></li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="logout.php">logout</a></li>
            </div>
        </ul>
          
    </div>
    <table>
        <thead>
        <tr class="table-headers">
          <th>mavn</th>
          <th>Họ và tên</th>
          <th>Giới tính</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>giờ làm việc 1 ngày</th>
          <th>Lương</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
            
            <?php
                require_once("connect.php");
	     
                try{
                    foreach($conn->query("SELECT * FROM nhanvien ORDER BY manv ASC ") as $row) {
                        echo "<tr> 
                               <td style='width:20pt; text-align: center' scope='row'>" .$row['manv'] . "</td>
                                <td>" . $row['hoten'] . "</td>
                                <td>" .$row['gioitinh'] . "</td> 
                                <td>" .$row['email'] ."</td>
                                <td>" .$row['sdt'] ."</td>
                                <td style='text-align: left; font-weight:bold'>" . $row['giolammotngay'] . "</td>
                                <td style='text-align: left; font-weight:bold'>" . $row['luong'] .  "</td>
                                <td> <a href='edit.php?manv=".$row["manv"]."'> <button class='btn btn-danger'>EDIT</button> </a></td>
                                <td> <a href='delete.php?manv=".$row["manv"]."'> <button class='btn btn-danger'>DELETE</button> </a></td>
                                                              
                            </tr>";                       
                                                
                        }                          
                    }
                        catch (PDOException $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                       }
              
            ?>
            </tbody>

      </table>
      
        <div  style="float:right; background-color:black; color:wheat; margin-right:auto; width:auto; height:40px; text-decoration: none; ">
          <a style="text-decoration: none;"  href="them.php"><button> Add Nhân viên</button></a>
          
	    </div>
    
</body>
</html>