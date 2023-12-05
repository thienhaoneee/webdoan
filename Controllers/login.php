<?php 
    $act = '';

   if(isset($_GET['act'])) {
    $act = $_GET['act'];
   }

   switch($act) {
      case 'login_action': 
        $arr = $_POST['info'];
        $phone = $arr['phoneLogin'];
        $pass = $arr['passwordLogin'];
        
        $salt = '#$@26';
        $staticsalt='G4334#';
        $password = md5($salt.$pass.$staticsalt);
        
        $user = new user();
        $data = $user->userLogin($phone, $password);
        if($data == true) {
          $_SESSION['user'] = array(
            'makh' => $data['khachhang_id'],
            'name' => $data['khachhang_name'],
            'email' => $data['email'],
            'diachi' => $data['diachi'],
            'phone' => $data['phone']
          );

          $response = array(
            'error'=> false,
            'message' => 'Đăng nhập thành công'
          );
          header('Content-Type: application/json');
          echo json_encode($response);
        }

        break;
      case 'logout_action': 
          unset($_SESSION['user']);
          $response = array(
            'error'=> false,
            'message' => 'Đăng xuẩt thành công'
          );
          echo json_encode($response);
        break;
   }


?>