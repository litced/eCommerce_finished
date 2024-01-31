<?php
session_start();
if (empty($_SESSION["admin"])) {
    header("location: http://localhost/eCommerce/view/admin/auth.php");
}
include "../includes/header.php";
?>

<section id="blogpage" class="blog">
    <h2>#ReadMore</h2>
    <p>Read everything about Us and our products!</p>

</section>

<section id="blog">
    <div class="blog-box">
        <div class="blog-img">
            <img src="../../public/image/blog1.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4> Skills</h4>
            <p>he practical abilities, competencies, and expertise that individuals acquire through training, practice, and experience. They are the application of knowledge in a specific context, enabling individuals to perform tasks, solve problems, and achieve specific goals....</p>
            <a href="#">CONTINUE READING</a>
        </div>
        <h1>13/01</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="../../public/image/blog3.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4> Time Management</h4>
            <p>Time management is a critical skill that empowers individuals to make the most of their available time, enhancing productivity and efficiency. It involves the strategic allocation of time to various tasks and activities, prioritizing them based on their importance and deadlines. Effectively managing time requires self-discipline, focus, and the ability to set realistic goals...</p>
            <a href="#">CONTINUE READING</a>
        </div>
        <h1>14/01</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="../../public/image/blog4.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Money Management</h4>
            <p>
                Money management is a comprehensive approach to handling one's financial resources wisely, encompassing budgeting, saving, investing, and strategic decision-making to achieve both short-term and long-term financial goals. At its core, effective money management involves maintaining control over financial affairs....</p>
            <a href="#">CONTINUE READING</a>
        </div>
        <h1>16/01</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="../../public/image/blog5.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4> Team Communication</h4>
            <p>Effective team communication is the cornerstone of successful collaboration within any organization. It involves the exchange of information, ideas, and feedback among team members with the overarching goal of achieving...</p>
            <a href="#">CONTINUE READING</a>
        </div>
        <h1>18/01</h1>
    </div>
    <div class="blog-box">
        <div class="blog-img">
            <img src="../../public/image/blog6.jpg" alt="">
        </div>
        <div class="blog-details">
            <h4>Knowlege</h4>
            <p>
                Knowledge refers to the understanding, awareness, and familiarity with facts, information, skills, or concepts acquired through study, experience, or education. It is a broad term that encompasses various forms of awareness and expertise across ....</p>
            <a href="#">CONTINUE READING</a>
        </div>
        <h1>19/01</h1>
    </div>
</section>
<br><br><br>
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