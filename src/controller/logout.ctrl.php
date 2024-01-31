<?php
session_start();
if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
    header("location: http://localhost/eCommerce/view/admin/auth.php");
    exit();
}    



?>