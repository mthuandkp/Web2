<?php
include_once('../otherFunc.php');
include_once('../connection.php');
include_once('../class/customer.php');
session_start();
$fullname = $_POST['fullname'];
$pass = $_POST['pass'];
$address = $_POST['address'];
$city = $_POST['city'];
$obj = new customer;
//Empty input
if (str_replace(" ", "", $fullname) == '' || strlen($fullname) <= 3) {
    echo '<script>window.location.href = "./register.php?mess=Tên người dùng phải lớn hơn 3 ký tự ";</script>';
} else if (preg_match('/[~!@#$%^&*(){}?\\\\+\*\/\-\[\].,]/', $fullname) == true) {
    echo '<script>window.location.href = "./register.php?mess=Tên người dùng không chứa số và ký tự đặc biệt ";</script>';
}
//Mat khau khong hop le
else if (strlen($pass) <= 3 || strpos($pass, ' ')) {
    echo '<script>window.location.href = "./register.php?mess=Mật khẩu phải lớn hơn 3 ký tự và không chứa khoảng trắng";</script>';
} else {
    $pattern = "/\s+/";
    $fullname = preg_replace($pattern, ' ', $fullname);
    $fullname = uppercaseFirstLetter($fullname);
    $address = preg_replace($pattern, ' ', $address);
    //Them vao DB
    $obj = new customer;
    $cus = array(
        'Password' => $_POST['pass'],
        'Fullname' => $fullname,
        'Address' => $address,
        'City' => $_POST['city']
    );
    if ($obj->add($cus)) {
        $lastCusId = end($obj->getAll())['CustomerID'];
        echo '<script>alert("Đăng ký thành công vui lòng đăng nhập, ID đăng nhập của bạn là: ' . $lastCusId . '");window.location.href = "./login.php";</script>';
    } else {
        echo '<script>window.location.href = "./register.php?mess=Không thể thêm";</script>';
    }
}

?>