<?php
    session_start();
    $curre_hr=$_SESSION['id_user'];
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
    <title>Document</title>
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
    <h1>đây là trang hr</h1>
    <p>xin chào <?php echo $_SESSION['name'];?></p>
    <a href="../logout.php">logout</a>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Ngày đăng</th>
            <th scope="col">địa chỉ</th>
            <th scope="col">lương</th>
            <th scope="col">mô tả công việc</th>
            <th scope="col">thể loại</th>
            <th><button type="button" class="btn btn-success"><a href="add_job.php">Thêm mới</a></button></th>
        </tr>
        </thead>
        <tbody>
            <?php
            
            $query="select * from job_information where account_id='{$curre_hr}'";
            foreach($conn->query($query) as $row){
            ?>
            <tr>
                <td><?php echo $row['job_title']; ?></td>
                <td><?php echo $row['job_date']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['desciption']; ?></td>
                <td><?php echo $row['job_type']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger"><a href="update_job.php?id=<?php echo $row['job_id']; ?>">sửa</a></button>
                    <button type="button" class="btn btn-warning"><a href="delete_job.php?id=<?php echo $row['job_id']; ?>">xóa</a></button>
                </td>
                
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>