<?php
class customer
{
    //get all customer
    function getAll()
    {
        $qry = 'SELECT * FROM `customers`';
        return getDataFromResultSet(mysqli_query(getConnection(), $qry));
    }
    function getByID($cusid)
    {
        $qry = "SELECT * FROM `customers` WHERE `CustomerID` = $cusid";
        return getDataFromResultSet(mysqli_query(getConnection(),$qry))[0];
    }

    function add($cus) {
        $obj = new customer;
        $nextId = 1;
        $data = $obj->getAll();
        if (!empty($data)) {
            $lastItem = end($data);
            //Create new id if order not empty
            $nextId = $lastItem['CustomerID'] + 1;
        }
        $pass = $cus['Password'];
        $name = $cus['Fullname'];
        $address = $cus['Address'];
        $city = $cus['City'];

        $qry = "INSERT INTO `customers`(`CustomerID`, `Password`, `Fullname`, `Address`, `City`) VALUES ($nextId,'$pass','$name','$address','$city')";
        
        return mysqli_query(getConnection(),$qry);
    }
}
