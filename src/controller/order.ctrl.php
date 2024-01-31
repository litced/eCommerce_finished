<?php

require_once "../../vendor/autoload.php";
require_once "../dao/Dao.php";

use src\dao\Dao;

$newdao = new Dao;
$answer = [];

if (!empty($_SESSION['addTocart'])) {

  $item_ids = implode(" ,", $_SESSION['id']);
  $amount = implode(" ,", $_SESSION['quantity']);
  $price = implode(" ,", $_SESSION['prices']);
  $total = $_SESSION['total'];
  $order_date = date("d, M Y - h:i:s a");
  var_dump($item_ids,$amount,$price,$total);

  $newdao->Order($item_ids, $amount, $price, $total, $Method, $created_at);


  if ($query->rowCount() > 0) {
    echo "<script>window.onload = function() {subOrderSucc();}</script>";

  } else
    echo "<script>window.onload = function() {subOrderErr();} </script>";
} else
  echo "<script>window.location = '../home.php'</script>";

include_once "../includes/footer.php";
?>
<script>
  function subOrderSucc() {
    Swal.fire({
      title: 'Submitting Order',
      text: 'Order Submitted Successfully',
      icon: 'success',
      showConfirmButton: false,
      showCancelButton: false,
      timer: 3000
    }).then(function() {
      window.location = "invoice.php";
    });
  }

  function subOrderErr() {
    Swal.fire({
      title: 'Submitting Order',
      text: 'Order did not submit successfully',
      icon: 'error',
      showConfirmButton: false,
      showCancelButton: false,
      timer: 5000
    }).then(function() {
      window.location = "cart.php";
    });
  }
</script>
<!-- $answer = [
"status"=> true,
"message"=> "Order Submitted"
];
}else{
$answer=[
"status"=>false,
"message"=>"error encountered"
];
}
echo json_encode($answer); -->

