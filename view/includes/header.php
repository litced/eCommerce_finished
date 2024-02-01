<?php

$Session = $_SESSION["admin"];
$RoleSession = $Session["roles"];

$count = '';
if (!empty($_SESSION['addTocart']))
  $count = count($_SESSION['addTocart']);
else
  $count = 0;
?>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>ShopEx</title>



  <!-- --------------CSS LINK'S FILE------------------------ -->
  <link rel="stylesheet" href="http://localhost/eCommerce/public/css/includes.css">

  <!-- ----------FILE'S LINKS------------- -->

  <script src="http://localhost/eCommerce/public/js/Misc.js"></script>
  <script src="http://localhost/eCommerce/public/js/addproduct.js"></script>
  <script src="http://localhost/eCommerce/public/js/addworker.js"></script>
  <script src="http://localhost/eCommerce/public/js/productdelete.js"></script>
  <script src="http://localhost/eCommerce/public/js/workerdelete.js"></script>
  <script src="http://localhost/eCommerce/public/js/addcart.js"></script>
  <script src="http://localhost/eCommerce/public/js/UpdateUser.js"></script>
  <script src="http://localhost/eCommerce/public/js/placeorder.js"></script>

  <!-- -------------------TOASTIFY'S LINK----------------- -->

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <!-- --------------------SWEET ALERT LINK----------------------- -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- -------------------BOOTSTRAP--------------------- -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <style>
    .profile-menu {
      position: relative;
      display: inline-block;
      z-index: 1;
      text-align: center;
    }

    .submenu {
      display: none;
      position: absolute;
      top: 100%;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: 0.3s ease-in-out;
    }

    .submenu li {
      padding: 19px;
      margin: 9px;
    }

    .profile-menu:hover .submenu {
      display: block;
    }
  </style>
</head>

<body>
  <section id="header">
    <h2 class="title" style="cursor: pointer;" onclick="window.location.href='http://localhost/eCommerce/view/admin/'">shopEx</h2>
    <div>

      <button id="menubutton"><i class="fa-solid fa-bars"></i></button>

      <ul id="navbar">
        <li><a id="home" href="http://localhost/eCommerce/view/admin/">Home</a></li>
        <li><a id="shop" href="shop.php">Shop</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="aboutUs.php">About</a></li>
        <li><a href="contactUs.php">Contact</a></li>

        <li class="classcart"><a class="acart" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
        <p id="number"><?= $count ?></p>


        <div class="profile-menu">
          <li><a href="profile.php"><i class="fa-regular fa-circle-user profilecircle"></i></a></li>
          <ul class="submenu">

            <?php if (empty($_SESSION["admin"])) : ?>
              <li><a href="auth.php">Register</a></li>
              <li><a href="auth.php">Login</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION["admin"])) : ?>
              <li><a href=""><?= $Session["username"] ?></a></li>
              <li><a href="auth.php">Settings</a></li>
              <li><a href="../../src/controller/logout.ctrl.php" name="logout">Logout</a></li>
            <?php endif; ?>
            <?php if ($RoleSession === "admin") :  ?>
              <li><a href="http://localhost/eCommerce/backend/adminBoards.php">Dashboard</a></li>
            <?php endif; ?>

          </ul>
        </div>

        <div class="sidebar">
          <h1>Your Cart</h1>

          <div class="listCart">
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

                <div class="item">
             
                  <div class="image">
                    <img src="../../products/<?= $fetch['pictures']; ?>" alt="">
                  </div>
                  <div class="Name">
                    <?= $fetch['description']; ?>
                  </div>
                  <div class="totalprice">
                    <?= $fetch['price']; ?>$
                  </div>
                  <div class="quantity">

                    <span class="minus"><?= $fetch['quantity']; ?></span>
                    <i class="fa-solid fa-xmark removeSidebar" id="<?= $fetch['idp'] ?>"></i>

                  </div>
             
                </div>

            <?php
              endforeach;
              $total = $subtotal + $taxe;
              $_SESSION['total'] = $total;
            endif;
            ?>
            <h3>Total : <?= $total; ?>$</h3>
          </div>
        </div>

      </ul>
    </div>
  </section>

  <script>
    // -------------------ADD TO CART Index/Shop----------------------

    $(document).ready(function() {
      $(".addtoitem").on("click", function(e) {

        var ID = $(this).attr("id")


        $.ajax({
          url: 'http://localhost/eCommerce/src/controller/addTocart.php',
          type: 'POST',
          data: {
            ID: ID
          },
          success: function(result) {
            HeaderRefresh();
            console.log(result);
          }
        });
      });
    });

     // -------------------ADD TO CART sProduct----------------------
    function HeaderRefresh() {
      window.history.go(0);
    }
    $(document).ready(function() {
      $(".sproductAddtocart").on("click", function(e) {

        var ID = $(this).attr("id")
        


        $.ajax({
          url: 'http://localhost/eCommerce/src/controller/addTocart.php',
          type: 'POST',
          data: {
            ID: ID
          },
          success: function(result) {
            HeaderRefresh();
            console.log(result);
          }
        });
      });
    });

    function HeaderRefresh() {
      window.history.go(0);
    }

    //  --------------------------REMOVE FROM CART----------------------------


    $(document).ready(function() {
      $(".remove").on("click", function() {
        var itmID = $(this).attr("id");


        $.ajax({
          url: 'http://localhost/eCommerce/src/controller/removeFromcart.php',
          type: 'POST',
          data: {
            itmID: itmID
          },
          success: function(result) {
            HeaderRefresh();

            window.history.go(0);
          }
        });
      });
    });
    $(document).ready(function() {
      $(".removeSidebar").on("click", function() {
        var itmID = $(this).attr("id");


        $.ajax({
          url: 'http://localhost/eCommerce/src/controller/removeFromcart.php',
          type: 'POST',
          data: {
            itmID: itmID
          },
          success: function(result) {
            HeaderRefresh();

            window.history.go(0);
          }
        });
      });
    });
    // ------------------CART QUANTITY UPDATE-------------------------

    $(document).ready(function() {
      $('.quantityInput').on('blur', function(e) {
        var $itm_id = $(this).attr("id");
        var $itm_qty = $(this).parents('.quantity').find('.quantityInput');
        var currentVal = parseInt($itm_qty.val());

        if (currentVal > 0) {
          update_qty(parseInt($itm_id), currentVal);
        } else {
          $itm_qty.val(1);
          currentVal = parseInt($itm_qty.val());
          update_qty(parseInt($itm_id), currentVal);

        }
      });
    });

    function update_qty(itm_id, itm_qty) {
      $.ajax({
        url: 'http://localhost/eCommerce/src/controller/updateCartQuantity.php',
        method: 'POST',
        data: {
          itmID: itm_id,
          itmQty: itm_qty
        },
        success: function(response) {
          window.history.go(0);
        }
      });
    }

    $(document).ready(function() {
      $('.minus').click(function(e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.quantityInput').val();
        var itemID = $(this).attr("id");
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
          value++;
          $(this).parents('.quantity').find('.quantityInput').val(value);
          update_qty(parseInt(itemID), parseInt(value));
          alert("ID: " + itemID + " Qty: " + value);
        }
      });

      $('.plus').click(function(e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.quantityInput').val();
        var itemID = $(this).attr("id");
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
          value--;
          $(this).parents('.quantity').find('.quantityInput').val(value);
          update_qty(parseInt(itemID), parseInt(value));
          alert(value);
        }
      });
    });
























    $(document).ready(function() {
      $(".submenu").hide();
      $(".profile-menu").hover(
        function() {
          $(".submenu").slideDown("fast");
        },
        function() {
          $(".submenu").slideUp("fast");
        }
      );
    });

    $(document).ready(function() {

      $(".sidebar").hide();


      $(".classcart, .sidebar").hover(
        function() {
          $(".sidebar").slideDown("fast");
        },
        function() {
          $(".sidebar").slideUp("fast");
        }
      );
    });
  </script>

  <!-- THIS IS A EFFECT WHEN IT CLICKED TO BE APPLY WHEN  MADE THE JS FOR IT  -->
  <!-- class="active" -->