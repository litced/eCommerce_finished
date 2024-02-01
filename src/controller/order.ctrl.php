<?php

require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";

use src\dao\Dao;

$newdao = new Dao;
$answer = [];
if($_POST){
  extract($_POST);
  $productId = htmlspecialchars($productId);
  $productQuantity = htmlspecialchars($productQuantity);
  $productPrice = htmlspecialchars($productPrice);
  $total = htmlspecialchars($total);
  $method = htmlspecialchars($method);

  
  // var_dump("productID: " . $productId, "productPrice: " . $productPrice, "productQuantity: " . $productQuantity, "Total: " . $total, "Method: " . $method);


  $newdao->Order($productId, $productQuantity, $productPrice, $total, $method);

  $answer =[
    "status"=> true,
    "message"=> "Order Submitted"
  ];
}else{
  $answer = [
    "status" => false,
    "message" => "An error occured Order Cancelled"
  ];
}
echo json_encode($answer);

