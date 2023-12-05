<?php
    class modelbrand {
         //Lấy ra Danh sách Brand
        function getBrand($brand_name = '') {
            //kết nối
            $db = new connect();
            $select = "SELECT * FROM brand";
            if($brand_name != '') {
                $select = "SELECT * FROM brand where brand_name like '$brand_name'";
                $result = $db->getInstance($select);
                return $result;
            }
            //viết truy vấn
            // trả kết quả
            $result = $db->getList($select);
            return $result;
            
        }

        // Lấy ra danh sách các Model theo brand = brand_id
        function getModel($brand) {
            $db = new connect();
            $select = "SELECT b.brand_id, m.model_id, m.model_name, b.brand_name, m.model_link
            FROM brand b, model m 
            WHERE b.brand_id=m.brand_id AND b.brand_name like '$brand'";

            $result = $db->getList($select);
            return $result;
        }   

    }

?>