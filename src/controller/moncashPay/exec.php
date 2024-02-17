<?php



require_once 'controller.php';
$amount = htmlspecialchars($_POST['amount']);
$idItem = htmlspecialchars($_POST['idItem']);
$orderId = time() . $idItem;




// session_start();
// require_once "../../../vendor/autoload.php";
// include "../../dao/Dao.php";
// use src\dao\Dao;

// $newdao = new Dao;

 
// Assuming $_POST['amount'] and $_POST['idItem'] are sanitized and validated
// $userid = isset($_POST['userid']) ? htmlspecialchars($_POST['userid']) : 0;
// $total = isset($_POST['total']) ? htmlspecialchars($_POST['total']) : 0;
// $productPrice = isset($_POST['productPrice']) ? htmlspecialchars($_POST['productPrice']) : 0;
// $productId = isset($_POST['productId']) ? htmlspecialchars($_POST['productId']) : 0;
// $productname = isset($_POST['productname']) ? htmlspecialchars($_POST['productname']) : 0;
// $productQuantity = isset($_POST['productQuantity']) ? htmlspecialchars($_POST['productQuantity']) : 0;
// $orderId = time() . $productId;
// $method = "Moncash";

// $newdao->Order($productId, $productQuantity, $productPrice, $total, $method, $userid);


// configMoncash($total, $orderId);

