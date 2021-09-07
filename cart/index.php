<?php
session_start();
//Insert file
include_once('../otherFunc.php');
include_once('../connection.php');
include_once('../class/vegetable.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mystyle.css">
    <title>Cart Index</title>
</head>

<body>
    <?php include_once('../submenu.php');?>
    <div style="width: 80%;margin-left: 10%;">
        <h1>Cart</h1>
        <table class="table">
            <thead>
                <tr style="font-size: 1.5rem;">
                    <th scope="col" style="width: 5rem;">#</th>
                    <th scope="col" style="width: 5rem;">ID</th>
                    <th scope="col" style="width: 15rem;">Name</th>
                    <th scope="col" style="width: 10rem;">Picture</th>
                    <th scope="col" style="width: 10rem;">Price</th>
                    <th scope="col" style="width: 5rem;">Amount</th>
                    <th scope="col" style="width: 15rem;font-weight: 600;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //If have product in cart
                if (isset($_SESSION['cart'])) { 
                    //Initialize 'vegetable' class
                    $objVe = new vegetable;
                    $totalSum = 0;
                    $totalPrice = 0;
                    $count = 1;
                    //Loop each element cart
                    foreach ($_SESSION['cart'] as $key => $value) {
                        //Get vagetable base on id
                        $vegetable = $objVe->getByID($value['id']);
                        //totalnum = totalnum + number;
                        $totalSum += $value['number'];
                        //totalprice = totalprice + (number*price);
                        $totalPrice += $value['number'] * $vegetable['Price'];
                        echo '<tr style="font-size: 1.3rem;">
                            <th scope="row">' . $count++ . '</th>
                            <td>' . $vegetable['VegetableID'] . '</td>
                            <td>' . $vegetable['VegetableName'] . '</td>
                            <td><img src="../images/' . $vegetable['Image'] . '" alt="image" class="image-cart"></td>
                            <td>' . convertToMoney($vegetable['Price']) . ' VNĐ</td>
                            <td>' . $value['number'] . '</td>
                            <td style="font-weight:600;">'.convertToMoney($vegetable['Price'] * $value['number']) .' VNĐ</td>
                        </tr>';
                    }
                    echo '<tr style="font-size:1.5rem;">
                    <th scope="row">Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>'.$totalSum.'</td>
                    <td style="font-weight:600;color:red;">' . convertToMoney($totalPrice) . ' VNĐ</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- Order button -->
        <form action="" method="post">
            <button class="order-button-cart" name="orderbtn" type="submit">Order</button>
        </form>
    </div>
</body>
</html>

<?php
//Order proccess
if (isset($_POST['orderbtn'])) {
    //Not login
    if (!isset($_SESSION['user'])) {
        echo '<script>alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để mua hàng");window.location.href = "../customer/login.php";</script>';
    }
    //Not have product in cart
    else if (!isset($_SESSION['cart'])) {
        echo '<script>alert("Chưa có sản phẩm trong giỏ hàng");</script>';
    }
    //Direct to saveOrder.php
    else {
        echo '<script>window.location.href = "./saveorder.php";</script>';
    }
}
?>