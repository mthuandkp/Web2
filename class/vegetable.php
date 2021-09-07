<?php
class vegetable
{
    function getAll()
    {
        $qry = "SELECT * FROM `vegetable`";
        return getDataFromResultSet(mysqli_query(getConnection(), $qry));
    }

    function getListByCateID($cateid)
    {
        $qry = "SELECT * FROM `vegetable` WHERE `CategoryID` = $cateid";
        return getDataFromResultSet(mysqli_query(getConnection(), $qry));
    }
    //$cateids = array(1,3,4,7);
    function getListByCateIDs($cateids)
    {
        $obj = new vegetable;
        $result = array();
        //Duyet qua tung categoryID
        foreach ($cateids as $key => $value) {
            //Lay san pham tuong ung
            $arr = $obj->getListByCateID($value);
            //Neu lay duoc san pham thi them vao result
            if ($arr != null) {
                foreach ($arr as $subkey => $subvalue) {
                    array_push($result, $subvalue);
                }
            }
        }
        return $result;
    }

    function getByID($vegetableID)
    {
        $qry = "SELECT * FROM `vegetable` WHERE `VegetableID` = $vegetableID";
        return getDataFromResultSet(mysqli_query(getConnection(), $qry))[0];
    }

    function updateNumberById($id, $number)
    {
        return mysqli_query(getConnection(), "UPDATE `vegetable` SET `Amount`=$number WHERE `VegetableID`=$id ;");
    }

    function add($vegetable)
    {
        $obj = new vegetable;
        $nextId = 1;
        //Get all data
        $data = $obj->getAll();
        if(!empty($data)){
            //Get next id for vegetable
            $lastItem = end($data);
            $nextId = $lastItem['VegetableID'] + 1;
            
        }
        //Add Vegetable
        $cateID = $vegetable['CategoryID'];
        $name = $vegetable['VegetableName'];
        $unit = $vegetable['Unit'];
        $amount = $vegetable['Amount'];
        $image = $vegetable['Image'];
        $price = $vegetable['Price'];
        $currentDate = date('Y-m-d'); 
        $qry = "INSERT INTO `vegetable`(`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES ($nextId,$cateID,'$name','$unit',$amount,'$image',$price);";
        return mysqli_query(getConnection(),$qry);
    }
}
?>