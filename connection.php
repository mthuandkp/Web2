<?php
function getConnection(){
    //Server infomation
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "123456";
    $db = "market";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    mysqli_query($conn,"set names 'utf8'");
    return $conn;
}

?>