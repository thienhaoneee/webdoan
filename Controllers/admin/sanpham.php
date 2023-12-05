<?php
    $act = 'sanpham';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'sanpham':
            include('./views/admin/sanpham/list.php');
            break;
        case 'get_model':
            if($_POST['brandId'])
            $id = $_POST['brandId'];
            $sp = new sanpham();
            $result = $sp->getModel($id);
            $arr = [];
            while($row = $result->fetch()){
                $arr[] = $row;
            }
            if($result) {
                $response = [
                    'error'=>false,
                    'model'=>$arr
                ];
            } else {
                $response = ['error'=>true];
            }
            echo json_encode($response);
            break;
        // mã sản phẩm
        case 'add':
            include('./views/admin/sanpham/add.php');
            break;
        case 'list':
            include('./views/admin/sanpham/list.php');
            break;
        case 'edit':
            include('./views/admin/sanpham/edit.php');
            break;
        case 'delete_masp':
            if(isset($_POST['masp'])) {
                $masp = $_POST['masp'];
                $sp = new sanpham();
                $check = $sp->checkBeforeDelete($masp);
                $response = ['error'=>true];
                if($check && count($check) > 0) {
                    $response = ['error'=>true , 'message'=> "Phải xóa các sản phẩm con trước"];
                } else {
                    $result = $sp->deleteMaSP($masp);
                    $response = ['error'=>false , 'message'=> "Xóa thành công"];
                }

                echo json_encode($response);
            }
            break;
        case 'add_action':
            if($_POST['data'])
            $data =$_POST['data'];
            $tensp = $data['add_tensp'];
            $brand_id = $data['add_productbrand'];
            $model_id = $data['add_productmodel'];

            $sp = new sanpham();
            $result = $sp->addMaSP($tensp,$model_id,$brand_id);
            
            if($result) {
                $response = [
                    'error'=>false,
                    'message'=>'Thêm thành công'
                ];
            } else {
                $response = ['error'=>true];
            }
            echo json_encode($response);
            break;
            case 'edit_action':
                if($_POST['data'])
                    $data =$_POST['data'];
                    $masp = $data['edit_masp'];
                    $tensp = $data['edit_tensp'];
                    $brand_id = $data['edit_productbrand'];
                    $model_id = $data['edit_productmodel'];

                    $sp = new sanpham();
                    // check iphone
                    $checkIphone = $sp->checkIphone($masp);
                    $arr = explode('/',$checkIphone['image_url']);
                    if($arr[0] == 'iphone') {
                        $response = ['error'=>true, 'message'=>'Không thế sửa mã sản phẩm này'];
                        echo json_encode($response);
                        return;
                    }
                    $result = $sp->updateMaSp($masp,$tensp,$model_id,$brand_id);
                    if($result) {
                        $response = [
                            'error'=>false,
                            'message'=>'Sửa thành công'
                        ];
                    } else {
                        $response = ['error'=>true];
                    }
                echo json_encode($response);
            break;
        // sanpham detail
        case 'list_detail':
            include('./views/admin/sanpham/listdetail.php');
            break;
        default:
            echo "invalid case";
    }
