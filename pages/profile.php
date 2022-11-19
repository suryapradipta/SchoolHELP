<?php
session_start();

if ($_SESSION['loginas'] != 'administrator') {
    header("location:../login.php?message=fail");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-school"></i></div>
                <div class="sidebar-brand-text mx-3"><span>schoolhelp</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="home-administrator.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="register-school.php"><i class="fas fa-file-medical"></i><span>Register School</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline">
                <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <!--HEADER START-->
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>


                        <!--PROFILE START-->
                        <?php
                        include 'action/connection.php';

                        $userid = $_SESSION['userid'];
                        $staffid = $_SESSION['staffid'];


                        $sql = mysqli_query($connect, "select * from user where userid='$userid'");
                        while ($datauser = mysqli_fetch_array($sql)) {
                            ?>

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link"
                                       aria-expanded="false"
                                       data-bs-toggle="dropdown"
                                       href="#">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                        <?php echo $datauser['fullname']; ?>
                                    </span>
                                        <img class="border rounded-circle img-profile"
                                             src="../assets/img/avatars/avatar1.jpeg">
                                    </a>

                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                            Profile
                                        </a>

                                        <div class="dropdown-divider"></div>


                                        <!--LOG OUT START-->
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutmodal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                        <!--LOG OUT END-->


                                    </div>
                                </div>
                            </li>
                            <?php
                        }

                        ?>
                        <!--PROFILE END-->


                    </ul>
                </div>
            </nav>
            <!--HEADER END-->

            <div class="container-fluid">
                <h3 class="text-dark mb-4">Profile</h3>
                <!--CHANGE USER PROFILE START-->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">User Settings</p>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "update-profile-success") {
                                echo "<div class='alert alert-success' role='alert'>Profile has successfully updated!</div>";
                            } else if ($_GET['message'] == "update-profile-fail") {
                                echo "<div class='alert alert-danger' role='alert'>Error! The profile can't updated</div>";
                            }
                        }
                        ?>

                        <?php
                        include 'action/connection.php';

                        $userid = $_SESSION['userid'];
                        $staffid = $_SESSION['staffid'];


                        $sql = mysqli_query($connect, "select * from user where userid='$userid'");
                        $sql2 = mysqli_query($connect, "select * from schooladmin where staffid='$staffid'");
                        while ($datauser = mysqli_fetch_array($sql)) {
                            while ($dataadmin = mysqli_fetch_array($sql2)) {
                                ?>
                                <form method="post" action="action/profile-action.php">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>Full Name</strong>
                                                </label>
                                                <input type="hidden"
                                                       name="userid"
                                                       value="<?php echo $datauser['userid']; ?>">

                                                <input class="form-control"
                                                       type="text" id="fullname"
                                                       placeholder="Full Name"
                                                       name="fullname"
                                                       required="required"
                                                       value="<?php echo $datauser['fullname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">
                                                    <strong>Email Address</strong>
                                                </label>

                                                <input class="form-control"
                                                       type="email"
                                                       id="email"
                                                       placeholder="user@example.com"
                                                       name="email"
                                                       required="required"
                                                       value="<?php echo $datauser['email']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">
                                                    <strong>Phone</strong>
                                                </label>
                                                <input class="form-control"
                                                       type="number"
                                                       id="phone"
                                                       placeholder="0000000000"
                                                       name="phone"
                                                       required="required"
                                                       value="<?php echo $datauser['phone']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="staffid">
                                                    <strong>Staff ID</strong>
                                                    <br>
                                                </label>
                                                <input class="form-control"
                                                       type="text"
                                                       placeholder="000"
                                                       name="staffid"
                                                       required="required"
                                                       value="<?php echo $dataadmin['staffid']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="position">
                                                    <strong>Position</strong>
                                                </label>
                                                <input class="form-control"
                                                       type="text"
                                                       id="position"
                                                       placeholder="Position"
                                                       name="position"
                                                       required="required"
                                                       value="<?php echo $dataadmin['position']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-sm"
                                                type="submit"
                                                style="background: var(--bs-success);">
                                            Save Settings
                                        </button>
                                    </div>
                                </form>

                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <!--CHANGE USER PROFILE END-->

                <!--CHANGE PASSWORD START-->
                <div class="card shadow" style="margin-top: 30px;">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Change Password</p>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "update-password-success") {
                                echo "<div class='alert alert-success' role='alert'>Password has successfully updated!</div>";
                            } else if ($_GET['message'] == "update-password-fail") {
                                echo "<div class='alert alert-danger' role='alert'>Error! Password can't updated</div>";
                            }
                            else if ($_GET['message'] == "update-password-match") {
                                echo "<div class='alert alert-danger' role='alert'>Password is not the same</div>";
                            }
                        }
                        ?>

                        <?php
                        include 'action/connection.php';

                        $userid = $_SESSION['userid'];

                        $sql = mysqli_query($connect, "select * from user where userid='$userid'");
                        while ($datauser = mysqli_fetch_array($sql)) {
                            ?>
                            <form method="post" action="action/profile-password-action.php">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="hidden"
                                               name="userid"
                                               value="<?php echo $datauser['userid']; ?>">

                                        <input type="hidden"
                                               name="password"
                                               value="<?php echo $datauser['password']; ?>">

                                        <input id="examplePasswordInput"
                                               class="form-control form-control-user"
                                               type="password"
                                               placeholder="Password"
                                               name="password"
                                               required="required"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="exampleRepeatPasswordInput"
                                               class="form-control form-control-user"
                                               type="password"
                                               placeholder="Repeat Password"
                                               name="password_repeat"
                                               required="required"/>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm"
                                            type="submit"
                                            style="background: var(--bs-green);">
                                        Save Settings
                                    </button>
                                </div>
                            </form>

                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!--CHANGE PASSWORD END-->


            </div>
        </div>
        <!--FOOTER START-->
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © SCHOOLHELP 2022</span></div>
            </div>
        </footer>
        <!--FOOTER END-->
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<!-- Modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure want to log out?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!--MODAL-->
<script src="../assets/js/modal.js"></script>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

</html>