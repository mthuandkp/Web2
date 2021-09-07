<?php
    //Insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/category.php');
    //Initialize 'category' class
    $obj = new category;
    $newID = 1;
    //Get All data
    $data = $obj->getAll();
    //Get last element of categgory
    if(!empty($data)){
        $lastItem = end($data);
        //Get info fo category
        $newID = $lastItem['CategoryID']+1;
    }
    $name = $_POST['name'];
    $description = $_POST['description'];
    $qry = "INSERT INTO `category`(`CategoryID`, `Name`, `Description`) VALUES ($newID,'$name','$description');";
    //Get all Category data
    $data =  $obj->getAll();
    //Exist name in DB
    foreach($data as $key=>$value){
        if($value['Name'] == $name){
            //Display notification
            echo '<script>alert("Tên đã tồn tại vui lòng chọn tên khác");window.location.href = "./index.php";</script>';
            return;    
        }
    }
    //Add category
    if(mysqli_query(getConnection(),$qry)){
        echo '<script>alert("Thêm thành công");window.location.href = "./index.php";</script>';
    }
    else{
        echo '<script>alert("Không thể thêm");window.location.href = "./index.php";</script>';
    }
?>