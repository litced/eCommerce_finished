<?php
session_start();

if (empty($_SESSION["admin"])) {
  header("location: http://localhost/eCommerce/view/admin/auth.php");
  exit();
}
include "../includes/header.php";
include_once "../../vendor/autoload.php";
include "../../src/config/instance.php";


// --------------------------ANOTHER VERSION---------------

// $randomNumber = isset($_SESSION['deliveryRandomNumber']) ? $_SESSION['deliveryRandomNumber'] : rand(0, 50);
// $_SESSION['deliveryRandomNumber'] = $randomNumber;

// $Dcharge = max(0, $fetch["price"] - $randomNumber);

// if ($Dcharge == 0) {
//   $Dcharge = rand(10, 20);
//   $_SESSION['deliveryRandomNumber'] = $Dcharge;
// } elseif ($Dcharge > 100) {
//   $Dcharge = rand(15, 30);
//   $_SESSION['deliveryRandomNumber'] = $Dcharge;
// }



$randomNumber = isset($_SESSION['deliveryRandomNumber']) ? $_SESSION['deliveryRandomNumber'] : rand(0, 50);
$_SESSION['deliveryRandomNumber'] = $randomNumber;

$Dcharge = max(0, $fetch["price"] - $randomNumber);
if ($Dcharge == 0) {
  $Dcharge = rand(10, 20);
  $Dcharge = isset($_SESSION['deliveryRandomNumber']) ? $_SESSION['deliveryRandomNumber'] : rand(10, 20);
  $_SESSION['deliveryRandomNumber'] = $Dcharge;
}
$Ftotal = $Dcharge + $total;




?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 px-2 pb-5" id="order">
      <h4 class="text-center text-info p-2">Complete your order!</h4>
      <div class="jumbotron p-3 mb-2 text-center">
        <?php
        if (!empty($_SESSION['addTocart'])) :

          $allDescriptions = '';
          foreach ($_SESSION['addTocart'] as $item_id => $fetch) :
            $allDescriptions .= $fetch['description'] . ', ';
        ?>

          <?php
          endforeach;

          $allDescriptions = rtrim($allDescriptions, ', ');
          ?>
          </h6>
          <h6 class="lead"><b>Product(s) : <?= $allDescriptions ?></b>
            <h6 class="lead"><b>Delivery Charge : </b><?= $Dcharge; ?>$</h6>
            <h5><i>Taxes: <?= $taxe ?>$</i></h5>
            <h5><b>Total Amount Payable : <?= $Ftotal ?>$</b>
            <?php
          endif;
            ?>
            </h5>
      </div>
      <form action="" method="post" id="placeOrder">
        <input type="hidden" name="products" value="<?= $allDescriptions ?>">
        <input type="hidden" name="grand_total" value="<?= $Ftotal ?>">
        <div style="margin-bottom: 10px;" class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
        </div>
        <div style="margin-bottom: 10px;" class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
        </div>
        <div style="margin-bottom: 10px;" class="form-group">
          <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
        </div>
        <div style="margin-bottom: 
        10px;" class="form-group">
          <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
        </div>
        <h6 class="text-center lead">Select Payment Mode</h6>
        <div style="margin-bottom: 10px;" class="form-group">
          <select name="pmode" class="form-control">
            <option value="" selected disabled>-Select Payment Mode-</option>
            <option value="cod">Cash On Delivery</option>
            <option value="netbanking">Net Banking</option>
            <option value="Moncash">MonCash</option>
            <option value="cards">Debit/Credit Card</option>
          </select>
        </div>
        <div style="text-align: center;" class="form-group">
        <a href="../../src/controller/order.ctrl.php"></a>
          <input type="submit" name="submit" value="Place Order" class="btn btn-success btn-block " style="font-size: 15px; padding: 10px 30%;">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include "../includes/footer.php";
?>