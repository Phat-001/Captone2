<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>danh sách thông tin sách</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div style="width:80%; margin:0 auto; color:blue; font-size: 20px">
        <h1 class="" style="color:black">THÔNG TIN DANH SÁCH CỦA SÁCH</h1>
        <table class="">
            <thead class="">
                <tr>
                    <th class="th">Tên sách</th>
                    <th class="th">Tên tác giả</th>
                    <th class="th">Số lượng</th>
                    <th class="th">Đơn giá</th>
                    <th class="th">Ngày phát hành</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    foreach ($connection->query("SELECT tensach,tentacgia,soluong,dongia,ngayphathanh FROM thongtinsach ") as $row) {
                        echo "<tr><td class=''>" . $row['tensach'] .
                            "</td><td class=''>" . $row['tentacgia'] .
                            "</td><td class=''>" . $row['soluong'] .
                            "</td><td class=''>" . $row['dongia'] .
                            "</td><td class=''>" . $row['ngayphathanh'];
                    }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage();
                }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>