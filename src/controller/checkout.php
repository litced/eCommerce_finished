<?php
require_once "../../vendor/autoload.php";
$secretKeyStripe = "sk_test_51Of4HBLOvbIi11myYWcEGvq4loDSIqdZksLI8lRcGha1gORNHknNCgdefS5sLrlPr4BxF293XN3ROLfDc6iN12zz00IrJli1gm";

 \Stripe\Stripe::setApiKey($secretKeyStripe);
 $checkout_session = \Stripe\Checkout\Session::create([
  "mode"=>"payment",
  "success_url" => "http://localhost/eCommerce/view/admin/cart.php",
  "line_items"=>[
    [
      "quantity"=> 1,
      "price_data"=> [
        "currency"=>"usd",
        "unit_amount"=> 2000,
        "product_data"=>[
          "name"=> "Iphone"
        ]
      ]
    ]
  ]
 ]);
 http_response_code(303);
header("Location:". $checkout_session->url);
?>

