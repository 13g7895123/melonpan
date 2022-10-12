<?php

include_once(__DIR__ . '/../../__Class/ClassLoad.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "product_list":

            MYPDO::$table = 'product';
            $results = MYPDO::select();

            $data['success'] = true;
            $data['data'] = $results;

            echo json_encode($data);
            break;
    }
}
?>