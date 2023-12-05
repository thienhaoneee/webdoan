<?php
    $act = 'comment';
    if(isset($_GET['act']))
    $act = $_GET['act'];

    switch($act) {
        case 'add':
            $makh = $_POST['makh'];
            $product_id = $_POST['product_id'];
            $content = $_POST['content'];

            $cmt = new comment();
            $cmt_id = $cmt->insertComment($makh, $product_id, $content);
            if($cmt_id) {
                $comment = $cmt->getCommentbyId($cmt_id);
                $response = [
                    'error' => false,
                    'comment' => $comment
                ];
                echo json_encode($response);
            }
            break;
        case 'addsub':
            $makh = $_POST['makh'];
            $product_id = $_POST['product_id'];
            $content = $_POST['content'];
            $parent_id = $_POST['parent_id'];

            $cmt = new comment();
            $cmt_id = $cmt->insertComment($makh, $product_id, $content, $parent_id);
            if($cmt_id) {
                $comment = $cmt->getCommentbyId($cmt_id);
                $response = [
                    'error' => false,
                    'comment' => $comment
                ];
                echo json_encode($response);
            }
            break;
        default:
            echo 'invalid';
    }

?>