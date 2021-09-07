<?php
class order
{
    function getAllOrder($cusID)
    {
        $qry = "SELECT * FROM `orders` WHERE `CustomerID` = $cusID";
        return getDataFromResultSet(mysqli_query(getConnection(),$qry));
    }

    function getOrderDetail($orderid)
    {
        $qry = "SELECT * FROM `orderdetail` WHERE `OrderID` = $orderid";
        return getDataFromResultSet(mysqli_query(getConnection(),$qry));
    }
    function addOrder($order, $detail)
    {
        $nextId = 1;
        //Get All Order from Database
        $data = getDataFromResultSet(mysqli_query(getConnection(),"SELECT * FROM `orders`"));
        if(!empty($data)){
            $lastItem = end($data);
            //Create new id from lastItem of $data
            $nextId = $lastItem['OrderID'] + 1;
        }
        
        //Information of order
        $cusid = $order['CustomerID'];
        $date = $order['Date'];
        $total = $order['Total'];
        $note = $order['Note'];

        $qry = "INSERT INTO `orders`(`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES ($nextId,'$cusid','$date','$total','$note');";
        $detailqry = "";
        foreach ($detail as $key => $value) {
            $vegeid = $value['VegetableID'];
            $quantity = $value['Quantity'];
            $price = $value['Price'];
            $detailqry .= "INSERT INTO `orderdetail`(`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES ($nextId,$vegeid,$quantity,$price);";
        }
        return mysqli_multi_query(getConnection(), $qry . $detailqry);
    }
}
?>
