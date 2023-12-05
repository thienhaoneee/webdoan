<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm mã sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    
    <!-- form start -->
    <form id="form-add-1">
        <div class="card-body">
            
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="add_tensp" id="add_tensp" class="form-control"  value=""
                placeholder="Nhập tên sản phẩm...">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="">Chọn Hãng sản xuất:</label>
                <br>
                <select class="form-control" name="add_productbrand" id="add_productbrand" onchange="getModel()"
                aria-label="Default select example">
                    <option selected value="">Chọn Hãng sản xuất:</option>
                        <?php 
                        $sp = new sanpham();
                        $brand = $sp->getBrand();
                        while($row = $brand->fetch()):
                        ?>
                            <option value="<?php echo $row['brand_id']?>" ><?php echo $row['brand_name']?></option>
                        <?php  endwhile ?>
                </select>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="">Chọn Model:</label>
                <br>
                <select class="form-control" name="add_productmodel" id="add_productmodel" aria-label="Default select example">
                    <option selected disabled value="">Chọn Model</option>
                    
                </select>
                <span class="form-message"></span>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Thêm Mã sản phẩm</button>
        </div>
    </form>
</div>