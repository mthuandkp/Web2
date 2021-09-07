<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    //insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/order.php');
    include_once('../class/vegetable.php');

    //Initialize 'vegetable' and 'order' class
    $objVege = new vegetable;
    $objOrder = new order;
    //Compute sum of order
    $sumOrder = 0;    
    
    //Init detail for cart
    $cartDetail = array();
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=>$value){
            //Get vegetable base on id each product in cart
            $vegetable = $objVege->getByID($value['id']);
            //Compute sum order
            $sumOrder += $value['number']*$vegetable['Price'];
            //Create new cart item
            $newCartItem = array(
                'VegetableID' => $value['id'],
                'Quantity' => $value['number'],
                'Price' => $vegetable['Price']
            );
            //Push into cart
            array_push($cartDetail,$newCartItem);
        }
    }
    //Create cart for user
    $cart = array(
        'CustomerID'=>$_SESSION['user']['CustomerID'],
        'Date' => date('Y-m-d'),
        'Total' => $sumOrder,
        'Note' => 'Khách mua hàng'
    );

    //Insert cart and detail into Database
    if($objOrder->addOrder($cart,$cartDetail)){
        //Decrease number in DB
        foreach($cartDetail as $key => $value){
            $vegetableInfo = $objVege->getByID($value['VegetableID']);
            $objVege->updateNumberById($value['VegetableID'],$vegetableInfo['Amount'] - $value['Quantity']);
        }
        //Unset cart
        $_SESSION['cart'] = array();
        unset($_SESSION['cart']);
        
        //direct to index
        echo '<script>alert("Thêm hóa đơn thành công");window.location.href = "./index.php";</script>';
    }
    else{
        //Display error and direct to index
        echo '<script>alert("Không thể thêm hóa đơn");window.location.href = "./index.php";</script>';
    }
?>