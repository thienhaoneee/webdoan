<div class="content">
    <div class="grid wide">
        <?php
        $masp = '';
        $product_id = '';
        $tensp = '';
        $color_name = '';
        $rom_name = '';
        $sale_price = '';
        $price = '';
        $model_name = '';
        $type_name = '';
        $brand_name = '';
        $image_url = '';
        $rom_id = '';
        $color_id = '';

        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
            $sp = new sanpham();
            $row = $sp->getSPbyId($product_id);
            $masp = $row['masp'];
            $tensp = $row['tensp'];
            $color_name = $row['color_name'];
            $rom_name = $row['rom_name'];
            $sale_price = $row['sale_price'];
            $price = $row['price'];
            $model_name = $row['model_name'];
            $type_name = $row['type_name'];
            $brand_name = $row['brand_name'];
            $image_url = isset($row['image_url']) ? $row['image_url'] : '';
            $rom_id = $row['rom_id'];
            $color_id = $row['color_id'];
        }
        ?>
        <!-- ##### header-breadcrumb  render-->
        <div class="header-breadcrumb">
            <div class="header-breadcrumb__item">
                <a href="./index.php" class="header-breadcrumb__link">
                    Trang chủ
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item">
                <a href="./index.php?action=shop&brand=apple" class="header-breadcrumb__link">
                    Điện thoại
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item">
                <a href="#" class="header-breadcrumb__link">
                    <?php echo explode(" ", $tensp)[0] ?>
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item">
                <a href="./index.php?action=shop&brand=apple&model=<?php echo $model_name?>" class="header-breadcrumb__link">
                    <?php echo $model_name ?>
                </a>
            </div>
            <div class="header-breadcrumb__spread">/</div>
            <div class="header-breadcrumb__item header-breadcrumb__item--active">
                <a href="#" class="header-breadcrumb__link">
                    <?php echo "$tensp $rom_name $type_name" ?>
                </a>
            </div>
        </div>
        <!-- header-breadcrumb end-->
        <div class="single-product">
            <div class="rw ">
                <div class="column c-12 l-6">
                    <!--single-product__slider -->
                    <div class="slider slider-3 single-product__slider">
                        <div class="slider-wrapper">
                            <div class="slider-main">
                                <!-- ==> code-php -->
                                <?php
                                $image_rs = $sp->getProductImg($masp, $color_id);
                                while ($row = $image_rs->fetch()) :
                                ?>
                                    <div class="slider-item">
                                        <a href="#">
                                            <img src="./public/image/sanpham/<?php echo $row['image_url'] ?>" alt="banner" />
                                        </a>
                                    </div>
                                <?php endwhile ?>
                                <!-- ==> code-php end-->
                            </div>
                        </div>

                        <div class="slider-button-prev btn"><i class="fa fa-angle-left slider-prev"></i>
                        </div>
                        <div class="slider-button-next btn"><i class="fa fa-angle-right slider-next"></i>
                        </div>
                    </div>
                    <!--single-product__slider end -->

                    <!-- single-product__swiper -->
                    <div class="single-product__swiper">
                        <div class="single-product__swiper-wrapper">
                            <!-- ==> code-php -->
                            <?php
                            $image_rs = $sp->getProductImg($masp, $color_id);
                            while ($row = $image_rs->fetch()) :
                            ?>
                                <div class="single-product__swiper-item">
                                    <img src="./public/image/sanpham/<?php echo $row['image_url'] ?>" alt="sub-img">
                                </div>
                            <?php endwhile ?>
                            <!-- ==> code-php end-->
                        </div>

                    </div>
                    <!-- single-product__swiper end -->


                    <!-- banner Rẻ hơn các loại rẻ -->
                    <div class="single-product__cheapest">
                        <img src="./public/image/main-banner/banner-cheapest.webp" alt="">
                    </div>

                    <!-- bộ sản phẩm bao gồm... -->
                    <div class="single-product__subcontent hide-on">
                        <div class="single-product-subcontent__wrapper">
                            <svg width="17" height="15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.964 5.563v-.036c-.036-.035-.036-.071-.072-.071L8.787.542C8.75.506 8.715.506 8.679.506L.287.076C.143.076.072.148 0 .256V2.73c0 .108.036.18.143.215l2.08 1.291L.396 5.42a.326.326 0 0 0-.108.25l.108 3.695c0 .072.035.18.107.215l8.034 5.308c.036 0 .072.036.107.036.036 0 .072 0 .108-.036l8.034-5.308c.072-.036.107-.143.107-.215L17 5.671c0-.036 0-.072-.036-.108ZM8.572 1.044l7.209 4.304-7.424-.18L1.29.65l7.28.394Zm7.316 4.842-1.937 1.22H9.432l-.717-1.4 7.173.18Zm-15.35-3.3V.83l7.28 4.663-.968.932L.538 2.586Zm2.224 1.937 1.614 1.04-1.65 1.112-1.65-1.04 1.686-1.112Zm5.63 9.648L.897 9.186.825 6.137l7.567 4.698v3.336Zm.287-3.802L3.228 6.998l1.685-1.112 1.865 1.148c.108.071.252.036.323-.036l1.112-1.076.825 1.614c.036.107.143.143.251.143h3.802l-4.412 2.69Zm7.747-1.183L8.93 14.17v-3.336l7.568-4.698-.072 3.049Z" fill="#BE1E2D"></path>
                            </svg>
                            <p class="single-product-subcontent__title">
                                Bộ sản phẩm bao gồm
                            </p>
                        </div>
                        <div class="single-product-subcontent__context">
                            <p>Máy mới nguyên seal 100%, chính hãng Apple Việt Nam</p>
                            <p>Di Động Việt là đại lý uỷ quyền chính thức của Apple Việt Nam</p>
                        </div>
                        <p><b>Bộ sản phẩm:</b> Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn, Túi giấy cao
                            cấp Di Động Việt</p>
                        <div class="single-product-subcontent__wrapper">
                            <svg width="15" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.262 2.915 8.755.054a.63.63 0 0 0-.51 0l-6.507 2.86a.705.705 0 0 0-.41.65v3.478c0 4.789 2.734 9.096 6.921 10.906.16.07.341.07.502 0 4.187-1.81 6.92-6.117 6.92-10.906V3.564a.705.705 0 0 0-.409-.65Zm-.918 4.127c0 4.07-2.258 7.818-5.844 9.491-3.49-1.628-5.844-5.31-5.844-9.491V4.033L8.5 1.464l5.844 2.57v3.008Zm-6.578 2.37L10.62 6.39a.638.638 0 0 1 .94 0c.259.274.259.72 0 .994l-3.324 3.52a.638.638 0 0 1-.94 0L5.441 8.937a.733.733 0 0 1 0-.994.638.638 0 0 1 .939 0l1.386 1.468Z" fill="#BE1E2D"></path>
                            </svg>
                            <p class="single-product-subcontent__title">
                                Bảo hành
                            </p>
                        </div>
                        <div class="single-product-subcontent__context">
                            <p>
                                Độc quyền tại Di Động Việt:
                                Bảo hành Hư lỗi - Đổi mới trong vòng <b>33 ngày</b>.
                                Bảo hành chính hãng <b>12 tháng</b> (<a href="#">Xem chi tiết</a>)
                            </p>
                        </div>
                        <p>Bảo hành Hư lỗi - Đổi mới <b>12 tháng</b>, rơi vỡ với D.Care (<a href="#">Xem chi
                                tiết</a>)</p>

                    </div>

                    <!-- description -->
                    <div class="single-product__description hide-on">
                        <p>
                            <b>iPhone 14 Pro Max 256GB Chính hãng (VN/A)</b>
                            chính thống giá <strong>RẺ HƠN CÁC LOẠI RẺ</strong> chỉ có tại Di Động Việt -
                            <b>Đại lý uỷ quyền chính thức của Apple</b> tại Việt Nam. Với thiết kế thời
                            thượng
                            và các tính năng hiện đại, chiếc smartphone này sẽ mang đến cho bạn trải nghiệm
                            đầy
                            cảm xúc với khả năng sáng tạo bứt phá với bộ 3 camera gồm: <b>48MP</b> và 2
                            camera <b>12MP</b>,
                            kết hợp với hiệu năng mạnh mẽ từ <b>chipset Apple A16 Bionic 6 nhân.</b> Bên
                            cạnh đó, với
                            dung lượng pin lớn cho phép người dùng trải nghiệm dài lâu.
                            Đặt ngay để có trải nghiệm mua sắm <b>Hơn cả Chính Hãng.</b>
                        </p>
                    </div>
                </div>

                <div class="column c-12 l-6">
                    <!-- ##### single-product__info render -->
                    <div class="single-product__info">

                        <h1 class="single-product__name">
                            <?php echo "$tensp $rom_name $type_name " ?>
                        </h1>

                        <div class="single-product__wrapper-sku">
                            <p class="single-product__sku">
                                SKU: <?php echo $masp . '-9350000' . $product_id ?>
                            </p>
                        </div>
                        <!-- rom render -->
                        <div class="single-product__list-rom">
                            <!-- ==> code-php -->
                            <?php
                            $rom_rs = $sp->getRom($masp, $color_id);
                            while ($col = $rom_rs->fetch()) :
                            ?>
                                <a href="index.php?action=detail&id=<?php echo $col['product_id'] ?>" class="single-product__rom-link <?php if ($col['rom_id'] == $rom_id) echo 'single-product__rom--active' ?>">
                                    <div class="single-product__rom">
                                        <?php echo strtoupper($col['rom_name']) ?>
                                    </div>
                                    <img src="./public/image/header/checked-rom.png" class="single-product__rom-check" alt="">
                                </a>
                            <?php endwhile ?>
                            <!-- ==> code-php end -->
                        </div>

                        <p class="single-product__label-color">Chọn màu để xem giá chi tiết:</p>
                        <!-- ##### color render -->
                        <div class="single-product__list-color">
                            <!-- ==> code-php -->
                            <?php
                            $color_rs = $sp->getColor($masp, $rom_id);
                            while ($col = $color_rs->fetch()) :
                            ?>
                                <a href="index.php?action=detail&id=<?php echo $col['product_id'] ?>" class="single-product__color-link <?php if ($col['color_id'] == $color_id) echo 'single-product__color--active' ?>">
                                    <div class="single-product__color">
                                        <?php echo $col['color_name'] ?>
                                    </div>
                                    <img src="./public/image/header/checked-rom.png" class="single-product__color-check" alt="">
                                </a>
                            <?php endwhile ?>
                            <!-- ==> code-php -->

                        </div>
                        <p class="single-product__label-price">Giá bán</p>
                        <div class="single-product__price">
                            <div class="single-product__price-wrapper">
                            <?php if($sale_price) {?>
                                    <p class="single-product__sale-price"><?php echo formatCurrency($sale_price) ?></p>
                                    <span class="single-product__old-price"><?php echo formatCurrency($price) ?></span>
                                <?php } else {?>
                                    <p class="single-product__sale-price"><?php echo formatCurrency($price) ?></p>

                                <?php }?>
                            </div>
                            <p class="single-product__pay-before">
                                Trả trước chỉ từ <br> <span><?php echo formatCurrency($sale_price / 2) ?></span>
                            </p>
                        </div>
                        <button class="single-product__branch-store">
                            <p>Còn Hàng:</p>
                            <i class="fa-solid fa-shop"></i>
                            <p>Xem chi nhánh còn hàng <i class="fa-solid fa-angle-down"></i></p>
                        </button>

                        <!-- promotion -->
                        <div class="promotion">
                            <div class="promotion__title">
                                Khuyến mãi
                            </div>
                            <div class="promotion__content">
                                <p class="promotion__head">
                                    1. Giá chỉ từ <strong class="promotion__big-number">
                                        <?php echo formatCurrency($sale_price - $sale_price * 0.1) ?>
                                    </strong>
                                    khi áp dụng đồng thời các ưu đãi sau
                                </p>
                                <ul class="promotion-content__list1">
                                    <li>
                                        Tặng thêm <strong>2.000.000đ</strong> khi thu cũ đổi mới <a href="#">(Xem chi tiết)</a>
                                    </li>
                                    <li>
                                        Trả góp 0% lãi suất qua công ty tài chính <a href="#">(Xem chi
                                            tiết)</a>
                                    </li>
                                </ul>
                                <p class="promotion__head">
                                    2. Ưu đãi khi mua cùng máy
                                </p>
                                <ul class="promotion-content__list">
                                    <li>
                                        <a href="#">Combo Cáp Sạc </a>giá chỉ từ <strong>390.000đ</strong>
                                        & bảo hành <strong>5 năm</strong>
                                    </li>
                                    <li>
                                        <a href="#">Kính cường lực </a>bảo hành <strong>90 ngày, 1 đổi
                                            1</strong>
                                    </li>
                                    <li>
                                        <a href="#">Pin sạc dự phòng </a>giá từ <strong>190.000đ</strong>
                                    </li>
                                    <li>
                                        <b>Dán PPF bảo vệ máy </b>bảo hành <strong>90 ngày, 1 đổi 1</strong>
                                    </li>
                                    <li>
                                        <a href="#">Apple Watch Series 8 </a>giá chỉ từ
                                        <strong>8.690.000đ</strong>
                                    </li>
                                    <li>
                                        <a href="#">Airpods 3 </a>giá sốc chỉ <strong>3.990.000đ</strong>
                                    </li>
                                    <li>
                                        <a href="#">Airpods Pro 2 </a>giá sốc chỉ
                                        <strong>5.690.000đ</strong>
                                    </li>
                                </ul>
                                <p><small>*Đối với màu vàng: Ưu đãi chỉ áp dụng khi Quý khách mua cùng máy
                                        tại CH</small></p>
                            </div>
                        </div>
                        <!-- promotion end -->
                        <button class="single-product__btn single-product__order-btn " onclick="addtoCart(<?php echo $product_id?>)">
                            <div class="">
                                <p>Đặt ngay</p>
                                <p>Giao tận nơi</p>
                            </div>
                        </button>

                        <div class="rw">
                            <div class="column c-6">
                                <button class="single-product__btn single-product__installment-btn">
                                    <div class="">
                                        <p>Trả góp 0%</p>
                                        <p>Duyệt nhanh qua điện thoại</p>
                                    </div>
                                </button>
                            </div>
                            <div class="column c-6">
                                <button class="single-product__btn single-product__installment-btn">
                                    <div class="">
                                        <p>Trả góp qua thẻ</p>
                                        <p>Visa, MasterCard, JCB</p>
                                    </div>
                                </button>
                            </div>
                        </div>


                        <p class="single-product__calltobuy">
                            Gọi đặt mua <strong>1800.6018</strong> (7:30 - 22:00)
                        </p>

                        <!-- mobile single-product__subcontent  -->
                        <!-- bộ sản phẩm bao gồm... -->
                        <div class="single-product__subcontent single-product__subcontent--mobile">
                            <div class="single-product-subcontent__wrapper">
                                <svg width="17" height="15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.964 5.563v-.036c-.036-.035-.036-.071-.072-.071L8.787.542C8.75.506 8.715.506 8.679.506L.287.076C.143.076.072.148 0 .256V2.73c0 .108.036.18.143.215l2.08 1.291L.396 5.42a.326.326 0 0 0-.108.25l.108 3.695c0 .072.035.18.107.215l8.034 5.308c.036 0 .072.036.107.036.036 0 .072 0 .108-.036l8.034-5.308c.072-.036.107-.143.107-.215L17 5.671c0-.036 0-.072-.036-.108ZM8.572 1.044l7.209 4.304-7.424-.18L1.29.65l7.28.394Zm7.316 4.842-1.937 1.22H9.432l-.717-1.4 7.173.18Zm-15.35-3.3V.83l7.28 4.663-.968.932L.538 2.586Zm2.224 1.937 1.614 1.04-1.65 1.112-1.65-1.04 1.686-1.112Zm5.63 9.648L.897 9.186.825 6.137l7.567 4.698v3.336Zm.287-3.802L3.228 6.998l1.685-1.112 1.865 1.148c.108.071.252.036.323-.036l1.112-1.076.825 1.614c.036.107.143.143.251.143h3.802l-4.412 2.69Zm7.747-1.183L8.93 14.17v-3.336l7.568-4.698-.072 3.049Z" fill="#BE1E2D"></path>
                                </svg>
                                <p class="single-product-subcontent__title">
                                    Bộ sản phẩm bao gồm
                                </p>
                            </div>
                            <div class="single-product-subcontent__context">
                                <p>Máy mới nguyên seal 100%, chính hãng Apple Việt Nam</p>
                                <p>Di Động Việt là đại lý uỷ quyền chính thức của Apple Việt Nam</p>
                            </div>
                            <p><b>Bộ sản phẩm:</b> Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn, Túi giấy cao
                                cấp Di Động Việt</p>
                            <div class="single-product-subcontent__wrapper">
                                <svg width="15" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.262 2.915 8.755.054a.63.63 0 0 0-.51 0l-6.507 2.86a.705.705 0 0 0-.41.65v3.478c0 4.789 2.734 9.096 6.921 10.906.16.07.341.07.502 0 4.187-1.81 6.92-6.117 6.92-10.906V3.564a.705.705 0 0 0-.409-.65Zm-.918 4.127c0 4.07-2.258 7.818-5.844 9.491-3.49-1.628-5.844-5.31-5.844-9.491V4.033L8.5 1.464l5.844 2.57v3.008Zm-6.578 2.37L10.62 6.39a.638.638 0 0 1 .94 0c.259.274.259.72 0 .994l-3.324 3.52a.638.638 0 0 1-.94 0L5.441 8.937a.733.733 0 0 1 0-.994.638.638 0 0 1 .939 0l1.386 1.468Z" fill="#BE1E2D"></path>
                                </svg>
                                <p class="single-product-subcontent__title">
                                    Bảo hành
                                </p>
                            </div>
                            <div class="single-product-subcontent__context">
                                <p>
                                    Độc quyền tại Di Động Việt:
                                    Bảo hành Hư lỗi - Đổi mới trong vòng <b>33 ngày</b>.
                                    Bảo hành chính hãng <b>12 tháng</b> (<a href="#">Xem chi tiết</a>)
                                </p>
                            </div>
                            <p>Bảo hành Hư lỗi - Đổi mới <b>12 tháng</b>, rơi vỡ với D.Care (<a href="#">Xem chi
                                    tiết</a>)</p>

                        </div>

                        <!-- promotion -->
                        <div class="promotion promotion--green">
                            <div class="promotion__title">
                                Ưu đãi dịch vụ
                            </div>
                            <div class="promotion__endow-list">
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh1.svg" alt="">
                                    <p>
                                        Giảm thêm tới <b>1.5%</b>
                                        cho thành viên của Di Động Việt.
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh2.svg" alt="">
                                    <p>
                                        Chỉ từ 2K/ngày có ngay Gói Bảo Hành Hư Lỗi - Đổi Mới trong 1 năm
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh3.svg" alt="">
                                    <p>
                                        Miễn phí Giao hàng siêu tốc trong <b>1 giờ</b>
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh4.png" alt="">
                                    <p>
                                        Giảm thêm <b>5%</b> tối đa <b>200.000đ</b>
                                        thanh toán qua Kredivo
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh5.png" alt="">
                                    <p>
                                        Giảm thêm <b>400.000đ</b>
                                        mở thẻ qua VIB
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh6.jpg" alt="">
                                    <p>
                                        Giảm thêm <b>500.000đ</b>
                                        thanh toán qua OCB
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                                <div class="promotion__endow-item">
                                    <img src="./public/image/gift-icon/giftxanh7.png" alt="">
                                    <p>
                                        Giảm thêm <b>500.000đ</b>
                                        thanh toán qua VPBANK
                                        <a href="#" style="display: inline;">(Xem chi tiết)</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- promotion end -->

                        <!-- mobile -->
                        <!-- description -->
                        <div class="single-product__description single-product__description--tablet show-on-tablet">
                            <p>
                                <b>iPhone 14 Pro Max 256GB Chính hãng (VN/A)</b>
                                chính thống giá <strong>RẺ HƠN CÁC LOẠI RẺ</strong> chỉ có tại Di Động Việt -
                                <b>Đại lý uỷ quyền chính thức của Apple</b> tại Việt Nam. Với thiết kế thời
                                thượng
                                và các tính năng hiện đại, chiếc smartphone này sẽ mang đến cho bạn trải nghiệm
                                đầy
                                cảm xúc với khả năng sáng tạo bứt phá với bộ 3 camera gồm: <b>48MP</b> và 2
                                camera <b>12MP</b>,
                                kết hợp với hiệu năng mạnh mẽ từ <b>chipset Apple A16 Bionic 6 nhân.</b> Bên
                                cạnh đó, với
                                dung lượng pin lớn cho phép người dùng trải nghiệm dài lâu.
                                Đặt ngay để có trải nghiệm mua sắm <b>Hơn cả Chính Hãng.</b>
                            </p>
                        </div>
                    </div>
                    <!-- single-product__info end -->


                </div>
            </div>


        </div>

        <!--product-iphone-->
        <div class="product-list product-list--same">
            <div class="product__tiltle">
                <h2><a href="#">Sản Phẩm Tương Tự</a></h2>
            </div>

            <!--####### view product render -->
            <div class="product__wrapper rw">
                <?php
                $sp = new sanpham();
                $result = $sp->getSameProduct($product_id);
                while ($row = $result->fetch()) :
                ?>
                    <div class="column l-20 c-6">
                        <a href="index.php?action=detail&id=<?php echo $row['product_id'] ?>" class="product__item">
                            <div class="product__header">
                                <p class="product__sale-off">Giảm 25%</p>
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

            </div>

        </div>
        <!--product-iphone end-->


        <!-- Comment section -->
        <div class="rw">
            <section class="column c-12 m-8">
                <div class="product-single__comment">
                    <!-- form comment -->
                    <form class="product-single-comment__form" id="product-single-comment__form">
                        <p class="product-single-comment__title">Bình luận</p>
                        <?php 
                            $user_id = '';
                            if(isset($_SESSION['user'])) {
                                $user_id = $_SESSION['user']['makh'];
                            }
                        ?>
                        <input type="hidden" value="<?php echo $user_id?>" name="makh" class="product-comment__user-id">
                        <input type="hidden" value="<?php echo $product_id?>" name="product_id">
                        <div class="rw">
                            <div class="column c-9">
                                <div class="form-group">
                                    <textarea class="product-single-comment__textarea" 
                                    name="content" id="" cols="" rows="5"
                                    placeholder="Nhận xét về sản phẩm"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="column c-3">
                                <div class="product-single-comment__btn-wrapper">
                                    <button type="button" class="product-single-comment__btn" onclick="submitComment()">Bình luận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                    <!-- comment-wrapper -->
                    <div class="product-single-comment__content-wrapper">
                        <?php
                            $cmt = new comment();
                            $comments = $cmt->getComment($product_id);
                            $check = $cmt->checkComment($product_id);
                            if($check == true){
                            while($comment = $comments->fetch()):
                        ?>
                        <!-- comment-item -->
                        <div class="product-single-comment__item">
                            <div class="product-single-comment__item-user">
                                <div class="product-single-comment__item-img">
                                    <img src="./public/image/icon/user-default.png" alt="">
                                </div>
                                <div class="product-single-comment__item-info">
                                    <p class="product-single-comment__item-username"><?php echo $comment['khachhang_name']?></p>
                                    <p class="product-single-comment__item-content"><?php echo $comment['content']?></p>
                                    <p class="product-single-comment__item-time"><?php echo $comment['created_at']?></p>
                                </div>
                            </div>
                            <div class="product-single-comment__item-btn-wrapper">
                                <button class="product-single-comment__item-btn"
                                onclick="showViewSubComment(<?php echo $comment['cmt_id'] ?>,<?php echo $user_id==''?0:$user_id;?>, <?php echo $product_id?>)"
                                ><i class="fa-regular fa-comments"></i> Bình luận</button>
                            </div>

                            <!-- insert comment -->
                            <div class="form-wrapper__id-<?php echo $comment['cmt_id']?>"></div>
                            
                            <!-- insert comment -->

                            <!-- freeback -->
                            <div class="product-single-comment__feedback-<?php echo $comment['cmt_id']?>">
                                <!-- freeback-item -->
                                    <?php
                                        $subs = $cmt->getComment($product_id,$comment['cmt_id']);
                                        if($subs) while($sub = $subs->fetch()):
                                    ?>
                                    <div class="product-single-comment__feedback-item">
                                        <div class="product-single-comment__feedback-img">
                                            <img src="./public/image/icon/user-default.png" alt="">
                                        </div>
                                        <div class="product-single-comment__feedback-info">
                                            <p class="product-single-comment__feedback-username"><?php echo $sub['khachhang_name']?></p>
                                            <p class="product-single-comment__feedback-content"><?php echo $sub['content']?></p>
                                            <p class="product-single-comment__feedback-time"><?php echo $sub['created_at']?></p>
                                        </div>
                                    </div>
                                    <?php endwhile?>
                            </div>
                            <!-- end freeback -->

                        </div>
                        <!-- comment-item -->
                        <?php endwhile; } else { ?>
                            <!-- nocomment -->
                            <div class="product-single-nocomment">
                                <div class="product-single-nocomment-img">
                                    <img src="./public/image/nocomment.png" alt="">
                                    <p>Chưa có bình luận nào</p>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <!-- end comment-wrapper -->

                    
                </div>
            </section>
        </div>
        <!-- Comment section -->

    </div>
</div>

<!-- ================= Footer Area Begin ================= -->
<?php include('./views/layouts/footer.php')?>
<!-- ================= Footer Area End ================= -->

</div>
</div>


<script src="./public/javascript/main.js"></script>
<script src="./public/javascript/header.js"></script>
<script src="./public/javascript/swiper.js"></script>
<script src="./public/javascript/comment.js"></script>
<script type="module">
    usingSwiper(3)
</script>
<script src="https://kit.fontawesome.com/737f765a39.js" crossorigin="anonymous"></script>