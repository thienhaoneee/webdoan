<?php
    class hoadon {
        function getQuantity($id) {
            $db = new connect();
            $query = "SELECT product_id, quanlity FROM chitiet_sanpham 
            WHERE product_id = $id";
            $result = $db->getInstance($query);
            return $result;
        }
        function updateQuantity($product_id,$newQuantity) {
            $db = new connect();
            $query="UPDATE chitiet_sanpham SET quanlity = $newQuantity
            WHERE product_id = $product_id";
            $db->exec($query);
        }
        function insertHoadon($makh) {
            $db = new connect();
            $date = new DateTime('now');
            $datecreate = $date->format("Y-m-d");
            $query = "INSERT INTO hoadon (hoadon_id, khachhang_id, ngayhd, tongtien)
            VALUES (NULL, $makh,'$datecreate',0)";
            $db->exec($query);

            // sau khi insert thì cần trả masohd
            $int = $db->getInstance("SELECT hoadon_id FROM hoadon order by hoadon_id desc limit 1;");
            return $int[0];
        }
        function insertDetailHD($mahd,$product_id,$soluong,$thanhtien) {
            $db = new connect();
            $query="INSERT INTO chitiet_hd(mahd,product_id,soluong,thanhtien,tinhtrang)
            VALUES ($mahd,$product_id,$soluong,$thanhtien,'false')";
            $db->exec($query);
        }
        function updateTongTien($hoadon_id, $tongtien) {
            $db = new connect();
            $query="UPDATE hoadon SET tongtien = $tongtien
            WHERE hoadon_id = $hoadon_id";
            $db->exec($query);
        }
        function getOrder($mahd) {
            $db = new connect();
            $query = "SELECT kh.khachhang_id, kh.khachhang_name, kh.diachi, kh.phone, kh.email,h.hoadon_id, h.ngayhd , h.tongtien  
            FROM  khachhang kh, hoadon h
            WHERE kh.khachhang_id=h.khachhang_id AND h.hoadon_id = $mahd";
            $result = $db->getInstance($query);
            return $result;
        }
        function getOrderDetail($mahd) {
            $db = new connect();
            $query = "SELECT DISTINCT ct.product_id,sp.tensp, c.color_name, r.rom_name, 
            ct.price,ct.sale_price, hd.soluong,hd.thanhtien, img.image_url, ty.type_name
            FROM sanpham sp, chitiet_sanpham ct, chitiet_hd hd, hoadon d, 
            color c, rom r, phone_type ty, phone_image img
            WHERE sp.masp = ct.masp AND hd.mahd = d.hoadon_id AND hd.product_id = ct.product_id
            AND ct.rom_id=r.rom_id AND ct.color_id = c.color_id 
            AND ct.type_id=ty.type_id AND ct.masp = img.masp AND ct.color_id=img.color_id
            AND img.main_image = 'true' AND hd.mahd = $mahd";
            $result = $db->getList($query);
            return $result;
        }
    }

?>