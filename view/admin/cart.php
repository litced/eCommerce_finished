<?php
session_start();
if (empty($_SESSION["admin"])) {
  header("location: http://localhost/eCommerce/view/admin/auth.php");
  exit();
}
include "../includes/header.php";
include_once "../../vendor/autoload.php";
include "../../src/config/instance.php";




$connector = $connection->conn();
?>

<section id="cartpage" class="cartpage1">
  <h2>#Cart</h2>
  <p>Your Cart</p>
</section>

<section id="cart" class="cart1">

  <table width="100%">
    <thead>
      <tr>
        <td>Remove</td>
        <td>Image</td>
        <td>Product</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Subtotal</td>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($_SESSION['addTocart'])) :
        $subtotal = 0.0;
        $taxe = 5;
        $total = 0.0;

        $_SESSION['idp'] = [];
        $_SESSION['quantity'] = [];
        $_SESSION['price'] = [];


        foreach ($_SESSION['addTocart'] as $item_id => $fetch) :
          $total = $fetch['quantity'] * $fetch['price'];
          $subtotal += $total;


          $_SESSION['id'][] = $fetch['idp'];
          $_SESSION['quantity'][] = $fetch['quantity'];
          $_SESSION['prices'][] = $fetch['price'];
      ?>


          <tr>
            <td><button class="remove" id="<?= $fetch['idp'] ?>"><i class="fa-solid fa-xmark "></i></button></td>
            <td><img src="../../products/<?= $fetch['pictures']; ?>" alt="Product Image"></td>
            <td><?= $fetch['description']; ?></td>
            <td>$<?= $fetch['price']; ?></td>
            <td>
              <div class="quantityUpdate minus" id="<?= $fetch['idp']; ?>">
                <span>-</span>
              </div>
              <input type="text" class="quantityInput" maxlength="2" max="10" value="<?= $fetch['quantity']; ?>">
              <div class="quantityUpdate plus" id="<?= $fetch['idp']; ?>">
                <span>+</span>
              </div>
            </td>
            <td>$<?= $total; ?></td>
          </tr>
      <?php
        endforeach;
        $total = $subtotal + $taxe;
        $_SESSION['total'] = $total;
      endif;
      ?>
    </tbody>
  </table>

</section>

<section id="cartadd" class="cartadd1">
  <div id="coupon">
    <h3>Apply Coupon</h3>
    <div>
      <input type="text" placeholder="Enter Your Coupon Here">
      <button class="couponbutton">Apply</button>
    </div>
  </div>

  <div id="subtotal">
    <h3>Cart Total</h3>
    <table>
      <tr>
        <td>Cart SubTotal</td>
        <td><?= $subtotal; ?>$</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td><?= $taxe; ?>$</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free</td>
      </tr>
      <tr>
        <td><strong>Total</strong></td>
        <td><strong>$<?= $total; ?></strong></td>
      </tr>
    </table>
    <a href="../admin/checkout.php">
      <button class="checkoutbutton">Proceed to checkout</button>
    </a>
  </div>
</section>

<?php
include "../includes/footer.php";
?>