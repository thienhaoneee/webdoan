<?php 
    $act = 'cart';

    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    switch($act) {
        case 'addtocart':
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $cart = new cart();
                $check = $cart->check_item($id);
                if(!$check) {
                    $cart->add_item($id);
                } else {
                    foreach($_SESSION['cart'] as $key=>$item) {
                        if($item['id'] == $id){
                            $_SESSION['cart'][$key]['quantity'] += 1; 
                        }
                    }
                }

                $response = [
                    'error'=>false,
                    'message'=>$_SESSION['cart']
                ];
                echo json_encode($response);
            }
            break;
        case 'update':
            if(isset($_POST['id'])){
                $cart = new cart();
                $id = $_POST['id'];
                $quantity = $_POST['quantity'];

                $check = $cart->update_item($id,$quantity);
                if(count($check) != 0) {
                    $totalAll = $cart->getTotalAll();
                    $response = [
                        'error'=>false,
                        'product'=>$check,
                        'total'=>$totalAll
                    ];
                } else {
                    $response = [
                        'error'=>true
                    ];
                }
                echo json_encode($response);

            }

            break;
        case 'delete':
            if(isset($_POST['id'])){
                $cart = new cart();

                $id = $_POST['id'];
                foreach($_SESSION['cart'] as $key=>$item){
                    if($item['id'] == $id) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
                $totalAll = $cart->getTotalAll();

            }
            $response = [
                'error' => false,
                'message' => 'Xóa Thành Công',
                'total' => $totalAll
            ];
            echo json_encode($response);
            break;
        default: 
            include('./views/cart.php');
            
    }
?>