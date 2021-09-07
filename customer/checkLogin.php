<?php
//Insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/customer.php');

    //Error connection
    if(checkConnection() == false){
        echo '<script>window.location.href = "./login.php?mess=Không thể kết nối tới server";</script>';
        return;
    }
    session_start();
    $id = str_replace(' ','',$_POST['id']);
    $pass = str_replace(' ','',$_POST['pass']);;
    $obj = new customer;
    $cus = $obj->getByID($id);

    //Empty input
    if($id == '' || $pass == ''){
        echo '<script>window.location.href = "./login.php?mess=Không được để trống ID và Password";</script>';
    }
    //Account not exist
    else if($cus == null){
        echo '<script>window.location.href = "./login.php?mess=Tài khoản không tồn tại";</script>';
    }
    else{
        //Wrong password
        if($cus['Password'] != $pass){
            echo '<script>window.location.href = "./login.php?mess=Sai mật khẩu";</script>';
        }
        else{
            //Login successfull
            $_SESSION['user'] = $cus;
            //Direct to index
            echo '<script>window.location.href = "../vegetable/index.php";</script>';
        }
    }
?>