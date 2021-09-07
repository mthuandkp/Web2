<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/mystyle.css">
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" style="margin-left: 1rem;font-size: 1.5rem;" href="../index.php">Market online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="../vegetable/index.php">Vegetable</a></li>
                <li class="nav-item active"><a class="nav-link" href="../cart/index.php">Cart</a></li>
                <?php
                if(!isset($_SESSION)){
                    session_start();
                }
                //already logged in 
                if (isset($_SESSION['user'])) {
                    echo '<li class="nav-item active"><a class="nav-link" href="../cart/history.php">History</a></li>
                            <li class="nav-item active"><a class="nav-link" href="../customer/logout.php">Logout</a></li>
                            <li class="nav-item"><p class="name-customer-menu">' . $_SESSION['user']['Fullname'] . '</p></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</body>

</html>