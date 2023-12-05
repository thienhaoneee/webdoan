<!-- ================= Header Area Begin ================= -->
<div class="header">
    <div class="header-top">
        <div class="grid wide">
            <a href="#">
                <img src="./public/image/header/header-top-15.png" alt="header-top" class="header-top__img" width="100%">
            </a>
        </div>
        <?php if(isset($_SESSION['admin'])){
            echo "<a href='./main.php' class='header-top__admin-btn'><i class='fa-solid fa-house'></i>Admin</a>";
        }  
        ?>
        
    </div>

    <div class="header-page">
        <div class="grid wide">
            <div class="header-page__wrap">
                <a href="index.php" class="header-page-logo">
                    <img src="./public/image/header/logowhite.svg" alt="logo" width="100%">
                </a>

                <div class="header-search">
                    <div class="header-search__wrapper">
                        <input type="text" class="header-search__input" placeholder="Siêu phẩm iPhone 15 Series">
                        <span class="header-search__icon">
                            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m23.233 21.86-5.712-5.94a9.66 9.66 0 0 0 2.273-6.23c0-5.343-4.347-9.69-9.69-9.69C4.763 0 .415 4.347.415 9.69c0 5.343 4.348 9.69 9.69 9.69a9.586 9.586 0 0 0 5.552-1.753l5.755 5.985c.241.25.565.388.911.388a1.265 1.265 0 0 0 .91-2.14ZM10.104 2.528c3.95 0 7.163 3.213 7.163 7.162 0 3.95-3.213 7.162-7.162 7.162-3.95 0-7.163-3.213-7.163-7.162 0-3.95 3.213-7.162 7.162-7.162Z" fill="#BE1E2D"></path>
                            </svg>
                        </span>
                    </div>

                    <ul class="header-search__list hide-on">
                        <li><a href="#" class="header-search__link">Iphone 14 pro max</a></li>
                        <li><a href="#" class="header-search__link">Macbook Air M1</a></li>
                        <li><a href="#" class="header-search__link hide-on-wide">OPPO Reno10 5g</a></li>
                        <li><a href="#" class="header-search__link ">Ipad 9</a></li>
                    </ul>
                </div>

                <div class="header-nav hide-on">
                    <ul class="header-nav__list">

                        <li><a href="#" class="header-nav__link">
                                <div class="header-nav__item">
                                    <div class="header-nav__icon">
                                        <img src="./public/image/header/phone.svg" alt="">
                                    </div>
                                    <div class="header-nav__content">
                                        <p>Đặt hàng</p>
                                        <p>1800.6018</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="header-nav__link">
                                <div class="header-nav__item">
                                    <div class="header-nav__icon">
                                        <img src="./public/image/header/location.svg" alt="">
                                    </div>
                                    <div class="header-nav__content">
                                        <p>Cửa hàng</p>
                                        <p>gần bạn</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="header-nav__link">
                                <div class="header-nav__item">
                                    <div class="header-nav__icon">
                                        <img src="./public/image/header/package.svg" alt="">
                                    </div>
                                    <div class="header-nav__content">
                                        <p>Tra cứu</p>
                                        <p>đơn hàng</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="index.php?action=cart" class="header-nav__link">
                                <div class="header-nav__item">
                                    <div class="header-nav__icon">
                                        <img src="./public/image/header/cart.svg" alt="">
                                    </div>
                                    <div class="header-nav__content">
                                        <p>Giỏ</p>
                                        <p>hàng</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <!-- php render user name -->
                            <?php 
                                if(isset($_SESSION['user']) ) :
                            ?>
                                <a href="#" class="header-nav__link">
                                    <div class="header-nav__item">
                                        <div class="header-nav__icon">
                                            <img src="./public/image/header/user.svg" alt="">
                                        </div>
                                        <div class="header-nav__content">
                                            <p><?php echo $_SESSION['user']['name']?></p>
                                        </div>
                                    </div>
                                    <a class="header-nav__user-logout">
                                        <span>Log out</span>
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </a>
                            <?php else: ?>
                                <div class="header-nav__link">
                                    <div class="header-nav__item">
                                        <div class="header-nav__icon">
                                            <img src="./public/image/header/user.svg" alt="">
                                        </div>
                                        <div class="header-nav__content">
                                            <div class="header-nav__dangnhap">Đăng nhập</div>
                                            <div class="header-nav__dangky">Đăng ký</div>
                                        </div>
                                    </div>
                                </div>

                            <?php endif ?>

                        </li>

                    </ul>
                </div>

            </div>

        </div>
    </div>

</div>

<div class="modal">
        <div class="modal-container">
            <div class="rw">
                <div class="column c-0 m-6">
                    <div class="modal-img">
                        <img src="./public/image/modal/loginbg.png" alt="">
                    </div>
                </div>
                <div class="column c-12 m-6 modal-login">
                    <!-- modal-close -->
                    <div class="modal-header">
                        <h5>Đăng Nhập</h5>
                    </div>
                    <div class="modal-body">
                        <form class="modal-form" id="form-login">
                            <div class="form-group">
                                <input type="text" class="form-control" id="phoneLogin"
                                placeholder="Số điện thoại" name="phoneLogin" value="0702906699"> 
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="passwordLogin"
                                placeholder="Mật khẩu" name="passwordLogin" value="tung123"> 
                                <span class="form-message"></span>
                            </div>
                            <button type="submit" class="btn modal-btn">Đăng nhập</button>
                        </form>
                        <div class="modal-bridge">
                            <div class="modal-bridge__col">
                                <div class="line-ngang"></div>
                            </div>
                            <div class="modal-bridge__col">
                                <div class="modal-bridge__context">Hoặc đăng ký bằng</div>
                            </div>
                            <div class="modal-bridge__col">
                                <div class="line-ngang"></div>
                            </div>
                        </div>
                        <div class="modal-social">
                            <div class="modal-social__img">
                                <img src="./public/image/modal/googleicon.png" alt="">
                            </div>
                            <div class="modal-social__img">
                                <img src="./public/image/modal/faceicon.png" alt="">
                            </div>
                        </div>
                        <div class="modal-social__having">
                            <p>Bạn chưa có tài khoản ?</p> 
                            <a href="#" id="btnChangetoRegister">Đăng Ký tại đây</a>
                        </div>
                    </div>
                    <!-- end modal-body -->
                </div>
                <div class="column c-12 m-6 modal-register">
                    <!-- modal-close -->
                    <div class="modal-header">
                        <h5>Đăng Ký</h5>
                    </div>
                    <div class="modal-body">
                        <form class="modal-form" id="form-register">
                            <div class="form-group">
                                <input type="text" class="form-control" id="usernameRegister" name="usernameRegister" 
                                placeholder="Họ và tên" value="">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="emailRegister" name="emailRegister" 
                                placeholder="Email" value="">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phoneRegister" name="phoneRegister" 
                                placeholder="Số điện thoại" value="">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="addressRegister" name="addressRegister" 
                                placeholder="Địa chỉ" value="">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="passwordRegister" name="passwordRegister" 
                                placeholder="Mật khẩu" value="">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="passwordConfirmRegister" name="passwordConfirmRegister" 
                                placeholder="Nhập lại mật khẩu" value="">
                                <span class="form-message"></span>
                            </div>
                            <button type="submit" class="btn modal-btn">Đăng ký</button>
                        </form>
                        <div class="modal-bridge">
                            <div class="modal-bridge__col">
                                <div class="line-ngang"></div>
                            </div>
                            <div class="modal-bridge__col">
                                <div class="modal-bridge__context">Hoặc đăng ký bằng</div>
                            </div>
                            <div class="modal-bridge__col">
                                <div class="line-ngang"></div>
                            </div>
                        </div>
                        <div class="modal-social">
                            <div class="modal-social__img">
                                <img src="./public/image/modal/googleicon.png" alt="">
                            </div>
                            <div class="modal-social__img">
                                <img src="./public/image/modal/faceicon.png" alt="">
                            </div>
                        </div>
                        <div class="modal-social__having">
                            <p>Bạn đã có tài khoản ?</p> 
                            <a href="#" id="btnChangetoLogin">Đăng nhập tại đây</a>
                        </div>
                    </div>
                    <!-- end modal-body -->
                </div>
                
            </div>
        </div>
    </div>
<!-- ================= Header Area End ================= -->
