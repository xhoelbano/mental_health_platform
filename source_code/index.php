<!DOCTYPE html>
<html>

<head>
    <title>Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="landingpage.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Permanent+Marker&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <section id="landing-page">
        <div class="branding">

            <nav class="navbar">
                <ul class="listing">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup/signup.php">Register</a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <div class="content-inner">
                <div class="logo">
                    <a href="<?php echo $_SERVER['PHP_SELF']?>"><img src="images/wallpaper.png" width="700" height="270"
                            alt="logo" /></a>
                </div>
                <!-- <h1 class="heading">PPMS</h1> -->
                <p><br><br>
                    The creation, design, and use of web applications that are focused on mental health care
                    (E-mental health) present several advantages when compared with traditional mental health
                    methods being applied nowadays. This platform focuses on raising people’s awareness and increasing
                    their attention
                    towards mental health care. <br><br>
                    The platform is intended to serve as a tool to educate people by making them realize that mental
                    health care is
                    a necessity and not a luxury, by involving them in the studies/surveys directly, and by presenting
                    them with
                    live infographics based on people's responses and interaction. At any time the system/platform will
                    keep the
                    users' anonymity and confidentiality and create a secure environment for them to interact. The web
                    application
                    proposed, would have on top of it verified psychologists who will have the privilege to create
                    studies/surveys
                    and spread them among the user, get results, and give conclusions.
                </p>
            </div>
        </div>
        <ul class="social-icons listing">
            <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
            </li>
        </ul>
    </section>
</body>

</html>