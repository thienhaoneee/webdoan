<?php
    class modelbrand {
         //Lấy ra Danh sách Brand
        function getBrand() {
            //kết nối
            $db = new connect();

            //viết truy vấn
            $select = "SELECT * FROM brand";

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