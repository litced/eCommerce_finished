<?php
namespace src\config;
use src\config\DatabaseConnection;
use PDO;

$Localhost = "localhost";
$Username = "root";
$Password = "";
$Database = "eCommerce";

$connection = new DatabaseConnection($Localhost,$Username,$Password,$Database,null);
$connection->conn();


?>