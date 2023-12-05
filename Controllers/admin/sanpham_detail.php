<?php
    $act = 'list';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'list':
            include('./views/admin/sanpham/listdetail.php');
            break;
        case 'add':
            include('./views/admin/sanpham/add_detail.php');
            break;
        case 'edit':
            include('./views/admin/sanpham/edit_detail.php');
            break;
        case 'add_action':
            $masp = $_POST['a_masp'];
            $rom_id = $_POST['a_rom_id'];
            $color_id = $_POST['a_color_id'];
            $quanlity = $_POST['a_quanlity'];
            $price = $_POST['a_price'];
            $sale_price = $_POST['a_sale_price'];
            $type_id = $_POST['a_type_id'];
            $mota_sp = $_POST['a_mota'];
            $image = $_FILES['a_image']['name'];

            $detail = new detail();
            $checkProduct = $detail->checkProduct($masp, $rom_id, $color_id);
            if($checkProduct != false) {
                $response = ['error'=>true, 'message'=>'Sản phẩm đã tồn tại'];
                echo json_encode($response);
                return;
            }

            $product = $detail->insertSP($masp,$rom_id,$color_id,$quanlity,$price,$sale_price,$type_id,$mota_sp);
            if($product == false) {
                $response = ['error'=>true, 'message'=>'thêm sản phẩm thất bại'];
                echo json_encode($response);
                return;
            } 

            $checkImage = $detail->checkImage($masp, $color_id);
            if($checkImage !== false) {
                $response = ['error'=>false, 'message'=>'hình ảnh đã lưu không thêm nữa', 'checkImage'=>$checkImage];
                echo json_encode($response);
                return;
            }

            // upload hình ảnh vào folder
            $item = $detail->getProductwithColor($product);
            $brand = $item['brand_name'];
            $model = $item['model_name'];
            $detail = new detail();
            $brand_name = $detail->slug($brand);
            $model_name = $detail->slug($model);
            $up = new upload();
            $res = $up->uploadimage($brand_name, $model_name);
            if($res == false) {
                $response = ['error'=>false, 'message'=>'upload thất bại'];
            }
            // chèn ảnh vào database
            $image_url = "$brand_name/$model_name/$image";
            $insertImg = $detail->insertImage($masp, $color_id, $image_url);
            if($insertImg == false) echo "Chèn database thất bại";
            $response = ['error'=>false, 'message'=>'Thành công', 'checkImage'=>$checkImage, 'res'=>$res];
                echo json_encode($response);
            break;

        case 'edit_action':
            $product_id = $_POST['e_product_id'];
            $masp = $_POST['e_masp'];
            $rom_id = $_POST['e_rom_id'];
            $quanlity = $_POST['e_quanlity'];
            $price = $_POST['e_price'];
            $sale_price = $_POST['e_sale_price'];
            $type_id = $_POST['e_type_id'];
            $mota_sp = $_POST['e_mota'];
            $image = $_FILES['a_image']['name'];

            $detail = new detail();
            // check iphone
            $checkIphone = $detail->getSanPhambyId($product_id);
            $arr = explode('/',$checkIphone['image_url']);
            if($arr[0] == 'iphone') {
                $response = ['error'=>true, 'message'=>'Không thế sửa sản phẩm này'];
                echo json_encode($response);
                return;
            }
            $getColor = $detail->getColorId($product_id);
            $color_id = $getColor['color_id'];

            $product = $detail->updateSP($product_id,$rom_id,$color_id,$quanlity,$price,$sale_price,$type_id,$mota_sp);
            if($product == false) {
                $response = ['error'=>true, 'message'=>'Update sản phẩm thất bại'];
                echo json_encode($response);
                return;
            };
            if($image == true) {
                // check
                $item = $detail->getProductwithColor($product_id);
                $brand = $item['brand_name'];
                $model = $item['model_name'];
                $detail = new detail();
                $brand_name = $detail->slug($brand);
                $model_name = $detail->slug($model);
                
                $image_url = "$brand_name/$model_name/".basename($_FILES['a_image']['name']);
                $target_file = "./public/image/sanpham/$image_url";

                if(!file_exists($target_file)) {
                    $up = new upload();
                    $res = $up->uploadimage($brand_name, $model_name);
                    // if($res == false) {
                    //     $response = ['error'=>true, 'message'=>'upload hình thất bại'];
                    //     echo json_encode($response);
                    //     return;
                    // }
                }
                $checkUpdate = $detail->updateImage($masp, $color_id, $image_url);
                $response = ['error'=>false, 'message'=>'Cập nhật thành công', 'masp'=>$masp, 'dir'=>$target_file];
                echo json_encode($response);
                //check Image
                return;
            }
            $response = ['error'=>false, 'message'=>'Cập nhật thành công','masp'=>$masp];
            echo json_encode($response);

            break;
        case 'delete':
            $id = $_POST['id'];
            $detail = new detail();

            $product = $detail->getSanPhambyId($id);
            $masp = $product['masp'];
            $color_id = $product['color_id'];
            $image_url = $product['image_url'];

            $arr = explode('/',$image_url);
            if($arr[0] == 'iphone') {
                $response = ['error'=>true, 'message'=>'Không thế xóa sản phẩm này'];
                echo json_encode($response);
                return;
            }
            // xóa
            $remove = $detail->deleteSP($id);
            $result = $detail->checkValidSP($masp, $color_id);
            if($result == false) {
                $upp = new upload();
                $rmImage = $upp->remove($image_url);
                $detail->deleteImage($masp, $color_id);
            }
            $detail->deleteComment($id);
            $response = ['error'=>false, 'message'=>'Xóa thành công'];
            echo json_encode($response);
            break;
        default:
            echo "invalid case";
        }


?>