<?php
    class detail {
        // detail
        function getNamebyId($masp) {
            $db = new connect();
            $query = "SELECT s.masp,s.tensp, m.model_name,b.brand_name
            FROM sanpham s, model m, brand b
            WHERE s.brand_id=b.brand_id AND s.model_id = m.model_id
            AND s.masp = $masp";
            $result = $db->getInstance($query);
            return $result;
        }
        function getProductwithColor($product_id) {
            $db = new connect();
            $query2= "SELECT s.masp,s.tensp, m.model_name,b.brand_name, c.color_name
            FROM sanpham s, model m, brand b, color c, chitiet_sanpham ct
            WHERE ct.masp=s.masp and s.brand_id=b.brand_id AND s.model_id = m.model_id AND c.color_id= ct.color_id
            AND ct.product_id = $product_id";
            $result = $db->getInstance($query2);
            return $result;
        }
        function getColor() {
            $db = new connect();
            $query = "SELECT * FROM color";
            $result = $db->getList($query);
            return $result;
        }
        function getRom() {
            $db = new connect();
            $query = "SELECT * FROM rom";
            $result = $db->getList($query);
            return $result;
        }
        function getType() {
            $db = new connect();
            $query = "SELECT * FROM phone_type";
            $result = $db->getList($query);
            return $result;
        }
        function getColorId($id) {
            $db = new connect();
            $query = "SELECT product_id, masp,color_id 
            FROM chitiet_sanpham WHERE product_id = $id";
            $result = $db->getInstance($query);
            return $result;
            
        }
        function slug($input) {
            $input = strtolower($input);
            $input = preg_replace('/[^a-z0-9 -]/', '', $input);
            $input = preg_replace('/\s+/', ' ', $input);
            $input = str_replace(' ', '-', $input);
            return $input;
        }
        // deatail
        function checkProduct($masp, $rom_id, $color_id) {
            $db = new connect();
            $query = "SELECT * FROM chitiet_sanpham 
            WHERE masp = $masp AND rom_id = $rom_id AND color_id = $color_id";
            $result = $db->getInstance($query);
            return $result;
        }
        function checkImage($masp, $color_id, $image_url = null) {
            $db = new connect();
            $sub = '';
            if($image_url) $sub = "AND image_url = $image_url";
            $query = "SELECT * FROM phone_image
            WHERE masp = $masp AND color_id = $color_id AND main_image = 'true' $sub;";
            $result = $db->getInstance($query);
            return $result;
        }
        function insertSP($masp,$rom_id,$color_id,$quanlity,$price,$sale_price,$type_id,$mota_sp) {
            $db = new connect();
            if($sale_price == false) $sale_price = 0;
            $query = "INSERT INTO chitiet_sanpham (product_id,masp,rom_id,color_id,
            quanlity,price,sale_price,type_id,image_id,mota_sp,updated_at,created_at)
            VALUES (NULL, $masp, $rom_id , $color_id , $quanlity, $price, $sale_price, $type_id ,NULL, '$mota_sp', NOW(), NOW())";
            $result = $db->exec($query);

            //new fix
            $product_id = $db->getInstance("SELECT product_id FROM chitiet_sanpham
            ORDER BY product_id desc
            LIMIT 1");
            return $product_id[0];
        }
        function updateSP($product_id,$rom_id,$color_id,$quanlity,$price,$sale_price,$type_id,$mota_sp) {
            $db = new connect();
            if($sale_price == false) $sale_price = 0;
            $query = "UPDATE chitiet_sanpham 
            SET rom_id = $rom_id, color_id = $color_id, quanlity = $quanlity, 
            price = $price, sale_price = $sale_price, type_id = $type_id,
            mota_sp = '$mota_sp', updated_at = NOW()
            WHERE product_id = $product_id";
            $result = $db->exec($query);
            return $result;
        }
        function insertImage($masp, $color_id, $image_url) {
            $db = new connect();
            $query = "INSERT INTO phone_image (image_id, masp, color_id, image_url, main_image)
            VALUES (NULL, $masp, $color_id, '$image_url', 'true')";
            $result = $db->exec($query);
            return $result;
        }
        function updateImage($masp, $color_id, $image_url) {
            $db = new connect();
            $query = "UPDATE phone_image SET image_url = '$image_url'
            WHERE masp = $masp AND color_id = $color_id AND main_image = 'true'";
            $result = $db->exec($query);
            return $result;
        }
        function getSanPhambyId($id){
            $db = new connect();
            $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name,c.color_id, r.rom_name, r.rom_id,
            ct.sale_price, ct.price,ct.quanlity, m.model_name,t.type_name,t.type_id,b.brand_name,ct.mota_sp,img.image_url,img.main_image
            FROM sanpham s, chitiet_sanpham ct,color c, rom r, model m,
            phone_image img,phone_type t, brand b
            WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
            AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
            AND s.brand_id=b.brand_id AND s.model_id = m.model_id AND img.main_image = 'true'
            and ct.product_id = $id;
            ";
            $result = $db->getInstance($select);
            return $result;
        }
        function checkValidSP($masp, $color_id) {
            $db = new connect();
            $query = "SELECT * 
            FROM chitiet_sanpham WHERE masp = $masp AND color_id = $color_id";
            $result = $db->getInstance($query);
            return $result;
        }
        function deleteSP($id) {
            $db = new connect();
            $query = "DELETE FROM chitiet_sanpham where product_id = $id";
            $result = $db->exec($query);
            return $result;
        }
        function deleteImage($masp, $color_id) {
            $db = new connect();
            $query = "DELETE FROM phone_image where masp = $masp and color_id = $color_id";
            $result = $db->exec($query);
            return $result;
        }
        function deleteComment($product_id) {
            $db = new connect();
            $query = "DELETE FROM comment where product_id = $product_id";
            $result = $db->exec($query);
            return $result;
        }
    }
?>