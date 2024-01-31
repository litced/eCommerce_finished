<?php
require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";
use src\dao\Dao;
$newdao = new Dao;

$answer=[];

if($_POST);
extract($_POST);
$idp = trim($idp);

if($newdao->Deleteproduct($idp)){
    $answer = ['status' => true , 'message' => 'User Removed'];
}

   
header('Content-Type: application/json');
echo json_encode($answer);




?>