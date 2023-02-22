<!DOCTYPE html>
<html>

<head>
    <title>Privacy & Policy</title>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup/signup.php">Register</a></li>

                </ul>
            </nav>
        </div>
        <br><br>
        <div class="content">
            <div class="content-inner">
                <div class="logo">

                    <a href=index.php><img src="images/wallpaper.png" width="700" height="270" alt="logo" /></a>
                </div>
                <!-- <h1 class="heading">PPMS</h1> -->
                <p><br>

                    Security<br>
                    In order to increase the platform security, it will be accessed through HTTPS, which offers an
                    encrypted communication protocol using Transport Layer Security (TLS). Every password will be
                    encrypted in our database through the password_hash() function in PHP since it uses a strong one-way
                    hashing algorithm. Since the MH web application will be coded in backend with PHP our main security
                    principle and practice will be “Filter Input & Escape Output” in order to eliminate every possible
                    way that threatens our system security.
                    In order to be authenticated and logged in to the system, every user must provide their email and
                    password. Once a user logs in, a session is created for that user.
                    A manual verification & authorization will be placed by the platform administrator for two types of
                    users: business & psychologist, in order to increase the reliability of our systems. The system will
                    use a profile level checker in order so each user when enters his credentials it’s going to land on
                    the appropriate dashboard.
                    <br><br>
                    Data Management and Privacy Policy<br>
                    All the user personal data including documentation uploaded in the system must be collected with
                    their consent. They will have to check and comply with the Privacy & Policy statement when they
                    register in the platform.
                    The MH platform does not take responsibility and leaves it in the hands of the user for any
                    information they provide in our system (text, image & documentation) that complies with various
                    regulations and copyrights.
                    Users have to contact us directly if they want to delete their account and remove all their data
                    from the system in order to conform to GDPR rules.


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