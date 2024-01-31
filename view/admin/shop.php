<?php
session_start();
if (empty($_SESSION["admin"])) {
  header("location: http://localhost/eCommerce/view/admin/auth.php");
}
require_once "../../vendor/autoload.php";
include "../includes/header.php";
include_once "../../src/config/instance.php";

use src\config\instance;

$connector = $connection->conn();
$stmn = $connector->prepare("SELECT * FROM products");
$stmn->execute();
?>

<section id="shoppingpage">
  <h2>#BeEverywhere</h2>
  <p>save more with coupons & up to 80% off!</p>

</section>

<section id="product0">

  <div class="row">
    <?php foreach ($stmn as $fetch) : ?>
      <div class="col-md-3">
        <div class="procontainer0">
        <div class="pro0" <div class="pro" onclick="window.location.href='sproduct.php?id=<?= $fetch["idp"]; ?>';">
            <img class="img-fluid w-100" src="../../products/<?= $fetch["pictures"] ?>">
            <div class="des">
              <span><?= $fetch["pname"] ?></span>
              <h5><?= $fetch["descriptions"] ?></h5>
              <div class="star">
                <i class="fas fa fa-star"></i>
                <i class="fas fa fa-star"></i>
                <i class="fas fa fa-star"></i>
                <i class="fas fa fa-star"></i>
                <i class="fas fa fa-star"></i>
              </div>
              <h4>$<?= $fetch["price"] ?></h4>
            </div>
            <a class="addtoitem" id="<?= $fetch["idp"]; ?>"><i class="fa-solid fa-bag-shopping shoppings"></i></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<br>
<section id="pagination" class="sectionp1">
  <a href="#">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
</section>
<br>

<section id="newsletter">
  <div class="newstext">
    <h4>SignUp for Updates and Newsletters</h4>
    <p>Get Notifications about the latest shop updates and <span>Special offers</span>
    </p>
  </div>
  <div class="forms">
    <form action="">
      <input type="text" placeholder="Put your Email Adress">
      <button>SignUp</button>
    </form>
  </div>

</section>
<?php
include "../includes/footer.php";
?>