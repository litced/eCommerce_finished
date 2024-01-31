<?php
 session_start();
 require_once "../../vendor/autoload.php";
 require_once "../dao/Dao.php";
use src\dao\Dao;
$newdao = new Dao;
$answer = []; 

	if(isset($_POST['ID']))
	{
		$idp = $_POST['ID'];
		$newdao->addtocart($idp);
		echo "<script>alert(added to cart)</script>";
	}else{
    echo "<script>alert(an error occured)</script>";
  }
?>