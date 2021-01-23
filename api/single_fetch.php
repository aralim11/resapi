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

// Get ID
$order->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get order
$order->singleOrder();

// Create array
$order_arr = array(
    'id' => $order->id,
    'order_id' => $order->order_id,
    'order_description' => $order->order_description,
    'created_at' => $order->created_at,
);

// Make JSON
print_r(json_encode($order_arr));

?>