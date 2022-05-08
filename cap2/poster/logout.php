<?php
session_start();
require_once './includes/header.inc.php';

    session_destroy();

    header("Location: ../../index.php");
?>