<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../assets/img/icon32x32.png">
    <title>Login - SchoolHELP</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0" style="margin-bottom: 34px;">
                    <div class="row" style="margin-bottom: 152px;">
                        <div class="col-lg-6 d-none d-lg-flex" style="padding-bottom: 0px;margin-bottom: -188px;">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;../assets/img/school/school1.JPG&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Welcome to School HELP!</h4>
                                </div>

                                <!--LOGIN VALIDATION-->
                                <?php
                                if (isset($_GET['login-message'])) {
                                    if ($_GET['login-message'] == "login-failed") {
                                        echo "<center><div class='alert alert-danger' role='alert'>Wrong password or username. Try again. </div><center>";
                                    }
                                }
                                ?>
                                <!--LOGIN VALIDATION-->


                                <!--FORM LOGIN START-->
                                <form class="user" action="action/login-action.php" method="POST">
                                    <div class="mb-3">
                                        <input class="form-control form-control-user"
                                               type="text"
                                               placeholder="Enter Username"
                                               name="username"
                                               required="required">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user"
                                               type="password"
                                               placeholder="Password"
                                               name="password"
                                               required="required"></div>
                                    <button class="btn btn-primary d-block btn-user w-100"
                                            type="submit">
                                        Login
                                    </button>

                                    <hr>

                                    <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2"
                                       role="button"
                                       href="register-volunteer.php">
                                        Register as Volunteer
                                    </a>

                                </form>
                                <!--FORM LOGIN END-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

</html>