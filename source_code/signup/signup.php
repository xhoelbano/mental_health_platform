<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Select your profile</title>
    <link rel="stylesheet" href="stylesignup.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="container">
        <header>Signup Form</header>
        <div class="form-outer">
            <form action="#">
                <div class="page slide-page">
                    <div class="title">
                        Who are you:</div>
                    <div class="field">
                        <div class="label">
                            Who are you signing up as?</div>
                        <select onchange="la(this.value)" name="registration_page" id="registration_page">
                            <option disabled selected>Select your profile</option>
                            <option value="signup_general_user.php">General User</option>
                            <option value="signup_psychologist.php">Psychologist</option>
                            <option value="signup_business.php">Business</option>
                        </select>
                    </div>

                    <div class="field">
                        <input type="button" value="Go Home" onclick="location.href='../index.php'">
                    </div>
                    <div class="index">

                        Already have an account?
                        <a href="../login.php" class="">Login Now</a>
                    </div>
                </div>
            </form>
            <script>
            function la(src) {
                window.location = src;
            }
            </script>

        </div>

</body>

</html>