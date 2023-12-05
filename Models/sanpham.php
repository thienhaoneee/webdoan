<?php 

    class sanpham{
        function __construct() {}

        //Lấy ra 12 sản phẩm mới nhất
        function getSPNew() {
            //kết nối
            $db = new connect();
            //viết truy vấn
            
            // $select = "SELECT * FROM `hanghoa` ORDER by mahh DESC limit 12";
            $select = "SELECT tenhh, hinh, mausac, s.size, ct.soluongton, ct.dongia FROM hanghoa h, cthanghoa ct, sizegiay s, mausac m where h.mahh=ct.idhanghoa and ct.idmau=m.Idmau and ct.idsize=s.Idsize;";
            
            $result = $db->getList($select);
            // return $result;
        }
        // đã sửa
        function getAllSP($start = null, $limit = null){
            $db = new connect();
            $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name, r.rom_name,ct.sale_price, ct.price,
                t.type_name,img.image_url,img.main_image
                FROM sanpham s, chitiet_sanpham ct,color c, rom r,phone_image img,phone_type t
                WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
                AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
                AND t.type_id IN (1,3) AND img.main_image LIKE 'true' 
                ORDER BY r.rom_id;
            ";
            $result = $db->getList($select);
            return $result;
        }   
        function getAllSPbyBrand($brand, $model = "null", $start = 0, $limit = 5){
            $db = new connect();
            $select = '';
            if($model == 'null') {
                $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name, r.rom_name,ct.sale_price, ct.price,
                    t.type_name,b.brand_name,img.image_url,img.main_image
                    FROM sanpham s, chitiet_sanpham ct,color c, rom r,
                    phone_image img,phone_type t, brand b
                    WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
                    AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
                    AND s.brand_id=b.brand_id
                    AND t.type_id IN (1,3) AND b.brand_name LIKE '$brand'
                    AND img.main_image LIKE 'true' 
                    ORDER BY ct.product_id desc
                    LIMIT $limit OFFSET $start
                ";
            } else {
                $model = strtolower($model);
                $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name, r.rom_name,ct.sale_price, ct.price,
                    t.type_name,b.brand_name,img.image_url,img.main_image
                    FROM sanpham s, chitiet_sanpham ct,color c, rom r,
                    phone_image img,phone_type t, brand b,  model m
                    WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
                    AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
                    AND s.brand_id=b.brand_id AND s.model_id=m.model_id
                    AND t.type_id IN (1,3) AND b.brand_name LIKE '$brand'
                    AND m.model_name LIKE '$model'
                    AND img.main_image LIKE 'true' 
                    ORDER BY ct.product_id desc
                    LIMIT $limit OFFSET $start
                ";
            }

            $result = $db->getList($select);
            return $result;
        }

        
        function getSPbyId($id){
            $db = new connect();
            $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name,c.color_id, r.rom_name, r.rom_id,
            ct.sale_price, ct.price, m.model_name,t.type_name,b.brand_name,img.image_url,img.main_image
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
        function getCountProduct($brand, $model = null){
            $db = new connect();
            $model_query = "";
            if($model != 'null') {
                $model_query = "AND m.model_name LIKE '$model'";
            }
            $select = "SELECT COUNT(ct.product_id) AS soluong
            FROM sanpham s, chitiet_sanpham ct, brand b,  model m, phone_image img, color c
            WHERE s.masp = ct.masp AND img.masp=s.masp AND c.color_id = img.color_id
            AND ct.color_id = c.color_id
            AND s.brand_id=b.brand_id AND s.model_id=m.model_id
            AND b.brand_name LIKE '$brand'
            $model_query
            AND img.main_image LIKE 'true' ";
            $result = $db->getInstance($select);
            return $result[0];
        }

        function getColor($masp, $rom_id) {
            $db = new connect();
            $select = "SELECT ct.masp, ct.product_id, c.color_id, c.color_name
                FROM chitiet_sanpham ct,color c, rom r
                WHERE ct.color_id=c.color_id AND ct.rom_id=r.rom_id
                and ct.masp = $masp AND r.rom_id=$rom_id
            " ;    
            $result = $db->getList($select);
            return $result;
        }
        function getRom($masp, $color_id) {
            $db = new connect();
            $select = "SELECT ct.masp, ct.product_id, r.rom_id, r.rom_name
            FROM chitiet_sanpham ct,color c, rom r
            WHERE ct.color_id=c.color_id AND ct.rom_id=r.rom_id
            and ct.masp = $masp AND c.color_id = $color_id
            ";
            $result = $db->getList($select);
            return $result;
        }
        function getColorRomDefault($id) {
            $db = new connect();
            $select = "SELECT ct.masp, ct.product_id, c.color_id, c.color_name, r.rom_id, r.rom_name
                FROM chitiet_sanpham ct,color c, rom r
                WHERE ct.color_id=c.color_id AND ct.rom_id=r.rom_id
                and ct.product_id = $id
            ";
            $result = $db->getInstance($select);
            return $result;
        }
        function getProductImg($masp, $color_id) {
            $db = new connect();
            $select = "SELECT masp, image_url
            FROM  phone_image
            WHERE masp = $masp AND color_id = $color_id;
            ";
            $result = $db->getList($select);
            return $result;
            
        }
        function getSameProduct($id) {
            $db = new connect();
            $select = "SELECT s.masp, ct.product_id, s.tensp, c.color_name, r.rom_name,ct.sale_price, ct.price,
            t.type_name,b.brand_name,img.image_url,img.main_image
            FROM sanpham s, chitiet_sanpham ct,color c, rom r,
            phone_image img,phone_type t, brand b,  model m
            WHERE s.masp = ct.masp AND ct.color_id=c.color_id AND r.rom_id=ct.rom_id
            AND s.masp =img.masp AND ct.color_id=img.color_id AND ct.type_id=t.type_id
            AND s.brand_id=b.brand_id AND s.model_id=m.model_id
            AND t.type_id IN (1,3) AND b.brand_name LIKE 'apple'
            AND m.model_name LIKE 'iphone 14 series'
            AND img.main_image LIKE 'true' AND ct.product_id <> $id
            ORDER BY ct.price  ASC
            LIMIT 5
            ";
            $result = $db->getList($select);
            return $result;
        }
        

    }
