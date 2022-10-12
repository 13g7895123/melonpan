<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "submit":

            $data_arr = json_decode($_POST['data'], true); // STRINg TO ARRAY

            try{
                for($i = 0; $i < count($data_arr); $i++){
                    MYPDO::$table = 'material';
                    MYPDO::$data = [
                        'name' => $data_arr[$i]['name'],
                        'weight' => $data_arr[$i]['weight'],
                        'unit' => $data_arr[$i]['unit'],
                        'total_price' => $data_arr[$i]['total_price'],
                        'g_price' => $data_arr[$i]['g_price']
                    ];
                    MYPDO::insert();
                }
                $data['success'] = true;
                $data['update_count'] = count($data_arr);

            }catch (Exccption $e){

                $data['success'] = false;
                $data['msg'] = $e->getMessage();
            }

            echo json_encode($data);
            break;
    }
}
?>