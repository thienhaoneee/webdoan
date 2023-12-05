<?php
    session_start();
    include "Models/connect.php";

    spl_autoload_register('myModelClassLoader');
    function myModelClassLoader($className)
    {
        $path = 'Models/admin/';
        include $path . $className . '.php';
    };
        
    $ctr = 'main';
    if(isset($_GET['action'])){
        $ctr = $_GET['action'];
    }
    if(isset($_SESSION['admin']) || $ctr=='login') {
        include('./Controllers/admin/'.$ctr.'.php');
    } else {
        header("location: ./admin.php?action=login");
    }
    
    
?>
