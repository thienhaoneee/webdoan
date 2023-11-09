<?php
    class sanpham{
        function getNextMasp() {
            $db = new connect();
            $query = "SELECT masp FROM sanpham ORDER BY masp Desc LIMIT 1";
            $result = $db->getInstance($query);
            return $result;
        }
        function getBrand() {
            $db = new connect();
            $query = "SELECT brand_id, brand_name FROM brand";
            $result = $db->getList($query);
            return $result;
        }
    }

?>  