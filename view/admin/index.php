<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("location: http://localhost/eCommerce/view/admin/auth.php");
}
include_once "../../vendor/autoload.php";
include "../../src/config/instance.php";
include "../includes/header.php";

use src\config\instance;

$connector = $connection->conn();
$stmn = $connector->prepare("SELECT * FROM products");
$stmn->execute();


$Session = $_SESSION["admin"];
?>

<section id="welcomepage">
  <h4>Trade-In-Offer</h4>
  <h2>Super value deals</h2>
  <h1>On all products</h1>
  <p>save more with coupons & up to 80% off!</p>
  <button>Shop Now!</button>
</section>

<section id="features" class="section1">
  <div class="febox">
    <img src="../../public/image/f1.png">
    <h6>Free Shipping</h6>
  </div>
  <div class="febox">
    <img src="../../public/image/f2.png">
    <h6>Fast Shipping</h6>
  </div>
  <div class="febox">
    <img src="../../public/image/f3.png">
    <h6>Donations</h6>
  </div>
  <div class="febox">
    <img src="../../public/image/f4.png">
    <h6>Deliveries</h6>
  </div>

</section>

<section id="product0">
  <h1>Featured Products</h1>
  <p>Electronic collection</p>

  <div class="row">
    <?php foreach ($stmn as $fetch) : ?>
      <div class="col-md-3">
        <div class="procontainer0">
          <div class="pro0" onclick="window.location.href='sproduct.php?id=<?= $fetch["idp"]; ?>';">
            <img class="img-fluid w-100" src="../../products/<?= $fetch["pictures"] ?>" alt="<?= $fetch["pname"] ?>">
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


<section id="banner" class="section-m1">
  <h4>Fixing & Repair Services</h4>
  <h2>Up to <span>55% Off</span> - All Repair services</h2>
  <button class="bannerbutton">Explore More</button>
</section>

<section id="product1">
  <h1>New arrivals</h1>
  <p>Miscs</p>
  <div class="procontainer">

    <div class="pro">
      <img class="img-fluid w-100" src="../../public/image/n1.jpg">
      <div class="des">
        <span>lightblue Long-sleeve Shirt
        </span>
        <h5>streched material - XL</h5>
        <div class="star">
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
        </div>
        <h4>$87</h4>
      </div>
      <a href=""><i class="fa-solid fa-cart-shopping shopping"></i></a>
    </div>
    <div class="pro">
      <img class="img-fluid w-100" src="../../public/image/n8.jpg">
      <div class="des">
        <span>black Short-Sleeve
        </span>
        <h5>cool black-Shirt - S</h5>
        <div class="star">
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>

        </div>
        <h4>$10</h4>
      </div>
      <a href=""><i class="fa-solid fa-cart-shopping shopping"></i></a>
    </div>
    <div class="pro">
      <img class="img-fluid w-100" src="../../public/image/n7.jpg">
      <div class="des">
        <span>khaki Long-Sleeve Shirt
        </span>
        <h5>medium button - XS</h5>
        <div class="star">
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
        </div>
        <h4>$30</h4>
      </div>
      <a href=""><i class="fa-solid fa-cart-shopping shopping"></i></a>
    </div>
    <div class="pro">
      <img class="img-fluid w-100" src="../../public/image/f6.jpg">
      <div class="des">
        <span>Blue&Orange Long-Sleeve Shirt
        </span>
        <h5>White shirt included - XXL</h5>
        <div class="star">
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
          <i class="fas fa fa-star"></i>
        </div>
        <h4>$100</h4>
      </div>
      <a href=""><i class="fa-solid fa-cart-shopping shopping"></i></a>
    </div>

  </div>
</section>

<section id=smbanner class="section1">
  <div class=" banner-box">
    <h4>Wonderful Deals</h4>
    <h2>buy 1 and get 1 </h2>
    <span>the best products are on sell on ShopEx</span>
    <button class="multiplebanner">Learn More</button>
  </div>
  <div class="banner-box banner-box2">
    <h4>Summer / Winter</h4>
    <h2>Upcoming Seasons</h2>
    <span>The most interesting Clothes are on Sales at ShopEx</span>
    <button class="multiplebanner">Collections</button>
  </div>
</section>

<section id="banner3">
  <div class="banner-box">

    <h2>SEASONS SAVES</h2>
    <h3>Summer/Winter/fall - 50% off </h3>

  </div>
  <div class="banner-box banner-box3">

    <h2>Deals Appliances</h2>
    <h3>Headphones/cameras/Cables - 80% off </h3>

  </div>
  <div class="banner-box  banner-box4">

    <h2>Special Accessories</h2>
    <h3>Headphones/cameras/Cables - 80% off </h3>

  </div>
</section>

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