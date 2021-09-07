<?php
    session_start();
    //Include file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/order.php');
    include_once('../class/vegetable.php');
    
    //Check login already ?
    if(!isset($_SESSION['user'])){
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
    <title>Detail</title>
</head>
<body>
    <?php include_once('../submenu.php');?>
    <div style="width: 80%;margin-left: 10%;">
        <h1>Cart Detail</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 5rem;">#</th>
                    <th scope="col"  style="width: 20rem;">Name</th>
                    <th scope="col" style="width: 15rem;">Picture</th>
                    <th scope="col" style="width: 15rem;">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col" style="width: 15rem;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //if have id get from history
                    if(isset($_GET['id'])){
                        //Initialize 'order' class
                        $objOrder = new order;
                        //Initialize 'vegetable' class
                        $objVege = new vegetable;
                        //Get all order by id
                        $data = $objOrder->getOrderDetail($_GET['id']);
                        $totalNum = 0;
                        $totalPrice = 0;
                        //Loop each element
                        foreach($data as $key=>$value){
                            //Get information vegetable base on VegetableID of $value
                            $vegetableInfor = $objVege->getByID($value['VegetableID']);
                            //totalnum = totalnum + number;
                            $totalNum += $value['Quantity'];
                            //totalprice = totalprice + (number*price);
                            $totalPrice += $value['Quantity']*$value['Price'];
                            //Display row
                            echo '<tr>
                            <th scope="row">'.$value['VegetableID'].'</th>
                            <td>'.$vegetableInfor['VegetableName'].'</td>
                            <td><img src="../images/'.$vegetableInfor['Image'].'" alt="image" style="width: 8rem;height: 8rem;border-radius: 1rem;"></td>
                            <td>'.convertToMoney($value['Price']).' VNĐ</td>
                            <td>'.$value['Quantity'].'</td>
                            <td style="font-weight:600;">'.convertToMoney($value['Price']*$value['Quantity']).' VNĐ</td>
                            </tr>';
                        }
                        //Display Total and money
                        echo '<tr>
                        <th scope="row">Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>'.$totalNum.'</td>
                        <td style="color:red;font-weight:600;">'.convertToMoney($totalPrice).' VNĐ</td>
                        </tr>';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>

</html>