<?php
session_start();
require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";

use src\dao\Dao;

$newdao = new Dao;
$answer = [];
if($_POST){
  extract($_POST);
  $userid = htmlspecialchars($userid);
  $productId = htmlspecialchars($productId);
  $productQuantity = htmlspecialchars($productQuantity);
  $productPrice = htmlspecialchars($productPrice);
  $total = htmlspecialchars($total);
  $method = htmlspecialchars($method);

  


  $newdao->Order($productId, $productQuantity, $productPrice, $total, $method, $userid);

  if (!empty($_SESSION['addTocart'])) {
    unset($_SESSION['addTocart']);
  }


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

