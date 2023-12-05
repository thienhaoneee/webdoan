<?php
    $masp = 0;
    if(isset($_GET['masp'])) {
        $masp = $_GET['masp'];
    }
    $sp = new sanpham();
    $product = $sp->getMaSPbyId($masp);
    $tensp = $product['tensp'];
    $brand_id = $product['brand_id'];
    $model_id = $product['model_id'];
?>
<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">Sửa mã sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="form-edit-1">
        <div class="card-body">
            <input type="hidden" name="edit_masp" id="edit_masp" class="form-control"  value="<?php echo $masp?>">
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="edit_tensp" id="edit_tensp" class="form-control"  value="<?php echo $tensp?>"
                placeholder="Nhập tên sản phẩm...">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="">Chọn Hãng sản xuất:</label>
                <br>
                <select class="form-control" name="edit_productbrand" id="edit_productbrand" onchange="getModel_edit()"
                aria-label="Default select example">
                    <option selected value="">Chọn Hãng sản xuất:</option>
                    <?php 
                        $brand = $sp->getBrand();
                        while($row = $brand->fetch()):
                    ?>
                        <option value="<?php echo $row['brand_id']?>" <?php echo $row['brand_id']==$brand_id?'selected':'';?> ><?php echo $row['brand_name']?></option>
                    <?php  endwhile ?>
                </select>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="">Chọn Model:</label>
                <br>
                <select class="form-control" name="edit_productmodel" id="edit_productmodel" aria-label="Default select example">
                    <option selected disabled value="">Chọn Model</option>
                    <?php 
                        $brand = $sp->getModel($brand_id);
                        while($row = $brand->fetch()):
                    ?>
                        <option value="<?php echo $row['model_id']?>" <?php echo $row['model_id']==$model_id?'selected':'';?> ><?php echo $row['model_name']?></option>
                    <?php  endwhile ?>
                </select>
                <span class="form-message"></span>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Sửa Mã sản phẩm</button>
        </div>
    </form>
</div>