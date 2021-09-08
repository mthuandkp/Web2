<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
    /*include_once('./connection.php');
    include_once('./class/category.php');
    include_once('./class/customer.php');
    include_once('./class/order.php');
    include_once('./class/vegetable.php');

    $obj = new vegetable;
    $cate = array(
        'CategoryID' => 199,
        'Name' => 'Fruit',
        'Description' => 'The kind that can use be eaten without cooking'
    );
    echo '<pre>';
    print_r($obj->getByID(1));
    echo '</pre>';*/

    $s = "Hello hy,";
    $pattern = '/[~!@#$%^&*(){}?\\\\+\*\/\-\[\].,]/';

    if(preg_match($pattern,$s) == true){
        echo 'True';
    }
    else{
        echo 'false';
    }
    dfhvndjndvjnk
?>