<?php
    //Destroy all session
    session_start();
    session_unset();
    session_destroy();
    //Direct to index.php
    echo '<script>window.location.href = "../index.php";</script>';
?>