<?php
    session_start();
    spl_autoload_register('myModelClassLoader');
    function myModelClassLoader($className)
    {
        $path = 'Models/';
        include $path . $className . '.php';
    };
    

    $req = '';
    if(isset($_GET['req'])){
        $ctr = $_GET['req'];
    }
    include('./Controllers/'.$ctr.'.php');

?>