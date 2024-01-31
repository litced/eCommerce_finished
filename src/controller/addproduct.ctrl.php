<?php
require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";
use src\dao\Dao;
$newdao = new Dao;
$response = [];

if($_POST){

    $productname = isset($_POST['productname']) ? htmlspecialchars($_POST['productname']) : null;
    $productquan = isset($_POST['productquan']) ? htmlspecialchars($_POST['productquan']) : null;
    $productprice = isset($_POST['productprice']) ? htmlspecialchars($_POST['productprice']) : null;
    $productdescr = isset($_POST['productdescr']) ? htmlspecialchars($_POST['productdescr']) : null;

    $productImg = isset($_FILES['productImg']) ? $_FILES['productImg'] : null;

    $newdao->addProduct($productname, $productquan, $productprice, $productImg, $productdescr);
    $response = ["status" => true, "message" => "insertion completed"];
} else {
    $response = ["status" => false, "message" => "insertion failed"];
}
header('Content-Type: application/json');
echo json_encode($response);

?>