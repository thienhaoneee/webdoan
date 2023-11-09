<?php
    $act = 'sanpham';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'sanpham':
            include('./views/admin/sanpham/list.php');
            break;
        case 'add':
            include('./views/admin/sanpham/add.php');
            break;
        default:
            echo "invalid case";
    }
    
?>