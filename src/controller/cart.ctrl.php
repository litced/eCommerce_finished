<?php
session_start();


$data = json_decode(file_get_contents("php://input"), true);

$cart = $_SESSION['cart'] ?? [];

$cart[] = $data;

$_SESSION['cart'] = $cart;

// Respond to the client
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
