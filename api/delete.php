<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../models/Order.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get Request method
$requestMethod = $_SERVER["REQUEST_METHOD"];

// Instantiate order object
$order = new Order($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

if ($requestMethod == 'DELETE') {
    $allHeaders = getallheaders();
    if ($allHeaders['Content-Type'] == 'application/json') {
        if (!empty($data->id)) {
            $order->id = $data->id;

            if ($order->delete()) {
                echo json_encode(
                    array('message' => 'Order Delete')
                );
            } else {
                echo json_encode(
                    array('message' => 'Order Not Delete')
                );
            }
        } else {
            echo json_encode(
                array('message' => '204 No Content Not Allowed')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'Content Type Not Allowed')
        );
    }
} else {
    echo json_encode(
        array('message' => '405 Method Not Allowed')
    );
}
