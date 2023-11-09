<?php
    class account{
        function checkAdmin($email, $pass) {
            $db = new connect();
            $query = "SELECT * FROM nhanvien 
            WHERE admin_email = '$email' AND admin_pass = '$pass'";
            $result = $db->getInstance($query);
            return $result;
        }
    }

?>