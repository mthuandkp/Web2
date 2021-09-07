<?php
session_start();
//Insert file
include_once('../otherFunc.php');
include_once('../connection.php');
include_once('../class/order.php');

//Check login already ?
if (!isset($_SESSION['user'])) {
    echo '<script>alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để xem lich sử");window.location.href = "../customer/login.php";</script>';
}
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
    <title>History</title>
</head>

<body>
    <?php include_once('../submenu.php');?>
    <div style="width: 80%;margin-left: 10%;">
        <h1>History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Initialize 'order' class
                $obj = new order;
                //Get all Order based on id of user login
                $data = $obj->getAllOrder($_SESSION['user']['CustomerID']);
                //Loop array display each row
                $count = 0;
                foreach ($data as $key => $value) {
                    echo '<tr>
                        <th scope="row">' . ++$count . '</th>
                        <th scope="row">' . $value['OrderID'] . '</th>
                        <td>' . $value['Date'] . '</td>
                        <td>' . convertToMoney($value['Total']) . ' VNĐ</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="./detail.php?id=' . $value['OrderID'] . '" class="image-cart" style="color:white;">Detail</a>
                            </button>            
                        </td>
                    </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>