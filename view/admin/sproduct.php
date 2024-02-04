<?php
// session_start();
// if (empty($_SESSION["admin"])) {
//   header("location: http://localhost/eCommerce/view/admin/auth.php");
// }
include "../includes/header.php";
include_once "../../vendor/autoload.php";
include "../../src/config/instance.php";

$connector = $connection->conn();


if (isset($_GET['id'])) {
  $productId = $_GET['id'];


  $stmn = $connector->prepare("SELECT * FROM products WHERE idp = :id");
  $stmn->bindParam(':id', $productId);
  $stmn->execute();

  $stmnRandom = $connector->prepare("SELECT * FROM products ORDER BY RAND() LIMIT 4");
  $stmnRandom->execute();
  $randomProducts = $stmnRandom->fetchAll(PDO::FETCH_ASSOC);



  if ($stmn->rowCount() > 0) {
    $productDetails = $stmn->fetch(PDO::FETCH_ASSOC);


?>

    <section id="prodetails" class="section-p1">
      <div class="single-pro-image">
        <img src="../../products/<?= $productDetails["pictures"]; ?>" width="100%" id="mainimg" alt="<?= $productDetails["pname"]; ?>">

        <div class="small-img-group">
          <?php foreach ($randomProducts as $get) : ?>
            <div class="small-img-col">
              <img src="../../products/<?= $get["pictures"]; ?>" width="100%" class="small-img" alt="<?= $get["pname"]; ?>">
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="single-pro-details">
        <h6>Home / Misc</h6>
        <h4><?= $productDetails["pname"]; ?></h4>
        <h2><?= $productDetails["price"]; ?></h2>
        <!-- <select name="" id="">
            <option>Select Size</option>
            <option>XXL</option>
            <option>XL</option>
            <option>X</option>
            <option>L</option>
            <option>M</option>
            <option>S</option>
            <option>XS</option>
        </select> -->
        <p>In Stock :<?= $productDetails["quantity"]; ?>pcs</p>
        <!-- <input type="amount" value=""> -->

        <button class="sproductAddtocart" id="<?= $productDetails["idp"]; ?>">Add To Cart</button>

        <h4>Product Details</h4>
        <span><?= $productDetails["descriptions"]; ?></span>
      </div>
    </section>
<?php
  } else {

    echo "Product not found";
  }
} else {

  echo "Product ID not provided";
}
?>

<section id="prodetails" class="section-p1">

</section>



<section id="product1">
  <h1>New arrivals</h1>
  <p>Miscs</p>
  <div class="procontainer">

    <div class="pro" onclick="window.location.href='sproduct.php';">
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
    <div class="pro" onclick="window.location.href='sproduct.php';">
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
    <div class="pro" onclick="window.location.href='sproduct.php';">
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
    <div class="pro" onclick="window.location.href='sproduct.php';">
      <img class="img-fluid w-100"  src="../../public/image/f6.jpg">
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

<script>
  let MainImg = document.getElementById("mainimg");
  let smallimg = document.getElementsByClassName("small-img");

  smallimg[0].onclick = function() {
    MainImg.src = smallimg[0].src;
  };
  smallimg[1].onclick = function() {
    MainImg.src = smallimg[1].src;
  };
  smallimg[2].onclick = function() {
    MainImg.src = smallimg[2].src;
  };
  smallimg[3].onclick = function() {
    MainImg.src = smallimg[3].src;
  };
</script>
<?php
include "../includes/footer.php";
?>