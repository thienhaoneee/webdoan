


<div class="checkout">
    <!-- php code -->
    <?php
        if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0):
            header('location: ./index.php');
    else:
        $user = $_SESSION['user'];
        $cart = new cart();
        $re = $cart->getTotalAll();
    ?>
    <div class="grid wide">
        <a href="./index.php" class="checkout-continue" >Tiếp tục mua hàng</a>
    
        <div class="checkout-wrapper">
            <div class="rw">
                <div class="column c-12 m-8">
                    <div class="checkout-shopping">
                        <div class="checkout-shopping__title-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><g clip-path="url(#cart_svg__a)"><path fill="#BE1E2D" d="M22.896 1.334v5.238c0 .23-.186.416-.416.416h-1.517a.417.417 0 0 1-.416-.416v-.707a2.113 2.113 0 0 0-2.113-2.113h-1.17a.42.42 0 0 1-.413-.36 2.107 2.107 0 0 0-2.085-1.798h-.552a.418.418 0 0 1-.406-.51c.157-.703.65-1.03 1.227-1.03h6.581c.707 0 1.28.573 1.28 1.28Zm-6.975 1.83a1.27 1.27 0 0 0-1.155-.736h-4.532a1.28 1.28 0 0 0-1.28 1.28v2.864c0 .23.187.416.417.416h2.595c.23 0 .417-.186.417-.416v-.707c0-1.167.946-2.113 2.113-2.113h1.045a.416.416 0 0 0 .38-.588Zm2.513 1.421h-3.938a1.28 1.28 0 0 0-1.28 1.28v.707c0 .23.187.416.417.416h5.664c.23 0 .416-.186.416-.416v-.707a1.28 1.28 0 0 0-1.28-1.28ZM7.618 19.767h13.25c.792 0 1.476-.537 1.663-1.307l2.457-10.123a.417.417 0 0 0-.405-.515H6.901l-.1-.774a1.715 1.715 0 0 0-1.697-1.492h-3.42C.756 5.556 0 6.312 0 7.24c0 .93.756 1.685 1.684 1.685h1.474c.92 0 1.667-.748 1.667-1.667V6.39h.28c.44 0 .814.33.87.766l1.52 11.782a2.227 2.227 0 0 0-2.1 2.22c0 1.227.997 2.224 2.223 2.224h.356a1.984 1.984 0 0 0 1.937 1.565c.949 0 1.744-.672 1.936-1.565h6.916a1.984 1.984 0 0 0 1.936 1.565 1.983 1.983 0 0 0 1.981-1.981 1.983 1.983 0 0 0-1.98-1.981c-.95 0-1.745.671-1.937 1.564h-6.916a1.984 1.984 0 0 0-1.936-1.564c-.95 0-1.745.671-1.937 1.564h-.356c-.767 0-1.39-.624-1.39-1.39 0-.767.623-1.39 1.39-1.39Z"></path></g><defs><clipPath id="cart_svg__a"><path fill="#fff" d="M0 0h25v25H0z"></path></clipPath></defs></svg>
                            <p>Giỏ hàng (<span><?php echo $cart->getCountCart()?></span> Sản Phẩm)</p>
                        </div>
                        <div class="checkout-shopping__wrapper">

                        <?php
                            foreach($_SESSION['cart'] as $key=>$item):

                        ?>
                                <!-- ##### view body cart render -->
                                <div class="checkout-shopping__item">
                                    <div class="checkout-shopping__item-img">
                                        <img src="./public/image/sanpham/<?php echo $item['image_url']?>" alt="">
                                    </div>
                                    <div class="checkout-shopping__item-content">
                                        <p><?php echo $item['tensp'].' - '.$item['rom_name'].' - '.$item['color_name'].' - '.$item['type_name']?></p>
                                        <div class="checkout-shopping__item-subcontent">
                                            <div class="checkout-shopping__item-price"><?php echo formatCurrency($item['price'])?></div>
                                            <span>SL: <?php echo $item['quantity']?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                    <div class="checkout-info">
                        <div class="checkout-info__title-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><g clip-path="url(#package_svg__a)"><path fill="#BE1E2D" d="M24.445 6.184V6.13c-.027-.053-.027-.106-.053-.159v-.026c-.026-.053-.08-.106-.106-.132l-.026-.027c-.027-.026-.08-.053-.106-.079l-.026-.026H24.1l-.026-.027L12.844.08a.842.842 0 0 0-.714 0L8.351 1.956l11.284 5.787.027.026c.026 0 .026.027.053.027.026.026.026.052.052.079v6.21a.277.277 0 0 1-.132.238l-2.272 1.189c-.133.08-.291.026-.37-.106-.027-.026-.027-.079-.027-.132V9.276L5.55 3.382l-.026-.027L.952 5.63l-.026.026H.899l-.026.027c-.027.026-.08.052-.106.079l-.026.026c-.053.053-.08.106-.132.159v.026a.376.376 0 0 0-.053.159v.053c0 .053-.027.079-.027.132v12.341c0 .29.159.581.45.713l11.125 5.55c.158.079.343.105.528.052l.053-.026c.053 0 .08-.026.132-.053l11.205-5.55a.796.796 0 0 0 .45-.713V6.316c-.027-.053-.027-.08-.027-.132Z"></path></g><defs><clipPath id="package_svg__a"><path fill="#fff" d="M0 0h25v25H0z"></path></clipPath></defs></svg>
                            <p>Thông tin khách hàng</p>
                        </div>
                        <form class="checkout-info__form" id="form-checkout-1">
                            <div class="rw">
                                <input type="hidden" value="<?php echo $user['makh']?>">
                                <div class="column c-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Họ tên người nhận:</label>
                                        <input type="text" class="form-control" name="user_name" id="user_name3"
                                        value="<?php echo $user['name']?>"
                                        placeholder="Nhập họ tên người nhận">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                      <div class="column c-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Số điện thoại người nhận:</label>
                                        <input type="text" class="form-control" name="user_phone" id="user_phone3" 
                                        value="<?php echo $user['phone']?>"
                                        placeholder="Số điện thoại người nhận">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="form-label">Email người nhận:</label>
                                <input type="email" class="form-control" name="user_email" id="user_email3" 
                                value="<?php echo $user['email']?>"
                                placeholder="Nhập Email người nhận">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Địa chỉ người nhận:</label>
                                <input type="text" class="form-control" name="user_address" id="user_address3" 
                                value="<?php echo $user['diachi']?>"
                                placeholder="Nhập họ tên người nhận">
                                <span class="form-message"></span>
                            </div>
                            <button class="checkout-shopping__btn-checkout--hidden" type="submit">Thanh toán</button>   
                        </form>
                    </div>
                </div>
    
                <div class="column c-12 m-4">
                    <div class="checkout-total">
                        <div class="checkout-total__title-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"><path fill="#BE1E2D" d="M16.943 8.887c-4.442 0-8.056 3.614-8.056 8.056C8.887 21.386 12.5 25 16.943 25 21.386 25 25 21.386 25 16.943c0-4.442-3.614-8.056-8.057-8.056Zm0 7.324a2.2 2.2 0 0 1 2.198 2.197c0 .954-.614 1.76-1.465 2.063v1.6H16.21v-1.6a2.194 2.194 0 0 1-1.465-2.063h1.465a.733.733 0 1 0 .732-.732 2.2 2.2 0 0 1-2.197-2.197c0-.954.614-1.76 1.465-2.063v-1.6h1.465v1.6a2.194 2.194 0 0 1 1.465 2.063h-1.465a.733.733 0 1 0-.733.732ZM8.154 8.887c4.518 0 8.057-1.93 8.057-4.395C16.21 2.028 12.67 0 8.154 0S0 2.028 0 4.492s3.637 4.395 8.154 4.395ZM0 16.482v1.194c0 2.464 3.637 4.394 8.154 4.394.257 0 .505-.023.757-.036a9.461 9.461 0 0 1-1.227-2.911c-3.267-.09-6.104-1.094-7.684-2.64ZM7.457 17.639c-.017-.23-.035-.461-.035-.696 0-.763.1-1.502.27-2.214-3.27-.089-6.11-1.093-7.692-2.641v1.193c0 2.334 3.284 4.167 7.457 4.357ZM8.154 13.281h.003a9.553 9.553 0 0 1 2.057-3.067c-.662.083-1.345.138-2.06.138-3.477 0-6.497-1.037-8.154-2.659v1.194c0 2.464 3.637 4.394 8.154 4.394Z"></path></svg>
                            <p>Tạm Tính</p>
                        </div>
                        <div class="checkout-total__item">
                            <p>Tiền hàng:</p>
                            <span class="checkout-total__item-price"><?php echo formatCurrency($re);?></span>
                        </div>
                        <div class="checkout-total__item checkout-total__item--last">
                            <p>Phí vận chuyển:</p>
                            <span class="checkout-total__item-ship">0đ</span>
                        </div>
                        <div class="checkout-total__money-wrapper">
                            <p>Tổng cộng:</p>
                            <div class="checkout-total__money-price">
                                <?php
                                    echo formatCurrency($re);
                                ?>
                            </div>
                        </div>
                        <div class="checkout-total__payment-btn" onclick="submitCheckOut()">
                            <a href="#">
                                Thanh toán
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal-checkout" onclick="modalCheckoutClose()">
            <div class="modal-checkout__container">
                <!-- <h3 class="modal-title">Hóa đơn thanh toán</h3> -->
                 <div class="modal-header">
                    <h4 class="modal-title">Thanh toán hóa đơn thành công!</h4>
                    <button type="button" class="btn-close" onclick="modalCheckoutClose()">&times;</button>
                </div>
                <div class="modal-checkout__body">
                    <div class="output-form mb-1">
                        <label for="" class="output-label">Họ và tên khách:</label>
                        <p class="output-out checkout-item__bill-name"></p>
                    </div>
                     <div class="output-form mb-1">
                        <label for="" class="output-label">Địa chỉ giao hàng:</label>
                        <p class="output-out checkout-item__bill-address"></p>
                    </div>
                     <div class="output-form mb-1">
                        <label for="" class="output-label">Số điện thoại:</label>
                        <p class="output-out checkout-item__bill-phone"></p>
                    </div>
                     <div class="output-form mb-1">
                        <label for="" class="output-label">Email:</label>
                        <p class="output-out checkout-item__bill-email"></p>
                    </div>
                    <div class="output-form mb-1">
                        <label for="" class="output-label">Ngày hóa đơn:</label>
                        <p class="output-out checkout-item__bill-ngayhd">2023/11/14</p>
                    </div>
                    
                    <h5 class="" style="font-size: 18px; margin-bottom: 6px;text-align:center;">Danh sách sản phẩm</h5>
                    <div class="checkout-modal__table__wrapper">
                        <table class="checkout-bill__table">
                            <thead>
                                <th>Product</th>
                                <th class="">Price</th>
                                <th style="width: 120px">
                                    Quantity
                                </th>
                                <th class="">Total</th>
                            </thead>
                            <tbody class="checkout-bill__table-body">
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="output-form mb-1">
                        <label for="" class="output-label">Tiền hóa đơn thanh toán:</label>
                        <p class="output-out"><span class="checkout-item__bill-total"></span><sup>đ</sup></p>
                    </div>
                    <div class="btn-checkout-cancel__wrapper">
                        <button class="btn-checkout-cancel" onclick="modalCheckoutClose()">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif?>
</div>
<?php include('./views/layouts/footer.php') ?>


<script src="./public/javascript/header.js"></script>
<script src="./public/javascript/validator.js"></script>
<script src="./public/javascript/checkout.js"></script>
