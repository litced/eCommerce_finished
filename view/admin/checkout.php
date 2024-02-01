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


        <?php
        endif;
        ?>
        </h5>
      </div>
      <form id="placeOrder">
        <input type="number" name="productId" style="display: none;" value="<?= $fetch["idp"] ?>">
        <input type="text" name="productname" hidden value="<?= $allDescriptions ?>">
        <input type="number" name="productPrice" hidden value="<?= $fetch['price']; ?>">
        <input type="number" name="DeliveryCharge" hidden value="<?= $Dcharge; ?>">
        <input type="number" name="productQuantity" hidden value="<?= $fetch['quantity'] ?>">
        <input type="number" name="taxes" hidden value="<?= $taxe ?>">
        <input type="number" name="total" hidden value="<?= $Ftotal ?>">
        <table>
          <tr style="display: none;">
            <td>Product ID:</td>
            <td><?= $fetch["idp"] ?></td>
          </tr>
          <tr>
            <td>Product Name:</td>
            <td><?= $allDescriptions ?></td>
          </tr>
          <tr>
            <td>Product Price:</td>
            <td><?= $fetch['price'] ?></td>
          </tr>
          <tr>
            <td>Delivery Charge:</td>
            <td><?= $Dcharge ?></td>
          </tr>
          <tr>
            <td>Product Quantity:</td>
            <td><?= $fetch['quantity'] ?></td>
          </tr>
          <tr>
            <td>Taxes:</td>
            <td><?= $taxe ?></td>
          </tr>
          <tr>
            <td>Total:</td>
            <td><?= $Ftotal ?></td>
          </tr>
        </table>

        <h6 class="text-center lead">Select Payment Mode</h6>
        <div style="margin-bottom: 10px;" class="form-group">
          <select name="method" class="form-control">
            <option value="" selected disabled>-Select Payment Mode-</option>
            <option value="cod">Cash On Delivery</option>
            <option value="netbanking">Net Banking</option>
            <option value="Moncash">MonCash</option>
            <option value="cards">Debit/Credit Card</option>
          </select>
        </div>
        <div style="text-align: center;" class="form-group">
          <input type="submit" name="submit" value="Place Order" class="btn btn-success btn-block " style="font-size: 15px; padding: 10px 30%;">
      </form>
    </div>
  </div>
</div>

<?php
include "../includes/footer.php";
?>