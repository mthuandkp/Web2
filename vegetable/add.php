<?php
    //Insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/vegetable.php');
    //Init 'vegetable' class
    $objVege = new vegetable;

    if(!isset($_FILES)){
        echo '<script>alert("Vui lòng chọn hình ảnh cho sản phẩm");window.location.href = "./new.php";</script>';
        return;
    }
    //get extension format
    $extension = "";
    if(isset($_FILES['image'])){
        $extension = getExtension($_FILES['image']['name']);
    }
    //check extension
    if($extension != '.jpg' && $extension != '.png'){
        echo '<script>alert("Hình ảnh phải là jpg hoặc png");window.location.href = "./new.php";</script>';
        return;
    }
    
   //Check file size
   if($_FILES['image']['size']/1048576.0 > 2){
    echo '<script>alert("Kích thước hình ảnh phải <= 2mb");window.location.href = "./new.php";</script>';
    return;
}
    //Create new vegetable from index request
    $vegetable = array(
        'CategoryID' => $_POST['categoryid'],
        'VegetableName' => $_POST['name'],
        'Unit' => $_POST['unit'],
        'Amount' => $_POST['amount'],
        'Price' => $_POST['price'],
        'Image' => $_FILES['image']['name']
    );
    //Find empty in each data fields
    foreach($vegetable as $key=>$value){
        if(str_replace(" ","",$value) == ""){
            echo '<script>alert("Chưa điền '.$key.'");window.location.href = "./new.php";</script>';
            return;
        }
    }
    //Check amount
    if(is_numeric($vegetable['Amount']) == false || $vegetable['Amount'] != (int)$vegetable['Amount'] || $vegetable['Amount'] <= 0){
        echo '<script>alert("Số lượng phải là số nguyên > 0");window.location.href = "./new.php";</script>';
        return;
    }

    //check Exist Name
    $data = $objVege->getAll();
    if(!empty($data)){
        foreach($data as $key => $value){
            if(convertStringToEnglish($vegetable['VegetableName']) == convertStringToEnglish($value['VegetableName'])){
                echo '<script>alert("Tên sản phẩm \"'.$vegetable['VegetableName'].'\" đã tồn tại");window.location.href = "./new.php";</script>';
        return;
            }
        }
    }
    /**************************** */
    //Check price
    if(is_numeric($vegetable['Price']) == false || (int)$vegetable['Price'] != $vegetable['Price'] || $vegetable['Price'] <= 0){
        echo '<script>alert("Giá tiền phải là số > 0");window.location.href = "./new.php";</script>';
        return;
    }
    
    //Get Curent Date
    $currentDate = date('Y-m-d_H-i-s'); 
    //Copy image to server
    if (!move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$currentDate.$_FILES['image']['name'])){
        echo '<script>alert("Không thể upload ảnh lên Server");window.location.href = "./new.php";</script>';
        return;
    }

    $vegetable['Image'] = $currentDate.$_FILES['image']['name'];

    if($objVege->add($vegetable)){
        echo '<script>alert("Thêm thành công");window.location.href = "./new.php";</script>';
        return;
    }
    else{
        echo '<script>alert("Không thể Thêm");window.location.href = "./new.php";</script>';
        return;
    }

    function getExtension($nameImage){
        $i = strlen($nameImage)-1;
        while($i > 0 && $nameImage[$i] != '.'){
            $i--;
        }
        if($i > 0){
            return substr($nameImage,$i);
        }
        return '';
    }
?>

