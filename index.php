<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <?php
        spl_autoload_register('myModelClassLoader');
        function myModelClassLoader($className)
        {
          $path = 'Models/';
          include $path . $className . '.php';
        };
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Việt</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
    <link rel="stylesheet" href="./public/style/base.css">
    <link rel="stylesheet" href="./public/style/grid.css">
    <link rel="stylesheet" href="./public/style/main.css">
    <link rel="stylesheet" href="./public/style/header.css">
    <link rel="stylesheet" href="./public/style/responsive.css">
    <link rel="stylesheet" href="./public/style/slider.css">

    <link rel="stylesheet" href="./public/style/shop.css">
    <link rel="stylesheet" href="./public/style/single.css">
    <link rel="stylesheet" href="./public/style/cart.css">
    <link rel="stylesheet" href="./public/style/checkout.css">
    
</head>

<body>
    <div class="app">
        <div class="grid">
            <?php include('./views/layouts/header.php')?>

            <?php
            $ctr = 'home';
            if (isset($_GET['action'])) {
                $ctr = $_GET['action'];
            }
            include('./Controllers/' . $ctr . '.php');
            ?>
        </div>
    </div>
    <?php
        function formatCurrency($amount) {
          // Sử dụng hàm number_format để định dạng số tiền
          // Thiết lập số lẻ thành 0 và dấu phân cách hàng nghìn là ","
          return number_format($amount, 0, '.', ',') . 'đ';
        }
        function percentSaled($price, $newprice) {
            if ($price > 0 && $newprice > 0) {
                $giamGia = $price - $newprice;
                $percent = ($giamGia / $price) * 100;
                return ceil($percent);
            } else {
                return 0; // Tránh chia cho 0 nếu có giá trị không hợp lệ.
            }
        }
      ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/737f765a39.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->
    <script>
        <?php include('./public/javascript/validator.js') ?>
    </script>
    <script>
        Validator({
            form: '#form-login',
            formGroupSelector:'.form-group',
            errorSelector: '.form-message',
            rules:[
                Validator.isRequired('#phoneLogin', 'Vui lòng không để trống số điện thoại'),
                Validator.isRequired('#passwordLogin', 'Vui lòng không để trống password'),
                Validator.minLength('#passwordLogin', 6),
            ],
            onSubmit: function (info) {
                console.log('info send',info);
                $.ajax({
                    url: 'request.php?req=login&act=login_action',
                    type: 'POST',
                    dataType: 'json',
                    data: { info },
                    success: function(response) {
                        if(!response.error)
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi:', error);
                    }
                })
            }
        });
        // form register
        Validator({
            form: '#form-register',
            formGroupSelector:'.form-group',
            errorSelector: '.form-message',
            rules:[
                Validator.isRequired('#usernameRegister', 'Vui lòng không để trống tên tài khoản'),
                Validator.isRequired('#emailRegister', 'Vui lòng không để trống email'),
                Validator.isRequired('#phoneRegister', 'Vui lòng không để trống phone'),
                Validator.isRequired('#addressRegister', 'Vui lòng nhập địa chỉ'),
                Validator.isRequired('#passwordRegister', 'Vui lòng không để trống password'),
                Validator.isRequired('#passwordConfirmRegister', 'Vui lòng không để trống password confirm'),
                Validator.minLength('#passwordRegister', 6),
                Validator.minLength('#phoneRegister', 3, 'Vui lòng nhập ít nhất 3 số'),
                Validator.isEmail('#emailRegister', 'Vui lòng nhập đúng định dạng email'),
                Validator.isConfirmed('#passwordConfirmRegister',function() {
                    return document.querySelector('#form-register #passwordRegister').value
                },'Mật khẩu nhập lại không chính xác')
            ],
            onSubmit: function (info) {
                console.log('info send',info);
                $.ajax({
                    url: 'request.php?req=register&act=register_action',
                    type: 'POST',
                    data: { info },
                    dataType: 'json',
                    success: function(response) {
                        if(!response.error) {
                            const modal = document.querySelector('.modal');
                            modal.classList.remove('open');
                            $('#usernameRegister').val('')
                            $('#emailRegister').val('')
                            $('#phoneRegister').val('')
                            $('#addressRegister').val('')
                            $('#passwordRegister').val('')
                            $('#passwordConfirmRegister').val('')

                            alert('Tạo tài khoản thành công :>> '+response.message);

                        } else {
                            alert(response.message+"Số điện thoại hoặc email đã tồn tại");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi:', error);
                    }
                })
            }
        })
        const logoutBtn = $('.header-nav__user-logout').click(function() {
            $.ajax({
                url: 'request.php?req=login&act=logout_action',
                type: 'POST',
                success: function(response) {
                    if(!response.error) {
                        console.log('Đăng xuất :>> ', !response.error);
                        location.reload();
                    }
                }
            })
        })

    </script>
    <script src="./public/javascript/cart.js"></script>
</body>

</html>