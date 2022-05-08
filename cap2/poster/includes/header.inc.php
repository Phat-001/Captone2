<?php
// session start
session_start();

// Authenticated User
if (!isset($_SESSION['id_user'])) {
  header("Location: ../../index.php");
}

// Database connection file
$servername = "localhost";
    $database = "rabbit_job";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// functions
function redirectTo($url)
{
    header('Location: ' . $url);
}

//clear users injection
function validateFormData($formData)
{
    $formData = trim(
        stripslashes(
            htmlspecialchars(
                strip_tags(
                    str_replace(array('(', ')'), '', $formData)
                ),
                ENT_QUOTES
            )
        )
    );
    return $formData;
}

// Alert
function showAlert($message, $class)
{
    return '<div class="alert alert-' . $class . ' mt-3">
  <button type="button" class="close" data-dismiss="alert">&times;</button>' .
    $message . '
  </div>';
}

// Authenticated
function Authenticated()
{
    if (isset($_SESSION['USER_ID'])) {
        redirectTo("/cap2/poster");
    }
}
function find($table, ?string $field = '*')
{
    global $conn;
    $q = "SELECT $field FROM `$table`";
    $result = mysqli_query($conn, $q);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return mysqli_error($conn);
    }
}

// Where
function findWhere($table, $field, $value, ?int $visible = 1, ?int $userId = null)
{
    global $conn;
    if ($visible == 1) {
        $q = "SELECT * FROM `$table` WHERE $field= $value";
    } else {
        $q = "SELECT * FROM `$table` WHERE $field= '$value' AND `user_id` = '$userId'";
    }
    $result = mysqli_query($conn, $q);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rabbit job
  </title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,700i,800&display=swap" rel="stylesheet">

  <!--  Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="assets/fa/font-awesome.min.css"> -->
  <script src="https://kit.fontawesome.com/07c04c5cdb.js" crossorigin="anonymous"></script>
  <!-- CSS -->

  <style>
          * {
              -webkit-box-sizing: border-box;
                      box-sizing: border-box;
              font-family: 'Nunito', sans-serif;
            }

            li.nav-item {
              margin-left: 30px;
            }

            footer {
              background: #efefef;
              color: black;
            }

            @media only screen and (max-width: 767.98px) {
              .nav-link {
                text-align: center;
              }
              #tech .row div {
                padding: 20px 0;
              }
            }
  </style>
</head>

<body>
  <!-- Navbar -->
  <?php require_once "navbar.inc.php";
