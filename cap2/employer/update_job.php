<?php
// Kết nối Database
require('../include/connection.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$query = mysqli_query($conn, "select * from job_information where job_id='{$_GET['ida']}'");
$row = mysqli_fetch_assoc($query);
if (isset($_POST['submit_update_job'])) {
    $job_date = date('Y-m-d H:i:s');
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $description = $_POST['description'];
    $job_type = $_POST['job_type'];
    $job_title = $_POST['job_title'];
    $level = $_POST['level'];

    if (empty($_FILES["image"]["name"])) {
        $target_file = $row['logo'];
    }else if(isset($_FILES["image"])){
        $target_file = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "../images/logo_company/" . $target_file);
    }
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    // move_uploaded_file($_FILES['image']['tmp_name'], $target_file);



    $sql = "UPDATE `job_information` SET job_title='{$job_title}', job_type='{$job_type}', description='{$description}', salary='{$salary}', address='{$address}', job_date='{$job_date}', level = '{$level}', logo = '{$target_file}' WHERE job_id='{$_GET['ida']}'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('cập nhật việc làm thành công')</script>";
        header('Location:index.php');
    } else {
        echo "<script>alert('cập nhật việc làm thất bại')</script>" . $conn->error;
    }


    $conn->close();
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
    <link rel="stylesheet" href="../stylemain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sửa việc làm</title>
    <style>
        h2 {
            text-align: center;
        }

        .text-input {
            width: 360px;
            color: rgb(97, 93, 93);
            padding: 7px 12px;
            height: 40px;
            border: solid 1px rgba(0, 0, 0, 0.4);
            background-color: #fff;
        }

        #btn-cap2 {
            padding: 7px 35px;
            cursor: pointer;
            background: #79b530;
            border: none;
        }
    </style>

<body>
    <form method="POST" class="form" enctype="multipart/form-data">
        <div>
            <h2>Sửa thông tin việc làm</h2>
            <a href="index.php"><i class="fa-solid fa-house-user"></i></a>
        </div>
        <table class="table table-striped">
            <tr>
                <th><label for="">Tiêu đề:</label></th>
                <td><input type="text" value="<?php echo $row['job_title']; ?>" name="job_title" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">logo công ty:</label></th>
                <td><input type="file" value="" name="image" class="text-input form-control"></td>
            </tr>

            <tr>
                <th><label for="">Địa chỉ:</label></th>
                <td><input type="text" value="<?php echo $row['address']; ?>" name="address" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Lương:</label></th>
                <td><input type="number" value="<?php echo $row['salary']; ?>" name="salary" class="text-input form-control" required></td>
            </tr>
            <tr>
                <th><label for="">Mô tả công việc:</label></th>
                <td>
                    <textarea  class="form-control" rows="5" cols="80" name="description" id="comment" required><?php
                    $a = $row['description'];
                    echo $a; ?></textarea>
                </td>

            </tr>
            <tr>
                <th><label for="">Cấp độ:</label></th>
                <td>
                    <select name="level" id="level">
                        <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                        <option value="Intern">Intern</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Lead">Lead</option>
                        <option value="Manager">Manager</option>
                        <option value="Senior Leader">Senior Leader</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="">Loại công việc:</label></th>
                <td>
                    <select name="job_type" id="job_type">
                        <option value="<?php echo $row['job_type']; ?>"><?php echo $row['job_type']; ?></option>
                        <option value="Full time">Full time</option>
                        <option value="Part time">Part time</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Cập nhật" class="btn btn-success" name="submit_update_job"></td>
            </tr>
        </table>

    </form>

</body>

</html>

