<?php
require_once '../../vendor/autoload.php'; 

\Stripe\Stripe::setApiKey('sk_test_51Of4HBLOvbIi11myYWcEGvq4loDSIqdZksLI8lRcGha1gORNHknNCgdefS5sLrlPr4BxF293XN3ROLfDc6iN12zz00IrJli1gm'); 

$productPrice = $_POST['productPrice'];
$productQuantity = $_POST['productQuantity'];


$totalAmount = $productPrice * $productQuantity * 100;


$paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => $totalAmount,
  'currency' => 'usd', 
]);


echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
