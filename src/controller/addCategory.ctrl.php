<?php
require "../../vendor/autoload.php";
require "../dao/Dao.php";
use src\dao\Dao;

$newdao = new Dao;

$answer =[];

if($_POST){
   extract($_POST);
   $Categoryname = htmlspecialchars($Categoryname);
   if($newdao->addCategory($Categoryname)){
      $answer=[
         "status"=>true,
         "message"=>"Category Added"
      ];
   }else{
      $answer = [
         "status" => false,
         "message" => "An error occured"
      ];
   }
}


?>