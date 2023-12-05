<?php
class cart
{

    function add_item($id)
    {
        $sp = new sanpham();

        $row = $sp->getSPbyId($id);
        $price = isset($row['sale_price']) ? $row['sale_price'] : $row['price'];
        $item = array(
            'id' => $row['product_id'],
            'tensp' => $row['tensp'],
            'color_name' => $row['color_name'],
            'rom_name' => $row['rom_name'],
            'price' => $price,
            'type_name' => $row['type_name'],
            'image_url' => $row['image_url'],
            'quantity' => 1
        );
        $_SESSION['cart'][] = $item;
    }

    function check_item($id)
    {
        if (isset($_SESSION['cart'])) {
            $flag = false;
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $id) {
                    $flag = true;
                    break;
                };
            }
            return $flag;
        }
    }
    function update_item($id, $newQuantity)
    {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $id) {
                    $_SESSION['cart'][$key]['quantity'] = $newQuantity;
                    return $_SESSION['cart'][$key];
                };
            }
        }
    }
    function getTotalAll()
    {
        if (isset($_SESSION['cart'])) {
            $result = 0;
            foreach ($_SESSION['cart'] as $key => $item) {
                $result += $item['quantity'] * $item['price'];
            }
            return $result;
        } else return 0;
    }
    function getCountCart() {
        if(isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } return 0;
    }
}
