<?php
    $act = 'thongke';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act){
        case 'thongke':
            include('./views/admin/thongke.php');
            break;
        case 'get_thongke':
            $tk = new thongke();
            $result = $tk->getThongke();
            $kq = [];
            while($row = $result->fetch()){
                $kq[] = [
                    'tensp'=> $row['tensp'],
                    'soluong'=> $row['soluong']
                ];
            }
            $response = [
                'error' => false,
                'data' => $kq
            ];
            echo json_encode($response);
            break;
        case 'thongke_filter':
            $type = $_POST['type'];
            // year
            $tk = new thongke();
            if($type == 'year'){
                $curr = date("Y");
                $year = (int) $_POST['year'];  
                $yearEnd = (int) $_POST['yearEnd'];  

                if($year == '' || $yearEnd == '') {
                    $response = ['error' => true];
                    echo json_encode($response);
                    return;
                }
                if($year > $curr  || $yearEnd > $curr || $year < 2000  || $yearEnd < 2000 ) {
                    $response = ['error' => true, 'cur' => $curr];
                    echo json_encode($response);
                    return;
                }
                $result = $tk->getThongkeYear($year, $yearEnd);
                $kq = [];
                while($row = $result->fetch()){
                    $kq[] = [
                        'tensp'=> $row['tensp'],
                        'soluong'=> $row['soluong']
                    ];
                }
                $response = [
                    'error' => false,
                    'data' => $kq
                ];
                echo json_encode($response);
            }
            if($type == 'month') {
                $year = $_POST['year'];
                $month = $_POST['month'];
                $result = $tk->getThongkeMonth($year,$month);
                $kq = [];
                while($row = $result->fetch()) {
                    $kq[] = [
                        'tensp'=> $row['tensp'],
                        'soluong'=> $row['soluong'] 
                    ];
                }
                $response = [
                    'error' => false,
                    'data' => $kq
                ];
                echo json_encode($response);
            }

            if($type == 'day') {
                $day = $_POST['day'];
                $dayEnd = $_POST['dayEnd'];
                $result = $tk->getThongkeDay($day,$dayEnd);
                $kq = [];
                while($row = $result->fetch()) {
                    $kq[] = [
                        'tensp'=> $row['tensp'],
                        'soluong'=> $row['soluong'] 
                    ];
                }
                $response = [
                    'error' => false,
                    'data' => $kq
                ];
                echo json_encode($response);
            }
            break;
        default:
            echo "invalid case";
    }
    
?>