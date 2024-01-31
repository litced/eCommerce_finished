<?php
require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";
use src\dao\Dao;
$newdao = new Dao;
$answer = [];

if($_POST){
    extract($_POST);
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);
    $username = htmlspecialchars($username);
    $roles = htmlspecialchars($roles);

    $newdao->addworker($firstname, $lastname, $username, $roles);
    $answer = ["status"=>true, "message"=>"worker added"];
}else{
    $answer = ["status" => true, "message" => "insertion failed"];

}
header('Content-Type: application/json');
echo json_encode($answer);




?>