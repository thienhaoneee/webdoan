<?php
    class thongke {
        function getThongke() {
            $db = new connect();
            $query = "SELECT sp.tensp, count(hd.soluong) AS soluong
            FROM sanpham sp, chitiet_sanpham ct,  chitiet_hd hd, hoadon h
            WHERE sp.masp = ct.masp
            AND ct.product_id = hd.product_id AND hd.mahd = h.hoadon_id
            GROUP BY sp.masp";
            $result = $db->getList($query);
            return $result;
        }
        function getThongkeYear($year, $yearEnd) {
            $db = new connect();
            $query = "SELECT sp.tensp, count(hd.soluong) AS soluong
            FROM sanpham sp, chitiet_sanpham ct,  chitiet_hd hd, hoadon h
            WHERE sp.masp = ct.masp
            AND ct.product_id = hd.product_id AND hd.mahd = h.hoadon_id
            AND  YEAR(h.ngayhd) BETWEEN '$year' AND '$yearEnd'
            GROUP BY sp.masp";
            $result = $db->getList($query);
            return $result;
        }
        function getThongkeMonth($year, $month) {
            $db = new connect();
            $query = "SELECT sp.tensp, count(hd.soluong) AS soluong
            FROM sanpham sp, chitiet_sanpham ct,  chitiet_hd hd, hoadon h
            WHERE sp.masp = ct.masp
            AND ct.product_id = hd.product_id AND hd.mahd = h.hoadon_id
            AND  YEAR(h.ngayhd) = '$year' AND MONTH(h.ngayhd) = '$month'
            GROUP BY sp.masp";
            $result = $db->getList($query);
            return $result;
        }
        function getThongkeDay($day, $dayEnd) {
            $db = new connect();
            $query = "SELECT sp.tensp, count(hd.soluong) AS soluong
            FROM sanpham sp, chitiet_sanpham ct,  chitiet_hd hd, hoadon h
            WHERE sp.masp = ct.masp
            AND ct.product_id = hd.product_id AND hd.mahd = h.hoadon_id
            AND  date(h.ngayhd) BETWEEN '$day' AND '$dayEnd'
            GROUP BY sp.masp";
            $result = $db->getList($query);
            return $result;
        }
    }

?>