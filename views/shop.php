<?php
$brand_in = isset($_GET['brand']) ? $_GET['brand'] : '';
$model_in = isset($_GET['model']) ? $_GET['model'] : ''
?>
<!-- ================= body Area Begin ================= -->
<div class="content">

    <div class="grid wide">
        <!-- header-breadcrumb -->
        <div class="header-breadcrumb">
            <div class="header-breadcrumb__item">
                <a href="#" class="header-breadcrumb__link">
                    Trang chủ
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item">
                <a href="#" class="header-breadcrumb__link">
                    Điện thoại
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item header-breadcrumb__item--active">
                <a href="#" class="header-breadcrumb__link">
                    iPhone
                </a>
            </div>
        </div>
        <!-- header-breadcrumb end-->

        <div class="header-filter">
            <!--##### header-filter__brand render-->
            <div class="header-filter__brand">
                <div class="header-filter__brand-wrapper">
                    <!-- ==>code-php -->
                    <?php
                    $brand = new modelbrand();
                    $rs_brand = $brand->getBrand($brand_in);
                    while ($row = $rs_brand->fetch()) :
                    ?>
                        <div class="header-filter-brand__item">
                            <a target="_self" href="index.php?action=shop&brand=<?php echo strtolower($row['brand_name']) ?>" class="header-filter-brand__link">
                                <img src="./public/image/<?php echo $row['brand_img'] ?>" alt="">
                            </a>
                        </div>
                    <?php endwhile ?>
                    <!-- ==>code-php end-->

                </div>
            </div>

            <!--##### header-filter__model render-->
            <div class="header-filter__model">
                <div class="header-filter__model-wrapper">

                    <!-- ==>code-php -->
                    <?php
                    $model = new modelbrand();
                    $rs_model = $model->getModel($brand_in);
                    while ($row = $rs_model->fetch()) :
                    ?>
                        <a class="header-filter-model__link" href="index.php?action=shop&brand=<?php echo strtolower($row['brand_name'])
                                                                                                ?>&model=<?php echo strtolower($row['model_name']) ?>">
                            <p><?php echo $row['model_name'] ?></p>
                        </a>
                    <?php endwhile ?>
                    <!-- ==>code-php end-->

                </div>
            </div>

            <div class="header-filter__spread">
            </div>

            <div class="header-filter__price">
                <div class="header-filter-price__item">
                    <p>Chọn giá</p>
                </div>
            </div>

        </div>

        <!-- product-list -->
        <div class="product-list">
            <div class="product__tiltle">
                <h2><a href="#">Điện thoại Apple iPhone VN/A Chính Hãng</a></h2>
                <div class="product-filter">
                    <p class="product-filter__context">Sắp xếp theo</p>
                    <a href="#" class="product-filter__link">
                        <i class="fa-solid fa-star"></i>
                        <p>Nổi bật</p>
                    </a>
                    <a href="#" class="product-filter__link product-filter__link--active">
                        <img src="./public/image/category-img-icon/category-sale.webp" alt="">
                        <p>Giảm nhiều</p>
                    </a>
                    <a href="#" class="product-filter__link">
                        <img src="./public/image/category-img-icon/category-percent.webp" alt="">
                        <p>Trả góp 0%</p>
                    </a>
                    <div class="product-filter__link product-filter__orderprice">
                        <i class="fa-solid fa-arrow-up-long"></i>
                        <p>Giá thấp - cao</p>

                        <div class="product-filter-orderprice__wrapper">
                            <a href="#" class="product-filter-orderprice__item">
                                <p>Giá thấp - cao</p>
                            </a>
                            <a href="#" class="product-filter-orderprice__item">
                                <p>Giá cao - thấp</p>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!--####### view product render -->
            <div class="product__wrapper rw">

                <!-- ==>code-php -->
                <?php
                $sp = new sanpham();
                $result = $sp->getAllSPbyBrand($brand_in, $model_in);
                while ($row = $result->fetch()) :
                ?>
                    <div class="column l-20 c-6">
                        <a href="index.php?action=detail&id=<?php echo $row['product_id'] ?>" class="product__item" class="product__item">
                            <div class="product__header">

                                <!-- ==>code-php -->
                                <?php if (($kq = percentSaled($row['price'], $row['sale_price'])) != 0) : ?>
                                    <p class="product__sale-off">Giảm <?php echo $kq ?>%</p>
                                <?php endif ?>
                                <!-- ==>code-php end -->
                                <p class="product__installment">Trả góp 0%</p>
                            </div>
                            <div class="product__image">
                                <img src="./public/image/sanpham/<?php echo $row['image_url'] ?>" alt="img-sanpham">
                            </div>
                            <h3 class="product__name"><?php echo $row['tensp'] . ' ' . $row['rom_name'] . ' ' . $row['type_name'] ?></h3>
                            <div class="product__price-wrapper">
                                <p class="product__sale-price"><?php echo formatCurrency($row['sale_price']) ?></p>
                                <p class="product__old-price"><?php echo formatCurrency($row['price']) ?></p>
                            </div>
                            <div class="product__banner-cheapest">
                                <img src="./public/image/main-banner/banner-cheapest.webp" alt="">
                            </div>
                        </a>
                    </div>
                <?php endwhile ?>
                <!-- ==>code-php end -->
            </div>

        </div>


        <!-- button xem thêm sản phẩm -->
        <div class="show-more">
            <button class="show-more__btn">Xem thêm <span class="show-more__number">5</span> sản phẩm</button>
        </div>
    </div>

</div>
<!-- ================= body Area End ================= -->

<!-- ================= Footer Area Begin ================= -->
<?php include('./views/layouts/footer.php')?>
<!-- ================= Footer Area End ================= -->
    

<script src="./public/javascript/main.js"></script>
<script type="module">
    <?php include('./public/javascript/header.js') ?>
    <?php include('./public/javascript/model_category.js') ?>

    // show more
    <?php
    $sp = new sanpham();
    $result_ar = $sp->getAllSPbyBrand($brand_in, $model_in);
    $data = array();
    while ($row = $result_ar->fetch()) {
        array_push($data, $row);
    }
    ?>
    showMoreProduct({
        listProduct: <?php echo json_encode($data) ?>,
        startIndex: 10
    });
</script>
<script src="https://kit.fontawesome.com/737f765a39.js" crossorigin="anonymous"></script>