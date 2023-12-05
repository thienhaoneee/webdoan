<?php $masp = $_GET['masp'];?>
<a href="./main.php?action=sanpham&act=list" class="sanpham-detail__btn-back">Quay lại</a>
<div class="card card-primary">
    <div class="card-header ">
        <div class="card-header__wrapper d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách sản phẩm: </h3>
            <a href="main.php?action=sanpham_detail&act=add&masp=<?php echo $masp?>" class="btn list-detail__btn-addnew">Add new</a>
        </div>
    </div>
    <div class="table-detail_product-wrapper px-4 pb-3">
        <?php 
            $sp = new sanpham();
            $countDetail = $sp->countSPDetail($masp);
            if($countDetail > 0):
        ?>
        <table class="table table-detail_product">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="">Sản phẩm</th>
                    <th>Model</th>
                    <th>Hãng sản xuất</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Loại</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="table-detail_body">
                <?php 
                    $products = $sp->getSPDetail($masp);
                    while($product = $products->fetch()):
                ?>
                <tr class="list-detail__item2-<?php echo $product['product_id']?>">
                    <td><?php echo $product['product_id'] ?></td>
                    <td class="detail-product__col-name">
                        <div class="detail-product__item-name">
                            <img src="./public/image/sanpham/<?php echo $product['image_url'] ?>" alt="" width="60px">
                            <div class="detail-product__item-name-wrapper">
                                <p><?php echo $product['tensp'] ?> - <?php echo $product['rom_name'] ?></p>
                                <span>
                                    <?php echo $product['color_name'] ?>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td style="min-width: 95px;"><?php echo $product['model_name'] ?></td>
                    <td><?php echo $product['brand_name'] ?></td>
                    <td><?php echo formatCurrency($product['price']) ?></td>
                    <td><?php echo $product['sale_price']?formatCurrency($product['sale_price']):'Not Sale' ?></td>
                    <td style="min-width: 120px;"><?php echo $product['type_name'] ?></td>
                    <td>
                        <div class="edit-button__wrapper">
                            <!-- action -->
                            <a href="main.php?action=sanpham_detail&act=edit&id=<?php echo $product['product_id']?>" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <!-- ajax -->
                            <button class="btn btn-danger" onclick="removeProductDetail(<?php echo $product['product_id']?>)"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                    
                </tr>
                <?php endwhile?>
                

            </tbody>
        </table>
        <?php endif ?>
        
        <?php if($countDetail == 0):?>
            <div class="list-detail__product-null">
                <img src="./public/image/noproduct.png" alt="">
                <h5>Chưa có sản phẩm nào</h5>
            </div>

        <?php endif ?>

    </div>
    
</div>