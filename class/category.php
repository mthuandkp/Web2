<?php
    class category{
        function getAll(){
            $qry = 'SELECT * FROM `category`';
            $rs = mysqli_query(getConnection(), $qry);
            return getDataFromResultSet($rs,$qry);
        }

        function add($cate){
            $nextId = 1;
            //Initlization 'category' class
            $obj = new category;
            $data = end($obj->getAll());
            //Create new id from last Item
            if (!empty($data)) {
                $nextId = $data['CategoryID'] + 1;
            }            
            $name = $cate['Name'];
            $descript = $cate['Description'];
            $qry = "INSERT INTO `category`(`CategoryID`, `Name`, `Description`) VALUES ($nextId,'$name','$descript');";

            return mysqli_query(getConnection(),$qry);
        }
    }
?>