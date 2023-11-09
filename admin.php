<?php
    session_start();
    include "Models/connect.php";

    spl_autoload_register('myModelClassLoader');
    function myModelClassLoader($className)
    {
        $path = 'Models/admin/';
        include $path . $className . '.php';
    };
        
    $ctr = 'login';
    if(isset($_GET['action'])){
        $ctr = $_GET['action'];
    }
    if(isset($_SESSION['admin'])) {
        
        header("location: ./main.php?action=main");

    } else {
        include('./Controllers/admin/'.$ctr.'.php');
    }
?>
