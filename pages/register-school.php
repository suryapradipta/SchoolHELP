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
    <title>Table - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/bootstrap/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/datatables.css">

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
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link active" href="register-school.php"><i class="fas fa-file-medical"></i><span>Register School</span></a></li>
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
                                        <a class="dropdown-item" href="profile.php">
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

            <!--CONTENT START-->
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Register School</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">School Info</p>
                    </div>
                    <div class="card-body">
                        <table id="schoolinfotable" class="table overflow-auto" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>School ID</th>
                                <th>School Name</th>
                                <th>City</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include "action/connection.php";
                            $query = ("SELECT * FROM `school`");
                            $result = mysqli_query($connect, $query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["schoolid"] . '</td>';
                                    echo '<td>' . $row["schoolname"] . '</td>';
                                    echo '<td>' . $row["city"] . '</td>';
                                    echo '<td>' . $row["address"] . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>

                <!--DROP DOWN MENU START-->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                            type="button" style="margin-bottom: 10px;">Register as
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="form-school-display">School</a>
                        <a class="dropdown-item" href="#" id="form-administrator-display">School Administrator</a>

                    </div>
                </div>
                <!--DROP DOWN MENU END-->


                <!--SCHOOL FORM START-->
                <div class="card shadow" id="school-form">
                    <!--HEADER START-->
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">School Form</p>
                    </div>
                    <!--HEADER END-->

                    <!--FORM START-->
                    <div class="card-body">

                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "success") {
                                echo "<div class='alert alert-success' role='alert'>School has successfully saved!</div>";
                            } else if ($_GET['message'] == "invalidschool") {
                                echo "<div class='alert alert-danger' role='alert'>School already registered, try continue to create school administrator?</div>";

                            } else if ($_GET['message'] == "fail") {
                                echo "<div class='alert alert-danger' role='alert'>Error!!! The school can't be saved</div>";
                            }
                        }
                        ?>

                        <form method="post" action="action/register-school-action.php">
                            <label class="form-label">School Name</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="schoolname"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Address</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="address"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">City</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="city"
                                       required="required">
                            </div>

                            <button class="btn btn-primary" type="submit" style="background: var(--bs-green);margin-top: 20px;">Submit</button>
                        </form>
                    </div>
                    <!--FORM END-->
                </div>
                <!--SCHOOL FORM END-->



                <!--SCHOOL ADMINISTRATOR FORM INPUT START-->
                <div class="card shadow" style="display: none" id="administrator-form">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">School Administrator Form</p>
                    </div>
                    <div class="card-body">


                        <?php
                        if (isset($_GET['message'])) {
                            if ($_GET['message'] == "register-administrator-success") {
                                echo "<div class='alert alert-success' role='alert'>User has successfully saved!</div>";
                            } else if ($_GET['message'] == "invaliduser") {
                                echo "<div class='alert alert-danger' role='alert'>User already registered</div>";
                            } else if ($_GET['message'] == "register-administrator-fail") {
                                echo "<div class='alert alert-danger' role='alert'>Error! User can't be saved</div>";
                            }
                        }
                        ?>

                        <form method="post" action="action/register-administrator-action.php">

                            <label class="form-label">School ID</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="number"
                                       name="schoolid"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Username</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="username"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Password</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="password"
                                       name="password"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Full Name</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="fullname"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Email</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="email"
                                       name="email"
                                       required="required"/>
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Phone</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="number"
                                       name="phone"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Staff ID</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="number"
                                       name="staffid"
                                       required="required">
                            </div>

                            <label class="form-label" style="margin-top: 15px;">Position</label>
                            <div class="input-group">
                                <input class="form-control"
                                       type="text"
                                       name="position"
                                       required="required">
                            </div>

                            <button class="btn btn-primary" type="submit"
                                    style="background: var(--bs-green);margin-top: 20px;">Submit
                            </button>
                        </form>

                    </div>
                </div>
                <!--SCHOOL ADMINISTRATOR FORM INPUT END-->
            </div>
            <!--CONTENT END-->
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

<!-- Modal -->
<?php if(isset($_GET['invalidschool']) != NULL) { ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>




<!--MODAL-->
<script src="../assets/js/modal.js"></script>

<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/theme.js"></script>

<!--DATA TABLES START-->
<script src="../assets/js/jquery-3.6.1.js" type="text/javascript"></script>
<script src="../assets/js/datatables.min.js"></script>
<script src="../assets/js/datatables.js"></script>
<!--DATA TABLES END-->

<script>
    $('#schoolinfotable').dataTable({
        scrollY: 270,
        scrollX: true,
    });


</script>

<!--HIDE AND SHOW FORM START-->
<script>
    $('#form-administrator-display').click(function () {
        if ($('#administrator-form').css('display') === 'none') {
            $('#administrator-form').show();
            $('#school-form').hide();
        }

    })

    $('#form-school-display').click(function () {
        if ($('#school-form').css('display') === 'none') {
            $('#administrator-form').hide();
            $('#school-form').show();
        }
    })


</script>
<!--HIDE AND SHOW FORM END-->

<!--SHOW MODAL WHILE INVALID-->
<!--NOT YET WORKED-->
<script>
    if(document.getElementById("exampleModal")){
        var exmodal = new bootstrap.Modal(document.getElementById("exampleModal"));
        exmodal.show();
    }
</script>


</body>

</html>