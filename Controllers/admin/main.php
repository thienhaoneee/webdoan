<?php
    $act = 'main';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'main':
            include('./views/admin/main.php');
            break;
        
        default:
            echo "invalid case";
    }
    
?>