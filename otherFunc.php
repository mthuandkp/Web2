<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
//Convert number to money format
function convertToMoney($number)
{
    $i = strlen($number) - 1;
    $result =  "";

    while ($i >= 0) {
        while ($i - 3 >= 0) {
            $result = "." . substr($number, $i - 2, 3) . $result;
            $i -= 3;
        }
        if ($i >= 0) {
            $result =  substr($number, 0, $i + 1) . $result;
            break;
        }
    }
    return $result;
}

function uppercaseFirstLetter($str)
{
    $rs = "";
    $count = 0;
    $str = mb_strtolower($str);
    //Convert string to array
    $data = explode(' ', $str);
    //Uppercase first letter
    foreach ($data as $key => $value) {
        $rs .= ucfirst($value);
        $count++;
        if ($count != 0) {
            $rs .= ' ';
        }
    }
    return substr($rs, 0, -1);
}

function checkConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "123456";
    $db = "market";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    if ($conn->connect_error) {
        return false;
    }
    return true;
}
function getDataFromResultSet($rs)
{
    if (mysqli_num_rows($rs) <= 0) {
        return array();
    } else {
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
    }
    return $data;
}

?>
