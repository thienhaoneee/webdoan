<?php 

    $brand = isset($_GET['brand'])? $_GET['brand'] : '';
    if( $brand == '' ) {
        $brand = 'shop';
    }
    switch($brand) {
        case 'shop':
            include('./views/shop.php');
            break;
        case 'samsung':
        case 'apple':  
            include('./views/shop.php');
            break;
    }
    

?>