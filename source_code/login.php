<?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="bg-img">
        <div class="content">
            <header>Login Form </header>
            <form action="controller/check_login.php" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" required placeholder="Enter your Email:" name="email" id="email">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" required placeholder="Password" name="password"
                        id="password">
                    <span class="show">SHOW</span>
                </div>
                <div class="pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
            <div class="login">
                Or login with
            </div>
            <div class="links">
                <div class="google">
                    <i class='fab fa-google'><span>Google</span></i>
                </div>
            </div>
            <div class="signup">
                Don't have account?
                <a href="./signup/signup.php" class="">Signup Now</a>

            </div>

            <div class="field">
                <input type="button" value="Go Home" onclick="location.href='index.php'">
            </div>


        </div>
    </div>
    <script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show');
    showBtn.addEventListener('click', function() {
        if (pass_field.type === "password") {
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
        } else {
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
        }
    });
    </script>
</body>

</html>

<?php } else {
    if ($_SESSION['type'] == 0) #admin
    header("Location: views/index.php");
else if ($_SESSION['type'] == 1) #general_user
    header("Location: views/index.php");
else if ($_SESSION['type'] == 2) #psychologist
    header("Location: views/index.php");
else if ($_SESSION['type'] == 3) #business
    header("Location: views/index.php"); 
else if ($_SESSION['type'] == 4) #business
    header("Location: views/index.php"); 
}