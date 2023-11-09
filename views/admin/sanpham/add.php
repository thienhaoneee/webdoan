<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm mã sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="name" class="form-control" value=""
                placeholder="Nhập tên sản phẩm...">
            </div>

            <div class="form-group">
                <label for="">Chọn Hãng sản xuất:</label>
                <br>
                <select class="form-control" name="brand_id" id="product_select_brand" aria-label="Default select example">
                    <option selected disabled value="">Chọn Hãng sản xuất:</option>
                        <option value="123" >123</option>
                        <option value="123" >123</option>
                        <option value="123" >123</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Chọn Model:</label>
                <br>
                <select class="form-control" name="model_id" id="product_select_model" aria-label="Default select example">
                    <option selected disabled value="">Chọn Model:</option>
                        <option value="123" >123</option>
                        <option value="123" >123</option>
                        <option value="123" >123</option>
                </select>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Thêm Mã sản phẩm</button>
        </div>
    </form>
</div>