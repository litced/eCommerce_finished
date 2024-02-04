<?php
// session_start();
// if (empty($_SESSION["admin"])) {
//     header("location: http://localhost/eCommerce/view/admin/auth.php");
// }
include "../includes/header.php";
?>

<section id="aboutuspage" class="aboutus">
    <h2>#Talk_with_Us</h2>
    <p>We would love to hear your thoughts , Talk with Us!!</p>

</section>

<section id="contactdetails" class="contactdetails1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>visit one of out agenct locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
            <li>
                <i class="fa-regular fa-map"></i>
                <p>Port-au-Prince</p>
            </li>
            <li>
                <i class="fa-regular fa-envelope"></i>
                <p>ShopEx@gmail.com</p>
            </li>
            <li>
                <i class="fa-solid fa-phone"></i>
                <p>+50944679809</p>
            </li>
            <li>
                <i class="fa-regular fa-clock"></i>
                <p>Monday to Friday : 8:30Am to 4:00Pm</p>
            </li>
        </div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121020.34892082695!2d-72.36686183245227!3d18.57918192830499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb9dd57503eaa91%3A0x3cd5815df929aa08!2sPort-au-Prince!5e0!3m2!1sen!2sht!4v1704896163635!5m2!1sen!2sht" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section id="formdetails">
    <form action="">
        <span>LEAVE A MESSAGE</span>
        <h2>We would love to hear from you</h2>
        <input type="text" id="yourname" placeholder="Your Name">
        <input type="text" id="youremail" placeholder="Email">
        <input type="text" id="yoursubject" placeholder="Subject">
        <textarea name="messageplace" id="textarea" cols="30" rows="10" placeholder="Your Message"></textarea>
        <button id="submitbutton">Submit</button>
    </form>
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