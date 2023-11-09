<?php 
    $action = isset($_GET['action']) ? $_GET['action']: '';
    if($action !== '') {
        include('./views/single.php');
    }

?>