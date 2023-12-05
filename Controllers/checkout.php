<?php
     $act = 'checkout';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    if($act == 'checkout') {
        if(isset($_SESSION['user'])){
            include('./views/checkout.php');
        } else {
            header('location: ./index.php');
        }
    }
    if($act == 'bill') {
        if(isset($_SESSION['user'])) {
            $makh = $_SESSION['user']['makh'];
            $hd = new hoadon();
            $mahd = $hd->insertHoadon($makh);
            // $_SESSION['mahd'] = $mahd;
            $tongtien = 0;
            foreach($_SESSION['cart'] as $key=>$item) {
                $thanhtien = $item['price'] * $item['quantity'];
                $hd->insertDetailHD($mahd,$item['id'],$item['quantity'],$thanhtien);
                $tongtien += $thanhtien;

                $pro = $hd->getQuantity($item['id']);
                $newQuantity = $pro['quanlity'] - $item['quantity'];
                $hd->updateQuantity($item['id'],$newQuantity);
            }
            $hd->updateTongTien($mahd, $tongtien);

            unset($_SESSION['cart']);
            // get order
            $info = $hd->getOrder($mahd);
            $detail = $hd->getOrderDetail($mahd);
            $listDetail = [];
            while($row = $detail->fetch()) {
                $price = $row['sale_price']??$row['price'];
                $listDetail[] = [
                    'product_id'=>$row['product_id'],
                    'tensp'=>$row['tensp'],
                    'color_name'=>$row['color_name'],
                    'rom_name'=>$row['rom_name'],
                    'type_name'=>$row['type_name'],
                    'price' => $price,
                    'soluong' =>$row['soluong'],
                    'thanhtien' =>$row['thanhtien'],
                    'image_url' =>$row['image_url']
                ];
            }
            
            $response = ['error'=>false, 
                'message'=>"Thanh toán hóa đơn thành công",
                'info' => $info,
                'detail' => $listDetail,
            ];
            echo json_encode($response);
        }
    }
    if($act = 'remove') {
        unset($_SESSION['mahd']);
    }
?>