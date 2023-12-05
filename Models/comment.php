<?php
    class comment {
        function insertComment($makh, $product_id, $content, $parent_id = 0) {
            $db = new connect();
            $query = "INSERT INTO comment (cmt_id, makh, product_id, content, parent_id,created_at,updated_at)
            VALUES (NULL, $makh, $product_id, '$content', $parent_id, NOW(), NOW())";
            $db->exec($query);

            // return
            $int = $db->getInstance("SELECT cmt_id FROM comment order by cmt_id desc limit 1;");
            return $int[0];
        }
        function getComment($product_id, $parent_id = 0) {
            $db = new connect();
            $query = "SELECT cmt.cmt_id, cmt.product_id ,kh.khachhang_name, 
            cmt.content, cmt.created_at, cmt.parent_id
            FROM khachhang kh, comment cmt
            WHERE kh.khachhang_id = cmt.makh
            AND cmt.product_id = $product_id
            AND parent_id = $parent_id
            ORDER BY cmt.created_at desc
            ";
            $result = $db->getList($query);
            return $result;
        }
        function getCommentbyId($cmt_id) {
            $db = new connect();
            $query = "SELECT cmt.cmt_id, cmt.product_id, kh.khachhang_id ,kh.khachhang_name, cmt.content, cmt.created_at, cmt.parent_id
            FROM khachhang kh, comment cmt
            WHERE kh.khachhang_id = cmt.makh
            AND cmt.cmt_id = $cmt_id";
            $result = $db->getInstance($query);
            return $result;
        }
        function checkComment($product_id) {
            $db = new connect();
            $query = "SELECT COUNT(*) AS count
            FROM comment cmt
            WHERE cmt.product_id = $product_id";
            $result = $db->getInstance($query);
            return $result[0];
        }
    }

?>