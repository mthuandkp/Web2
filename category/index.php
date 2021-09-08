<?php
//Insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/category.php');
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
    <title>Category Index</title>
</head>

<body>
<?php include_once('../submenu.php');?>
    <div class="leftpanel" style="background-color: white;">
        <form action="./add.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" style="color: black;">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" style="color: black;">Description</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="description">
            </div>
            <button type="submit" style="float: left;font-size: 1.3rem;">Add</button>
        </form>
    </div>
    <div class="rightpanel" style="background-color: white;">
        <h2>Category</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Initialize 'category' class
                    $obj = new category;
                    //Get all data
                    $data = $obj->getAll();
                    foreach($data as $key=>$value){
                        echo '<tr>
                        <th scope="row">'.$value['CategoryID'].'</th>
                        <td>'.$value['Name'].'</td>
                        <td>'.$value['Description'].'</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>