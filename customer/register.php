<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mystyle.css">
    <title>Đăng ký tài khoản</title>
</head>
<?php
//Display notification when register success 
if (isset($_GET['notification']) && $_GET['notification'] == 'success') {
    echo '<script>
            alert("Đăng ký thành công vui lòng đăng nhập, ID đăng nhập của bạn là: ' . $_GET['id'] . '");
            window.location.href = "./login.php";
        </script>';
}
?>
<body>
    <div style="width: 30%;margin-left: 35%;margin-top: 100px;">
        <h2 style="text-align: center;">Đăng ký</h2>
        <form method="post" action="./saveRegister.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Your's Fullname:</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Your's Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address:</label>
                <input type="text" name="address"  class="form-control" id="exampleInputEmail1" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">City:</label>
                <select name="city" class="form-control" id="exampleInputEmail1">
                    <?php
                    $data = array(
                        'An Giang', 'Bà Rịa – Vũng Tàu', 'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước', 'Bình Thuận', 'Cà Mau', 'Cần Thơ', 'Cao Bằng', 'Đà Nẵng', 'Đắk Lắk', 'Đắk Nông', 'Điện Biên', 'Đồng Nai', 'Đồng Tháp', 'Gia Lai', 'Hà Giang', 'Hà Nam', 'Hà Nội', 'Hà Tĩnh', 'Hải Dương', 'Hải Phòng', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa', 'Kiên Giang', 'Kon Tum', 'Lai Châu', 'Lâm Đồng', 'Lạng Sơn', 'Lào Cai', 'Long An', 'Nam Định', 'Nghệ An', 'Ninh Bình', 'Ninh Thuận', 'Phú Thọ', 'Phú Yên', 'Quảng Bình', 'Quảng Nam', 'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị', 'Sóc Trăng', 'Sơn La', 'Tây Ninh', 'Thái Bình', 'Thái Nguyên', 'Thanh Hóa', 'Thừa Thiên Huế', 'Tiền Giang', 'TP Hồ Chí Minh', 'Trà Vinh', 'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc', 'Yên Bái'
                    );
                    foreach ($data as $key => $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                </select>
                <!-- Get message from saveRegister.php -->
                <h5 style="color: red;"><?php if(isset($_GET['mess'])){echo $_GET['mess'];}?></h5>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>