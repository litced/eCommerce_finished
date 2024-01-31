<?php
session_start();
require_once("../../vendor/autoload.php");
use src\dao\Dao;
require_once "../../src/dao/Dao.php";
$newdao = new Dao();
$answer = [];

if($_POST){
    extract($_POST);

    $username = trim($Username);
    $password = trim($Password);
    if($newdao->Exist($username)&&$newdao->validpassword($username, $password)){
        $_SESSION["admin"]=[
            "id"=>$newdao->UserInfo($username)->id,
            "firstname"=>$newdao->UserInfo($username)->firstname,
            "lastname"=>$newdao->UserInfo($username)->lastname,
            "username"=>$newdao->UserInfo($username)->username,
            "roles"=>$newdao->UserInfo($username)->roles,
        ];
        $answer = ["status"=>true , "message"=>"Successfuly logged in"];
    }else{
        if($newdao->Exist($username)){
            $answer = ["status"=>false , "message"=>"Wrong Password"];
            
        }else{
            $answer = [ "status"=>false , "message"=>"Not Registered"];
            
        }
    }
}
header('Content-Type: application/json');
echo json_encode($answer);

?>