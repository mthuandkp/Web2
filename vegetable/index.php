<?php
if (!isset($_SESSION)) {
    session_start();
}
//Insert file
include_once('../otherFunc.php');
include_once('../connection.php');
include_once('../class/vegetable.php');
include_once('../class/category.php');

$filterData = array();
$isFilter = false;
//Filter product
if (isset($_POST['filter'])) {
    $objVegetable = new vegetable;
    $filterArray = array();
    foreach ($_POST as $key => $value) {
        if (is_numeric($key)) {
            $filterArray[] = $key;
        }
    }
    $filterData = $objVegetable->getListByCateIDs($filterArray);
    $isFilter = true;
}

//Buy button click
if (isset($_POST['buy'])) {
    $id =  $_POST['id'];
    $newItem = array(
        'id' => $id,
        'number' => 1
    );

    //Create new vegetable class
    $objVegetable = new vegetable;
    $vegetable = $objVegetable->getByID($newItem['id']);

    //if product have already in cart
    $checkExist = false;
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $newItem['id']) {
                //Kiem tra so luong
                if ($vegetable['Amount'] < $value['number'] + 1) {
                    echo '<script>alert("Không đủ số lượng");window.location.href="index.php";</script>';
                    return;
                }
                $_SESSION['cart'][$key]['number'] += 1;
                $checkExist = true;
                break;
            }
        }
    }
    //Add new product into cart
    if ($checkExist == false) {
        if ($vegetable['Amount'] <= 0) {
            //print_r($vegetable);return;
            echo '<script>alert("Không đủ số lượng");window.location.href="index.php";</script>';
        }
        $_SESSION['cart'][] = $newItem;
    }
    echo '<script>alert("Thêm thành công");</script>';
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
    <title>Vegetable</title>
</head>

<body>
<?php include_once('../submenu.php');?>
    <div class="leftpanel">
        <h2 style="text-align: center;width: 100%;font-size: 2rem;">Category Name</h2>
        <form action="" method="post">
            <?php
            $objCate = new category;
            $data = $objCate->getAll();
            foreach ($data as $key => $value) {
                echo '<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" name="' . $value['CategoryID'] . '" style="background-color:red;">
                  </div>
                </div>
                <input type="text" class="form-control" value="' . $value['Name'] . '" style="color:#007bff;font-size:1.5rem;" readonly>
              </div>';
            }
            ?>
            <button name="filter" type="submit">Filter</button>
        </form>
    </div>
    <div class="rightpanel d-flex flex-wrap">
        <?php
        $obj = new vegetable;
        //Check Filter 
        if (!$isFilter) {
            $data = $obj->getAll();
        } else {
            $data = $filterData;
        }
        foreach ($data as $key => $value) {
            echo '<form action="" method="post">
                    <div class="card" style="width: 18rem;">
                        <input type="text" name="id" value="' . $value['VegetableID'] . '" style="display:none;">
                        <img class="card-img-top" src="../images/' . $value['Image'] . '" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">' . $value['VegetableName'] . '</h5>
                            <p class="card-text">Số lượng: ' . $value['Amount'] . '</p>
                            <p class="card-text" style="font-weight:600;">Giá: ' . convertToMoney($value['Price']) . ' VNĐ</p>
                            <button type="submit" name="buy" class="buy-button">Buy</button>
                        </div>
                    </div>
                </form>';
        }
        ?>
    </div>
</body>

</html>