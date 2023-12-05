<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Danh sách sản phẩm</h3>
    </div>
    <div class="table-wrapper px-4 pb-3">
        <table class="table table-list-product">
            <thead>
                <tr>
                    <th>Mã SP</th>
                    <th>Tên sản phẩm</th>
                    <th>Model</th>
                    <th>Hãng sản xuất</th>
                    <th>Details</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sp = new sanpham();
                    $products = $sp->getListMaSP();
                    while($product = $products->fetch()):
                ?>
                <tr class="list-masp__item-<?php echo $product['masp']?>">
                    <td><?php echo $product['masp'] ?></td>
                    <td><?php echo $product['tensp'] ?></td>
                    <td><?php echo $product['model_name'] ?></td>
                    <td><?php echo $product['brand_name'] ?></td>
                    <td>
                        <!-- action -->
                        <a href="main.php?action=sanpham_detail&act=list&masp=<?php echo $product['masp']?>" class="btn btn-primary">
                            DS Chi tiết
                        </a>
                    </td>
                    <td>
                        <div class="edit-button__wrapper">
                            <!-- action -->
                            <a href="main.php?action=sanpham&act=edit&masp=<?php echo $product['masp']?>" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <!-- ajax -->
                            <button class="btn btn-danger" onclick="deleteMaSP(<?php echo $product['masp']?>)"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                    
                </tr>
                <?php endwhile?>
            </tbody>
        </table>

    </div>
    
</div>