<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Order.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate order object
    $order = new Order($db);

    // Order query
    $result = $order->fetch_data();

    // Get row count
    $num = $result->rowCount();

    // Check if any order
    if ($num > 0) {
        $order_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $order_item = array(
                'id' => $id,
                'order_id' => $order_id,
                'order_description' => html_entity_decode($order_description),
                'created_at' => $created_at,
            );

        // Push to "data"
        array_push($order_arr, $order_item);
        }

    // Turn to JSON & output
    echo json_encode($order_arr);

    } else {
    // No Order Found
    echo json_encode(
        array('message' => 'No Order Found')
    );
    }







?>