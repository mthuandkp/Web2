<?php
    //Insert file
    include_once('../otherFunc.php');
    include_once('../connection.php');
    include_once('../class/vegetable.php');
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
    <title>Add Vegetable</title>
</head>

<body>
<?php include_once('../submenu.php');?>
    <div style="width: 40%;margin-left: 30%;">
        <h2>Add Vegetable</h2>
        <form action="./add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Vegetable Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <select class="form-control" name="categoryid">
                    <?php
                    //Initialize 'category' class
                        $objCate = new category;
                        //Get all cattegory add display in selectbox
                        $data = $objCate->getAll();
                        foreach($data as $key => $value){
                            echo '<option value="'.$value['CategoryID'].'">'.$value['Name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Unit</label>
                <select class="form-control" name="unit">
                    <option value="kg">kg</option>
                    <option value="bó">bó</option>
                    <option value="túi">túi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input type="text" name="amount" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1">
            </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" style="font-size: 1.2rem;">
                </div>
                <div>
                <img src="" alt="empty" id="imagePreview" style="width: 30%;">
                </div>
            <button type="submit" class="btn btn-primary" style="font-size: 1.5rem;margin-top: 1rem;margin-bottom: 1rem;">Add</button>
        </form>
    </div>


    <script src="../jquery-3.6.0.js"></script>
    <script>
        //https://stackoverflow.com/questions/24837646/onchange-file-input-change-img-src-and-change-image-color
        
        function readUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        //catch event when choose image
        $(document).ready(function(){
            $("#exampleFormControlFile1").on('change',function(){
                readUrl(this);
            });
        });
    </script>
</body>
</html>