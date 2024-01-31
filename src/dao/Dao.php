<?php
namespace src\dao;
require_once "../../vendor/autoload.php";
use src\config\DatabaseConnection;

require_once "../config/DatabaseConnection.php";
use PDO;

class Dao{

    

    private $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection("localhost", "root", "", "eCommerce",null);
        $this->connection->conn();
    }
// --------------------REGISTER------------------------

    public function authRegister($firstname,$lastname,$username,$password){

        $stmn = $this->connection->conn()->prepare("INSERT INTO users(firstname,lastname,username,passwords)VALUES(:firstname,:lastname,:username,:passwords) ");
        $stmn->bindparam(":firstname",$firstname);
        $stmn->bindparam(":lastname",$lastname);
        $stmn->bindparam(":username",$username);
        $stmn->bindparam(":passwords",$password);
        $stmn->execute();
    }

// ------------------------------LOGIN--------------------

    public function Exist($checkName){

        $exist = $this->connection->conn()->prepare("SELECT username FROM users where username = :username ");
        $exist->bindParam(":username",$checkName);
        $exist->execute();
        while($checkRow = $exist->fetch()){
            if($checkRow['username']=$checkName){
                return true;
            }
        }
    }


    public function validpassword($checkName,$checkPass){        
        $validpass = $this->connection->conn()->prepare("SELECT passwords FROM users WHERE username = :username");
        $validpass->bindParam(":username",$checkName);
        $validpass->execute();
        while($checkrow = $validpass->fetch()){
            if($checkPass = $checkrow["passwords"]){
                return true;
            }
        }
    }




        function UserInfo($checkName){
        $infos = $this->connection->conn()->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $infos->bindParam('username',$checkName);
        $infos->execute();
        $infos_row = $infos->fetch(PDO::FETCH_OBJ);

        return $infos_row;
    }
// ----------------------------ADD/DELETEPRODUCT-----------------------------

    public function addProduct($pname, $quantity, $price, $pictures , $description)
    {
        $uploadtrue = true;
        
        $filename = basename($pictures['name']);
        $file = "../../products" . DIRECTORY_SEPARATOR . $pictures['name'];
        

        if ($pictures['size'] > 500000000) {
            echo "File is too large";
            $uploadtrue = false;
        }

        if ($uploadtrue && move_uploaded_file($pictures['tmp_name'], $file)) {
            $stmn = $this->connection->conn()->prepare("INSERT INTO products(pictures, pname, price, quantity, descriptions) VALUES (:pictures, :pname, :price, :quantity, :descriptions)");

            $stmn->execute([
                ":pictures" => $filename,
                ":pname" => $pname,
                ":price" => $price,
                ":quantity" => $quantity,
                ":descriptions"=> $description
            ]);

            
        } 
           
    }

    public function Deleteproduct($idp){
        $DeleteUser=$this->connection->conn()->prepare("DELETE FROM products WHERE idp = :idp");
        $DeleteUser->bindParam(":idp",$idp);
        $DeleteUser->execute();

     }

     



// -----------------------------ADD/DELETEWORKER-------------------------

    public function addworker($firstname, $lastname, $username, $roles){
        $add = $this->connection->conn()->prepare("INSERT INTO workers(firstname, lastname, username, roles)VALUES(:firstname, :lastname, :username, :roles)");
        $add->execute([
            ":firstname"=> $firstname,
            ":lastname"=> $lastname,
            ":username"=> $username,
            ":roles"=> $roles
        ]);
    }
    

    public function DeleteUser($id){
        $DeleteUser=$this->connection->conn()->prepare("DELETE FROM workers WHERE id = :id");
        $DeleteUser->bindParam(":id",$id);
        $DeleteUser->execute();

     }


    //  ----------------------UPDATE_USER----------------------

    public function UpdateUser($firstname,$lastname,$username,$roles,$id){
      $update=$this->connection->conn()->prepare("UPDATE users SET firstname=:firstname,lastname=:lastname,username=:username,roles=:roles WHERE id = :id");
      $update->execute([
        ":firstname"=>$firstname,
        ":lastname"=>$lastname,
        ":username"=>$username,
        ":roles"=>$roles,
        ":id"=>$id
      ]);
    }
   // -------------------------------------ADD CART-----------------------------
 
    public function addtocart($idp) {
        $item_dta = $this->connection->conn()->prepare("SELECT * FROM `products` WHERE `idp` = :idp LIMIT 1");
        $item_dta->execute([
          ":idp"=> $idp
        ]);
    
        foreach ($item_dta as $fetch) {
            $itemsArray = [
                $fetch['idp'] => [
                    'idp' => $fetch['idp'],
                    'description' => $fetch['pname'],
                    'price' => $fetch['price'],
                    'quantity' => 1,
                    'pictures' => $fetch['pictures']
                ]
            ];
    
            if (!empty($_SESSION['addTocart'])) {
                if (array_key_exists($fetch['idp'], $_SESSION['addTocart'])) {
                    $_SESSION['addTocart'][$fetch['idp']]['quantity'] += 1;
                } else {
                    $_SESSION['addTocart'] += $itemsArray;
                }
            } else {
                $_SESSION['addTocart'] = $itemsArray;
            }
        }
    }
    

// -----------------ORDER/CHECKOUT-------------------

 
    public function addOrder($itemIds, $itemPrices, $itemQties, $total, $orderDate)
    {
        
            $stmn = $this->connection->conn()->prepare("INSERT INTO orders (user_id,order_date,amount,Total,'Status',item_price) VALUES (:user_id, :order_date, :amount, :Total, 'Status')");
           $stmn->execute([
            ":user_id",$itemIds,
            ":Total",$total,
            ":amount",$itemQties,
            ":order_date",$orderDate,
            ":item_price",$itemPrices
           ]);

            return $stmn->rowCount() > 0;
         
           
            
        
    }
  

  
}


?>