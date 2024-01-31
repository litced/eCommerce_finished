<?php
 session_start();

 if(!empty($_SESSION['addTocart']))
 {
 	foreach ($_SESSION['addTocart'] as $key => $value) 
 	{
 	 if ($_POST['itmID'] == $key) 
 	 {
 	  unset($_SESSION['addTocart'][$key]);
 	 }
 	 if(empty($_SESSION['addTocart']))
 	 {
 	 	unset($_SESSION['addTocart']);
 	 }
 	}
 }
?>