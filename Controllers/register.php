<?php 
    $act = '1';

   if(isset($_GET['act'])) {
    $act = $_GET['act'];

   }
   if($act == 'register_action') {
      $arr = $_POST['info'];
      $name = $arr['usernameRegister'];
      $email = $arr['emailRegister'];
      $phone = $arr['phoneRegister'];
      $pass = $arr['passwordRegister'];
      $diachi = $arr['addressRegister'];

      $user = new user();
      $checkPhone = $user->checkUser($phone, $email);

      if(empty($checkPhone)) {
        $salt = '#$@26';
        $staticsalt='G4334#';
        $password = md5($salt.$pass.$staticsalt);
         $user->insertUser($name, $email, $password, $diachi, $phone);

         $response = array("message" => "Thành công", "error"=>false);
         // Chuyển định dạng phản hồi thành JSON
         header('Content-Type: application/json');
         echo json_encode($response);
      } else {
         $response = array("message" => "Thất bại", "error"=>true);
         // Chuyển định dạng phản hồi thành JSON
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   } 


?>