<?php
    class sanpham{
        function getBrand() {
            $db = new connect();
            $query = "SELECT brand_id, brand_name FROM brand";
            $result = $db->getList($query);
            return $result;
        }
        function getModel($brand_id) {
            $db = new connect();
            $query = "SELECT * FROM model WHERE brand_id = $brand_id";
            $result = $db->getList($query);
            return $result;
        }
        function addMaSP($tensp,$model_id,$brand_id) {
            $db = new connect();
            $query = "INSERT INTO sanpham(masp, tensp, model_id, brand_id)
            VALUES (NULL,'$tensp',$model_id, $brand_id)
            ";
            $result = $db->exec($query);
            return $result;
        }
        function updateMaSp($masp,$tensp,$model_id,$brand_id) {
            $db = new connect();
            $query = "UPDATE sanpham
            SET tensp = '$tensp', model_id = $model_id,brand_id = $brand_id
            WHERE masp = $masp;
            ";
            $result = $db->exec($query);
            return $result;
        }
        function getListMaSP() {
            $db = new connect();
            $query = "SELECT sp.masp, sp.tensp, m.model_name, b.brand_name, m.model_id, b.brand_id
            FROM sanpham sp, brand b, model m
            WHERE sp.brand_id=b.brand_id AND sp.model_id = m.model_id";
            $result = $db->getList($query);
            return $result;
        }
        function checkIphone($masp) {
            $db = new connect();
            $query = "SELECT s.tensp, img.main_image, ct.color_id, ct.rom_id, img.image_url
            FROM sanpham s, chitiet_sanpham ct, phone_image img
            WHERE s.masp = ct.masp and ct.color_id = img.color_id
            AND img.main_image = 'true'
            and img.masp = $masp
            LIMIT 1";
            $result = $db->getInstance($query);
            return $result;
        }
        function checkBeforeDelete($masp) {
            $db = new connect();
            $query = "SELECT * FROM chitiet_sanpham WHERE masp = $masp;";
            $result = $db->getInstance($query);
            return $result;
        }
        function deleteMaSP($masp) {
            $db = new connect();
            $query = "DELETE FROM sanpham WHERE masp = $masp;";
            try {
                $result = $db->exec($query);
                return $result;
            } catch(Exception $err) {
                return false;
            }
        }
        function getMaSPbyId($masp) {
            $db = new connect();
            $query = "SELECT * FROM sanpham WHERE masp = $masp";
            $result = $db->getInstance($query);
            return $result;
        }

        function getSPDetail($masp){
            $db = new connect();
            $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name,c.color_id, r.rom_name, r.rom_id,
            ct.sale_price, ct.price, m.model_name,t.type_name,b.brand_name,img.image_url,img.main_image
            FROM sanpham s, chitiet_sanpham ct,color c, rom r, model m,
            phone_image img,phone_type t, brand b
            WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
            AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
            AND s.brand_id=b.brand_id AND s.model_id = m.model_id AND img.main_image = 'true'
            AND s.masp = $masp;
            ";
            $result = $db->getList($select);
            return $result;
        }
        function countSPDetail($masp) {
            $db = new connect();
            $select = "SELECT count(ct.product_id) AS count
            FROM sanpham s, chitiet_sanpham ct
            WHERE s.masp = ct.masp
            AND s.masp = $masp;
            ";
            $result = $db->getInstance($select);
            return $result['0'];
        }
        
        
    }

?>  