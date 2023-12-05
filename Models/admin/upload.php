<?php
    class upload {
        function uploadimage($brand_name,$model_name)
        {
            
            $baseDirectory = "public/image/sanpham/";
            $sub1 = "$brand_name/";
            $sub2 = "$model_name/";
    
            if (!is_dir($baseDirectory . $sub1)) {
                mkdir($baseDirectory . $sub1, 0777, true);
            }
    
            if (!is_dir($baseDirectory . $sub1 . $sub2)) {
                mkdir($baseDirectory . $sub1 . $sub2, 0777, true);
            }
    
            //B1: tạo ra đường dẫn chứa hình
            $target_dir="./public/image/sanpham/$sub1/$sub2/";
            $error = [];
            // $subdirectory = "sanpham/";
    
    
            // Tên thư mục con
            //b2: lấy tên hình về
            // Content/imagetourdien/giaycongso.jpg
            $target_file=$target_dir.basename($_FILES['a_image']['name']);
            //b3:lấy phần mở rộng và chuyển về cùng 1 định dạng hoa hoặc thường
            $targetFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //b4: kiểm tra xem hình đó có thật sự upload lên server hay chưa, getimagesize
            $uploadhinh=1;
            if(isset($_POST['submit']))
            {
                $check=getimagesize($_FILES['a_image']['tmp_name']);
                if($check!==false)
                {
                    $uploadhinh=1;
                }
                else
                {
                    $uploadhinh=0;
                    $error[] = 'không có file upload tồn tại';
                }
            }
            // kiểm tra nếu hình có trong thư mục rồi thì ko đc up
            if(file_exists($target_file))
            {
                $uploadhinh=0;
                $error[] = 'hình đã tồn tại';
    
            }
            // kiểm tra dung lượng file, size > 500kb
            if($_FILES['a_image']['size']>500000)
            {
                $uploadhinh=0;
                $error[] = 'hình vượt quá dung lượng';
    
            }
            // kiểm tra có phải là hình hay không
            if($targetFileType!="jpg" && $targetFileType!=="jepg" && $targetFileType!=="png" 
            && $targetFileType!=="gif" && $targetFileType!=="webp")
            {
                $uploadhinh=0;
                $error[] = 'Không phải hình';
            }
            // b5: upload
            if($uploadhinh==1)
            {
                if(!move_uploaded_file($_FILES['a_image']['tmp_name'],$target_file))
                {
                    $error[] = 'Thất bại';
                }
                
            } else if($uploadhinh == 0) {
                return false;
            }
            return $error;
        }
        function remove($image_url)
        {
            $target_file="./public/image/sanpham/$image_url";

            if(file_exists($target_file))
            {
                if (unlink($target_file)) {
                    return true;
                } 
                return false;
            }
            return false;
        }

    }
?>