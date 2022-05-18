<?php
if(isset($_GET['nama'])){
    $name= $_GET['nama'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    
    ob_clean();
    flush();
    readfile("../file_cv/".$name); //showing the path to the server where the file is to be download
    exit;
    header('location:index.php');
}

?>