<?php
session_start();
require('./include/connection.php');
    /*
        role 1 là admin (admin899 pass: 123456)
        role 2 là hr  (hr899 pass: 123456)
        role 3 là ứng viên  (user899  pass: 123456)
        role 4 là supporter  (suporter899  pass: 123456)
        role 5 là người đăng bài (poster899  pass: 123456)
    */
    // if($_SERVER['REQUEST_METHOD']=='POST')
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // If form submitted, insert values into the database.
    if (isset($_POST['submit-login'])){
            // removes backslashes
        $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        //Checking is user existing in the database or not
            $query = "SELECT * FROM `account` WHERE username='$username'
    and password='".md5($password)."'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
            if($rows==1){
            $_SESSION['username'] = $username;
            $_SESSION['name']= $row['name'];
            $_SESSION['img']= $row['img'];
            $_SESSION['user_role']= $row['role'];
            $_SESSION['unique_id']= $row['unique_id'];
            $_SESSION['id_user']= $row['account_id'];
                // Redirect user to index.php
                if($row['role']==3){
                    header("Location: homepage.php");
                }if($row['role']==1){
                    header("Location: ./admin/index.php");
                }
                if($row['role']==2){
                    header("Location: ./employer/index.php");
                }
                if($row['role']==4){
                    header("Location: ./supporter/index.php");
                }
                if($row['role']==5){
                    header("Location: ./poster/index.php");
                }
             }else{
        echo "<script>alert('username or password is incorrect')</script>";
        }
        }else{

        }



    
?>