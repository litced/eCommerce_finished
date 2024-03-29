<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../public/js/authregister.js"></script>
    <script src="../../public/js/authlogin.js"></script>
    <link rel="stylesheet" href="../../public/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">



    <title>Document</title>
</head>

<body>
    <div class="container">

        <form id="registerform" method="post">
            <div class="title">
                <i class="fa-solid fa-user-plus user"></i>
                <h1>Create a Account</h1>
                <p>Fill the information below to create a Account</p>
            </div>
            <div class="registerinfo">
                <input type="text" name="Firstname" id="firstname" placeholder="firstname">
                <input type="text" name="Lastname" id="lastname" placeholder="Lastname">
                <input type="text" name="Username" id="username " placeholder="Username">
                <input type="password" name="Conpassword" id="conpassword " placeholder="Confirm Password">
                <input type="password" name="Password" id="password " placeholder="Password">
                <label for="role" id="role" style="display: none;">Role:</label>
                <select name="roles" class="select" id="role" style="display: none;">
                    <option value="customer" class="selection">customer</option>
                </select>

            </div>
            <input type="submit" id="registerbutton" value="Create Account">
            <p class="toggleform" onclick="toggleForm()">Already have an account? Login</p>
        </form>

        <form method="post" id="loginform">
            <div class="title2">
                <i class="fa-solid fa-user user2"></i>
                <h1>Login</h1>
                <p>fill the informations bellow</p>
            </div>
            <div class="logininfos">
                <input type="text" name="Username" id="usernamelog" placeholder="Username">
                <input type="password" name="Password" id="passwordlog" placeholder="Password">
            </div>
            <input type="submit" id="loginbutton" value="Log in">
            <p class="toggleform" onclick="toggleForm()">No account? Register</p>
        </form>


    </div>

</body>

<script>
    // $(document).ready(function() {
    //     $("#toggleForms").click(function() {
    //         $("#registerform, #loginform").slideToggle();
    //     });
    // });

    function toggleForm() {
        $('#registerform').slideToggle(400);
        $('#loginform').slideToggle(400);
    }
</script>

</html>