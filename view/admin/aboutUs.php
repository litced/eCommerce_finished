<?php
session_start();
if (empty($_SESSION["admin"])) {
    header("location: http://localhost/eCommerce/view/admin/auth.php");
}
include "../includes/header.php";
?>

<section id="aboutuspage" class="aboutus">
    <h2>#AboutUs</h2>
    <p>Know all about us!!</p>

</section>

<section id="abouthead" class="abouthead1">
    <img src="../../public/image/nw2.jpg" alt="">
    <div>
        <h2>Who We Are?</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores distinctio praesentium exercitationem totam atque. Ullam quisquam odio officiis reprehenderit quos magnam dolor deserunt corrupti nihil? Accusamus ut odit magnam ex.</p>

        <abbr title="">Selling everything and helping customers with any problems that can be encounter.</abbr>

        <br><br>

        <marquee bgcolor="lightgray" loop="-1" scrollamount="5" width="100%">Selling everything and helping customers with any problems that can be encounter.</marquee>
    </div>
</section>

<section id="aboutapp" class="aboutapp1">
    <h1>Download Our <a href="">App</a></h1>
    <div class="video">
        <video autoplay muted loop src="../../public/image/1.mp4"></video>
    </div>
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