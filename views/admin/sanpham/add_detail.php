<?php 
    $masp = $_GET['masp'];
?>
<a href="./main.php?action=sanpham_detail&act=list&masp=<?php echo $masp?>" class="sanpham-detail__btn-back">Quay lại</a>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm chi tiết:</h3>
    </div>
    <!-- /.card-header -->
    <?php
        $sp = new detail();
        $result = $sp->getNamebyId($masp);

    ?>
    <!-- form start -->
    <form id="form-add-2" enctype="multipart/form-data">
        <div class="card-body">
            <!-- default -->
                <input type="hidden" name="a_masp" value="<?php echo $masp?>">
            <div class="form-group mb-2">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="a_tensp" id="a_tensp" class="form-control" disabled 
                value="<?php echo 'Name: '.$result['tensp'].' - Model: '.$result['model_name'].' - Brand: '.$result['brand_name'] ?>">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group height-95">
                        <label for="">Giá:</label>
                        <input type="number" name="a_price" id="a_price" class="form-control"  
                        value=""
                        placeholder="Nhập giá sản phẩm...">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group height-95">
                        <label for="">Giá giảm:</label>
                        <input type="number" name="a_sale_price" id="a_sale_price" class="form-control"  
                        value=""
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
                        <select class="form-control" name="a_color_id" id="a_color_id"
                        aria-label="Default select example">
                            <option selected value="">Chọn màu sắc</option>
                            <!-- php ### -->
                            <?php
                                $color = $sp->getColor();
                                while($row = $color->fetch()):
                            ?>
                                <option value="<?php echo $row['color_id']?>"><?php echo $row['color_name']?></option>
                            <?php endwhile ?>     
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>

                <div class="col-6">
                    <!-- rom -->
                    <div class="form-group height-95">
                        <label for="">Chọn dung lượng ROM:</label>
                        <br>
                        <select class="form-control" name="a_rom_id" id="a_rom_id"
                        aria-label="Default select example">
                            <option selected value="">Chọn rom</option>
                            <!-- php -->
                            <?php
                                $rom = $sp->getRom();
                                while($row = $rom->fetch()):
                            ?>
                                <option value="<?php echo $row['rom_id']?>"><?php echo $row['rom_name']?></option>
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
                        <select class="form-control" name="a_type_id" id="a_type_id"
                        aria-label="Default select example">
                            <option selected value="">Chọn loại</option>
                            <!-- php -->
                            <?php
                                $type = $sp->getType();
                                while($row = $type->fetch()):
                            ?>
                                <option value="<?php echo $row['type_id']?>"><?php echo $row['type_name']?></option>
                            <?php endwhile ?>
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group height-95">
                        <label for="">Số lượng:</label>
                        <input type="text" name="a_quanlity" id="a_quanlity" class="form-control"  value=""
                        placeholder="Nhập số lượng ...">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="">Mô tả:</label>
                <textarea class="form-control" cols="30" rows="3" name="a_mota" id="a_mota"
                style="height: unset !important;"
                placeholder="Nhập mô tả ..."></textarea>
                
                <span class="form-message"></span>
            </div>
            <!-- type -->
            <div class="form-group height-95">
                <label for="">Hình Ảnh:</label>
                <input type="file" name="a_image" id="a_image" class="form-control-file border"  value=""
                placeholder="Nhập số lượng ..." onchange="loadDemoImg()">
                <span class="form-message"></span>
            </div>
            
            <div class="add-detail__img-wrapper">
                <img src="" alt="" class="add-detail__img" >
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Thêm Mã sản phẩm</button>
        </div>
    </form>
</div>