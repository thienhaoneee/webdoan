<?php $id = $_GET['id']; 
    $sp = new detail();
    $result = $sp->getSanPhambyId($id);
    $masp = $result['masp']
?>
<a href="./main.php?action=sanpham_detail&act=list&masp=<?php echo $masp?>" class="sanpham-detail__btn-back">Quay lại</a>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm chi tiết:</h3>
    </div>
    <!-- /.card-header -->
    
    <!-- form start -->
    <form id="form-edit-2" enctype="multipart/form-data">
        <div class="card-body">
            <!-- default -->
                <input type="hidden" name="e_product_id" value="<?php echo $result['product_id']?>">
                <input type="hidden" name="e_masp" value="<?php echo $result['masp']?>">
            <div class="form-group mb-2">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="e_tensp" id="e_tensp" class="form-control" disabled 
                value="<?php echo 'Name: '.$result['tensp'].' - Model: '.$result['model_name'].' - Brand: '.$result['brand_name'] ?>">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group height-95">
                        <label for="">Giá:</label>
                        <input type="number" name="e_price" id="e_price" class="form-control"  
                        value="<?php echo $result['price']?>"
                        placeholder="Nhập giá sản phẩm...">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group height-95">
                        <label for="">Giá giảm:</label>
                        <input type="number" name="e_sale_price" id="e_sale_price" class="form-control"  
                        value="<?php echo $result['sale_price']?>"
                        placeholder="Nhập Giá giảm...">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <!-- màu sắc -->
                    <div class="form-group height-95">
                        <label for="">Chọn màu sắc:</label>
                        <br>
                        <select class="form-control" name="e_color_id" id="e_color_id"
                        aria-label="Default select example" disabled>
                            <option selected value=""><?php echo $result['color_name']?></option>
                            <!-- php ### -->
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>

                <div class="col-6">
                    <!-- rom -->
                    <div class="form-group height-95">
                        <label for="">Chọn dung lượng ROM:</label>
                        <br>
                        <select class="form-control" name="e_rom_id" id="e_rom_id"
                        aria-label="Default select example">
                            <option selected value="">Chọn rom</option>
                            <!-- php -->
                            <?php
                                $rom = $sp->getRom();
                                while($row = $rom->fetch()):
                            ?>
                                <option value="<?php echo $row['rom_id']?>"
                                <?php echo $result['rom_id']==$row['rom_id']?'selected':'';?>
                                >
                                    <?php echo $row['rom_name']?>
                                </option>
                            <?php endwhile ?>     
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-4">
                    <div class="form-group height-95">
                        <label for="">Loại Sản phẩm:</label>
                        <br>
                        <select class="form-control" name="e_type_id" id="e_type_id"
                        aria-label="Default select example">
                            <option selected value="">Chọn loại</option>
                            <!-- php -->
                            <?php
                                $type = $sp->getType();
                                while($row = $type->fetch()):
                            ?>
                                <option value="<?php echo $row['type_id']?>"
                                <?php echo $result['type_id']==$row['type_id']?'selected':'';?>
                                >
                                    <?php echo $row['type_name']?>
                                </option>
                            <?php endwhile ?>
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group height-95">
                        <label for="">Số lượng:</label>
                        <input type="text" name="e_quanlity" id="e_quanlity" class="form-control" 
                        value="<?php echo $result['quanlity']?>"
                        placeholder="Nhập số lượng ...">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="">Mô tả:</label>
                <textarea class="form-control" cols="30" rows="3" name="e_mota" id="e_mota"
                style="height: unset !important;"
                placeholder="Nhập mô tả ..."><?php echo $result['mota_sp']?></textarea>
                
                <span class="form-message"></span>
            </div>
            <!-- type -->
            <div class="form-group height-95">
                <label for="">Hình Ảnh:</label>
                <input type="file" name="a_image" id="e_image" class="form-control-file border"  
                placeholder="Nhập số lượng ..." onchange="loadDemoImgEdit()">
                <span class="form-message"></span>
            </div>
            
            <div class="add-detail__img-wrapper">
                <img src="<?php echo './public/image/sanpham/'.$result['image_url']?>" 
                alt="" class="add-detail__edit-img" >
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </form>
</div>