<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;../assets/img/school/school1.JPG&quot;);"></div>
                </div>
                <div class="col-lg-7" style="margin-bottom: 84px;">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Create an Account!</h4>
                        </div>
                        <form class="user">
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="username" placeholder="Username" name="username" required="required"></div>
                                <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                            </div>
                            <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" required="required">
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="text" id="fullname" placeholder="Full Name" name="fullname" required="required">
                                </div>

                                <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="number" id="phone" placeholder="Phone Number" required="required">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="occupation" placeholder="Occupation" name="occupation" required="required"></div>
                                <div class="col-sm-6"><input class="form-control" id="dateofbirth" type="date" required="required"></div>
                            </div>
                            <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                            <hr>
                        </form>
                        <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

</html>