<?php
    $act = 'login';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'login':
            include('./views/admin/login.php');
            break;
        case 'login_action':
            if(isset($_POST['submit'])) {
                $email = isset($_POST['email'])? trim($_POST['email']): '';
                $password = isset($_POST['password'])? trim($_POST['password']): '';
                $ad = new account();
                $admin = $ad->checkAdmin($email,$password);
                if($admin) {
                    if(isset($_SESSION['error'])) unset($_SESSION['error']);
                    $_SESSION['admin'] = array(
                        'admin_name' => $admin['admin_name'],
                        'admin_email' => $admin['admin_email'],
                    );
                    header("location: ./main.php?action=main");

    
                } else {
                    $_SESSION['error'] = "Email hoặc mật khẩu không chính xác!";
                    header("location: ./admin.php?action=login");
                }
            }
            break;
        case 'logout':
            unset($_SESSION['admin']);
            header("location: ./admin.php?action=login");
            break;
        default:
            echo "invalid case";
    }
    
?>