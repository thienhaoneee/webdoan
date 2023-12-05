


<div class="cart">
    <!-- php code -->
    <?php
        if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0):
    ?>
    <div class="grid wide">
        <a href="./index.php" class="cart-continue">
            Tiếp tục mua hàng
        </a>
        <div class="cart-null__wrapper">
            <div class="cart-null__img">
                <img src="./public/image/cart-empty.png" alt="">
            </div>
            <p class="cart-null__sub">Không có sản phẩm nào</p>
            <a href="./index.php" class="cart-null__btn-back">Tiếp tục mua sắm</a>
            <p class="cart-null__help">Khi cần trợ giúp, vui lòng gọi <a class="#" href="">1800.6018</a> (7:30 - 22:00)</p>
        </div>

    </div>

    <?php else:?>
        <div class="grid wide">
            <?php 
                $user_id = '';
                if(isset($_SESSION['user'])) {
                    $user_id = $_SESSION['user']['makh'];
                }
            ?>
            <input type="hidden" value="<?php echo $user_id?>" class="cart-check__makh">
                <a href="./index.php" class="cart-continue">Tiếp tục mua hàng</a>
            <?php
                $crt = new cart();
            ?>
            <div class="cart-wrapper">
                <div class="rw">
                    <div class="column c-12 m-8">
                        <div class="cart-shopping">
                            <div class="cart-shopping__title-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><g clip-path="url(#cart_svg__a)"><path fill="#BE1E2D" d="M22.896 1.334v5.238c0 .23-.186.416-.416.416h-1.517a.417.417 0 0 1-.416-.416v-.707a2.113 2.113 0 0 0-2.113-2.113h-1.17a.42.42 0 0 1-.413-.36 2.107 2.107 0 0 0-2.085-1.798h-.552a.418.418 0 0 1-.406-.51c.157-.703.65-1.03 1.227-1.03h6.581c.707 0 1.28.573 1.28 1.28Zm-6.975 1.83a1.27 1.27 0 0 0-1.155-.736h-4.532a1.28 1.28 0 0 0-1.28 1.28v2.864c0 .23.187.416.417.416h2.595c.23 0 .417-.186.417-.416v-.707c0-1.167.946-2.113 2.113-2.113h1.045a.416.416 0 0 0 .38-.588Zm2.513 1.421h-3.938a1.28 1.28 0 0 0-1.28 1.28v.707c0 .23.187.416.417.416h5.664c.23 0 .416-.186.416-.416v-.707a1.28 1.28 0 0 0-1.28-1.28ZM7.618 19.767h13.25c.792 0 1.476-.537 1.663-1.307l2.457-10.123a.417.417 0 0 0-.405-.515H6.901l-.1-.774a1.715 1.715 0 0 0-1.697-1.492h-3.42C.756 5.556 0 6.312 0 7.24c0 .93.756 1.685 1.684 1.685h1.474c.92 0 1.667-.748 1.667-1.667V6.39h.28c.44 0 .814.33.87.766l1.52 11.782a2.227 2.227 0 0 0-2.1 2.22c0 1.227.997 2.224 2.223 2.224h.356a1.984 1.984 0 0 0 1.937 1.565c.949 0 1.744-.672 1.936-1.565h6.916a1.984 1.984 0 0 0 1.936 1.565 1.983 1.983 0 0 0 1.981-1.981 1.983 1.983 0 0 0-1.98-1.981c-.95 0-1.745.671-1.937 1.564h-6.916a1.984 1.984 0 0 0-1.936-1.564c-.95 0-1.745.671-1.937 1.564h-.356c-.767 0-1.39-.624-1.39-1.39 0-.767.623-1.39 1.39-1.39Z"></path></g><defs><clipPath id="cart_svg__a"><path fill="#fff" d="M0 0h25v25H0z"></path></clipPath></defs></svg>
                                <p>Giỏ hàng (<span><?php echo $crt->getCountCart()?></span> Sản Phẩm)</p>
                            </div>
                            <div class="cart-shopping__wrapper">
                                <div class="cart-shopping__row cart-shopping__row-header">
                                    <div class="col-span-3">
                                        <p>Tên sản phẩm</p>
                                    </div>
                                    <div class="col-span-1">
                                        <p>Đơn giá</p>
                                    </div>
                                    <div class="col-span-1">
                                        <p>Số lượng</p>
                                    </div>
                                    <div class="col-span-1">
                                        <p>Thành tiền</p>
                                    </div>
                                    <div class="col-span-1">
                                        <p>Thao tác</p>
                                    </div>
                                </div>
                                <!-- body -->
                                <?php
                                    foreach($_SESSION['cart'] as $key=>$item):
                                    $total = $item['price'] * $item['quantity'];
                                
                                ?>
                                <!-- ##### view body cart render -->
                                <div class="cart-shopping__row cart-shopping__row-content cart-product-<?php echo $item['id'] ?>" data-productid="<?php echo $item['id']?>">
                                    <div class="col-span-3">
                                        <div class="cart-shopping__col-name">
                                            <img src="./public/image/sanpham/<?php echo $item['image_url']?>" alt="Image">
                                            <p><?php echo $item['tensp'].'-'.$item['rom_name'].'-'.$item['color_name'].'-'.$item['type_name']
                                            ?></p>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="cart-shopping__col-price"><?php echo formatCurrency($item['price'])?></div>
                                    </div>
                                    <div class="col-span-1">
                                        <td class="cart-shopping__col-quantity-wrapper">
                                            <div class="cart-shopping__col-quantity">
                                                <button class="cart-shopping__col-quantity-btn" onclick="deCreaseQuantity(<?php echo $item['id'] ?>)">
                                                    <span>-</span>
                                                </button>
                                                <input type="text" class="cart-shopping__col-quantity-input" value="<?php echo $item['quantity']?>" disabled>
                                                <button class="cart-shopping__col-quantity-btn" onclick="inCreaseQuantity(<?php echo $item['id'] ?>)">
                                                    <span>+</span>
                                                </button>
                                            </div>
                                        </td>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="cart-shopping__col-total"><?php echo formatCurrency($total)?></div>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="cart-shopping__col-delete-btn" >
                                            <button type="button" onclick="deleteItemCart(<?php echo $item['id']?>)">
                                                <img src="./public/image/icon/trash.svg" alt="" width="18px" height="18px">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="column c-12 m-4">
                        <div class="cart-total">
                            <div class="cart-total__title-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><path fill="#BE1E2D" d="M16.943 8.887c-4.442 0-8.056 3.614-8.056 8.056C8.887 21.386 12.5 25 16.943 25 21.386 25 25 21.386 25 16.943c0-4.442-3.614-8.056-8.057-8.056Zm0 7.324a2.2 2.2 0 0 1 2.198 2.197c0 .954-.614 1.76-1.465 2.063v1.6H16.21v-1.6a2.194 2.194 0 0 1-1.465-2.063h1.465a.733.733 0 1 0 .732-.732 2.2 2.2 0 0 1-2.197-2.197c0-.954.614-1.76 1.465-2.063v-1.6h1.465v1.6a2.194 2.194 0 0 1 1.465 2.063h-1.465a.733.733 0 1 0-.733.732ZM8.154 8.887c4.518 0 8.057-1.93 8.057-4.395C16.21 2.028 12.67 0 8.154 0S0 2.028 0 4.492s3.637 4.395 8.154 4.395ZM0 16.482v1.194c0 2.464 3.637 4.394 8.154 4.394.257 0 .505-.023.757-.036a9.461 9.461 0 0 1-1.227-2.911c-3.267-.09-6.104-1.094-7.684-2.64ZM7.457 17.639c-.017-.23-.035-.461-.035-.696 0-.763.1-1.502.27-2.214-3.27-.089-6.11-1.093-7.692-2.641v1.193c0 2.334 3.284 4.167 7.457 4.357ZM8.154 13.281h.003a9.553 9.553 0 0 1 2.057-3.067c-.662.083-1.345.138-2.06.138-3.477 0-6.497-1.037-8.154-2.659v1.194c0 2.464 3.637 4.394 8.154 4.394Z"></path></svg>
                                <p>Tạm Tính</p>
                            </div>
                            <div class="cart-total__money-wrapper">
                                <p>Tổng cộng</p>
                                <div class="cart-total__money-price">
                                    <?php
                                        $cart = new cart;
                                        $re = $cart->getTotalAll();
                                        echo formatCurrency($re);
                                    ?>
                                </div>
                            </div>
                            <div class="cart-total__checkout-btn">
                                <a onclick="checkOutCart()">
                                    Đặt hàng (<span><?php echo $crt->getCountCart()?></span>)
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif?>
</div>

<?php include('./views/layouts/footer.php') ?>

<script src="./public/javascript/header.js"></script>
<script src="./public/javascript/checkout.js"></script>
<script>
 <?php //include('./public/javascript/header.js') ?>
 <?php //include('./public/javascript/checkout.js') ?>
</script>