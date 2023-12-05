<?php
class user
{
    function __construct()
    {
    }

    function insertUser($name, $email, $password, $diachi, $phone) {
        $db = new connect();
        $query = "INSERT INTO khachhang (khachhang_name, email,password, diachi, phone,updated_at,created_at) 
                        VALUES ('$name', '$email', '$password', '$diachi', '$phone', NOW(), NOW());";
        $db->exec($query);
    }
    function checkUser($phone, $email) {
        $db = new connect();
        $query = "SELECT kh.khachhang_id, kh.khachhang_name, kh.email, kh.phone FROM khachhang kh
                        WHERE kh.phone = '$phone' OR kh.email = '$email';";
        $result = $db->getInstance($query);
        return $result;
    }

    function userLogin($phone, $pass) {
        $db = new connect();
        $query = "SELECT * FROM khachhang kh
            WHERE kh.phone = '$phone' AND kh.password = '$pass'";
        $result = $db->getInstance($query);
        return $result;
    }


    // for update
    // getEmail
    // updateCode
}
