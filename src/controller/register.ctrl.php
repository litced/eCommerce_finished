<?php
require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";
use src\dao\Dao;
$ndao = new Dao();
$answer=[];

if($_POST){
    extract($_POST);
    $firstname= htmlspecialchars($Firstname);
    $Lastname= htmlspecialchars($Lastname);
    $username= htmlspecialchars($Username);
    $conpassword= htmlspecialchars($Conpassword);
    $password= htmlspecialchars($Password);
   $roles = htmlspecialchars($roles);

   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   
    if($conpassword != $password){

        $answer = ['status'=> false , 'message'=>'password not matched'];
        echo json_encode($answer);
        exit();
    }

    $ndao->authRegister($Firstname,$Lastname,$Username, $hashedPassword,$roles);

    $answer = ['status'=> true , 'message'=>'Register completed'];
}else{
    $answer = ['status' => false, 'message' => 'Error encountered'];
}
header('Content-Type: application/json');

echo json_encode($answer);

?>