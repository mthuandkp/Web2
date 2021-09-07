<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/mystyle.css">
    <title>Đăng nhập</title>
</head>
<?php //Check login
    session_start();
    if (isset($_SESSION['user'])) {
        echo '<script>alert("Bạn đã đăng nhập. Trình duyệt sẽ chuyển đến trang vegetable/index.php!!!");window.location.href = "../vegetable/index.php";</script>';
        //Stop page 
        return;
    }
?>
<body>
    <div style="width: 30%;margin-left: 35%;margin-top: 100px;">
        <h2 style="text-align: center;">Đăng nhập</h2>
        <form method="post" action="./checkLogin.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Your's ID:</label>
                <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your's ID">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <!-- Get message from checkLogin.php -->
                <h5 style="color: red;">
                <?php if (isset($_GET['mess'])) {echo $_GET['mess'];} ?>
                </h5>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button class="btn btn-primary"><a href="./register.php" style="color: white;text-decoration: none;">Register</a></button>
        </form>
    </div>
</body>

</html>