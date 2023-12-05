<?php 
    $act = 'pagination';
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $start = $_POST['start'];

    $sp = new sanpham();
    $list = $sp->getAllSPbyBrand($brand, $model, $start);
    $products = [];
    
    while($row = $list->fetch()) {
        $products[] = [
            'product_id' => $row['product_id'],
            'masp' => $row['masp'],
            'tensp' => $row['tensp'],
            'color_name' => $row['color_name'],
            'price' => $row['price'],
            'rom_name' => $row['rom_name'],
            'sale_price' => $row['sale_price'],
            'type_name' => $row['type_name'],
            'brand_name' => $row['brand_name'],
            'image_url' => $row['image_url'],
            'main_image' => $row['main_image'],
        ];
    }
    $response = [
        'error' => false,
        'products' => $products
    ];
    echo json_encode($response)

?>