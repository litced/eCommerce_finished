<?php
namespace src\config;
use PDO;

class DatabaseConnection{
   
    private $Localhost;
    private $Username;
    private $Password;
    private $Database;
    protected $conn;

    public function __construct($Localhost,$Username,$Password,$Database,$conn)
    {
        $this->Localhost=$Localhost;
        $this->Username=$Username;
        $this->Password=$Password;
        $this->Database=$Database;
        $this->conn=$conn;


        $zzz = ("mysql::host=$this->Localhost;dbname=$this->Database;charset=utf8mb4");
        try{
            $this->conn=new PDO($zzz,$this->Username,$this->Password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo "there was a error".$e->getMessage();
        }
    }

    public function Conn(){
        return $this->conn;
    }

}



?>