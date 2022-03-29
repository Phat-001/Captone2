<?php
   require_once("connect.php");

    $manv = $_GET["manv"];
    $sql= "DELETE from nhanvien where manv= '$manv'";
    $query = mysqli_query($conn,$sql);
    header("location: nhanvien.php");

?>