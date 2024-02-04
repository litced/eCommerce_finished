<?php
session_start();
if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
    unset($_SESSION["addTocart"]);
    header("location: http://localhost/eCommerce/");
    exit();
}    



?>