<?php
namespace src\controller;
include_once "../../vendor/autoload.php";
include_once "../dao/Dao.php";
use src\dao\Dao;
$newdao = new Dao();

$answer = [];

if($_POST){
    extract($_POST);
    $id = htmlspecialchars($id);
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);
    $username = htmlspecialchars($username);
    $roles = htmlspecialchars($roles);

    $newdao->UpdateUser($firstname, $lastname, $username, $roles, $id);

    $answer = [
        "status"=>true,
        "message"=> "User Updated"
    ];
}else{
    $answer = [
        "status"=>false,
        "message"=> "Update failed"
    ];
}
echo json_encode($answer);



?>