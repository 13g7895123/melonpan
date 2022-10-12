<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "material_list":

            MYPDO::$table = 'material';
            $results = MYPDO::select();

            $data['success'] = true;
            $data['data'] = $results;

            echo json_encode($data);
            break;

        case 'material_gprice':

            // $gprice = SYSACTION::SQL_Data('material', 'name', $_POST['param1'], 'g_price');
            MYPDO::$table = 'material';
            MYPDO::$where = ['name' => $_POST['param1']];
            MYPDO::$order = ['data_create_time' => 'DESC'];
            $result = MYPDO::first();

            $gprice = $result['g_price'];

            $data['success'] = true;
            $data['data'] = $gprice;

            echo json_encode($data);
            break;

        case 'submit':
            
            $data_arr = json_decode($_POST['data'], true); // STRINg TO ARRAY

            // 檢查產品名稱是否重複
            $product = $_POST['product'];
            MYPDO::$table = 'product';
            MYPDO::$where = ['name' => $product];
            $result = MYPDO::first();

            if(!empty($result)){    // 重複
                $data['success'] = false;
                $data['msg'] = '該產品已存在';
            }else{
                // 新建產品
                MYPDO::$table = 'product';
                MYPDO::$data = [
                    'name' => $product,
                    'cost' => $_POST['total']
                ];
                $product_id = MYPDO::insert();
                
                if($product_id > 0){ // 確認寫入正確
                    // 產品食材寫入資料庫
                    for($i = 0; $i < count($data_arr); $i++){
                        MYPDO::$table = 'product_material';
                        MYPDO::$data = [
                            'product_id' => $product_id,
                            'material_name' => $data_arr[$i]['name'],
                            'material_weight' => $data_arr[$i]['weight'],
                        ];
                        $product_material_id = MYPDO::insert();

                        if($product_material_id > 0){                           
                        }else{
                            $data['success'] = false;
                            $data['msg'] = '新增產品食材錯誤';
                        }
                    }
                    $data['success'] = true;
                    // $data['msg'] = '新增產品食材錯誤';              
                }else{
                    $data['success'] = false;
                    $data['msg'] = '建立產品錯誤';
                }
            }      
            
            echo json_encode($data);
            break;
    }
}
?>