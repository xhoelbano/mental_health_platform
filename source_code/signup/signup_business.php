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

    <title>Sign Up Business</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>Business Registration form</h3>
                        <p class="mb-4">After filling in the information we will check your email domain.</p>
                        <form action="../controller/register_business.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="bname">Business Name</label>
                                        <input type="text" class="form-control" placeholder="e.g. Business Name"
                                            id="bname" name="bname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="nipt">NIPT</label>
                                        <input type="text" class="form-control" placeholder="e.g. K3423325325J"
                                            name="nipt" id="nipt" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" placeholder="e.g. john@your-domain.com"
                                            name="email" id="email" required>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" placeholder="e.g. 0612345678"
                                            name="contact" id="contact" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g. Autostrada Tirane-Durres" id="address" name="address"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" placeholder="e.g. epoka.edu.al"
                                            name="website" id="website">
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
                                        <input type="checkbox" checked="checked" required />
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