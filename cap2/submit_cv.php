<?php
    session_start();
    require('./include/connection.php');
    
// Kiểm tra xem biểu mẫu đã được gửi chưa
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
        $filename = $_FILES["file"]["name"];
    
        if(file_exists("file_cv/" . $filename)){
            echo $filename . " đã tồn tại.";
        } else{
            move_uploaded_file($_FILES["file"]["tmp_name"], "file_cv/" . $filename);
            echo "Tệp của bạn đã đăng tải thành công";
        } 
    } else{
        echo "Error: " . $_FILES["file"]["error"];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nộp CV</title>
    <style>
        h1{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="upload">
    </form>
    <?php
        $file = scandir("file_cv");

        for($i = 2; $i < count($file); $i++){
            echo $file[$i];
        }
       
        
        // echo count($file);
        // echo "<pre>";
        // var_dump(scandir("file_cv"));
        // echo "</pre>";
        // echo $file[3];
    ?>
</body>
</html>