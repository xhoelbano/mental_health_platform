<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sign Up General User</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>General User Registration form</h3>
                        <p class="mb-4">Please fill in all the information required.</p>
                        <form action="../controller/register_general_user.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" class="form-control" placeholder="e.g. Test24"
                                            name="nickname" id="nickname" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group first">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control"
                                                    placeholder="e.g. john@your-domain.com" name="email" id="email"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group last mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" placeholder="Your Password"
                                                    name="password" id="password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-5 mt-4 align-items-center">
                                        <div class="d-flex align-items-center">
                                            <label class="control control--checkbox mb-0"><span class="caption">Creating
                                                    an account means you're okay with our <a
                                                        href="../terms_conditions.php">Terms and
                                                        Conditions</a> and
                                                    our <a href="../privacy_policy.php">Privacy Policy</a>.</span>
                                                <input type="checkbox" required />
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <input type="submit" value="Register" class="btn px-5 btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>