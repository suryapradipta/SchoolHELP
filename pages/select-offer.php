<?php
session_start();

if ($_SESSION['loginas'] != 'administrator') {
    header("location:login.php?message=fail");
}

$viewid = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../assets/img/icon32x32.png">
    <title>View Offer - SchoolHELP</title>
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
                <li class="nav-item"><a class="nav-link " href="register-school.php"><i class="fas fa-file-medical"></i><span>Register School</span></a></li>
                <li class="nav-item"><a class="nav-link" href="submit-request.php"><i class="fas fa-hand-holding"></i><span>Submit Request</span></a></li>
                <li class="nav-item"><a class="nav-link active" href="review-offers.php"><i class="fas fa-user"></i><span>View Request</span></a></li>
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
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link"
                                   aria-expanded="false"
                                   data-bs-toggle="dropdown"
                                   href="#">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                        <?php echo $_SESSION['fullname']; ?>
                                    </span>
                                    <img class="border rounded-circle img-profile"
                                         src="../assets/img/avatars/avatar0.png">
                                </a>

                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                        Profile
                                    </a>

                                    <div class="dropdown-divider"></div>


                                    <!--LOG OUT START-->
                                    <a class="dropdown-item"
                                       href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#logoutmodal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Logout
                                    </a>

                                    <!--LOG OUT END-->

                                </div>
                            </div>
                        </li>

                        <!--PROFILE END-->

                    </ul>
                </div>
            </nav>
            <!--HEADER END-->

            <!--CONTENT START-->
            <div class="container-fluid">
                <h3 class="text-dark mb-4">View Offer</h3>
                <div class="card shadow">
                    <!--OFFER START-->
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Offer Details</p>
                    </div>

                    <div class="card-body">
                        <table id="req-form" class="table overflow-auto table-bordered" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Offer ID</th>
                                <th>Offer Date</th>
                                <th>Remarks</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Occupation</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include "action/connection.php";
                            $query = ("SELECT * FROM request  
                                    INNER JOIN offer ON request.requestid = offer.requestid 
                                    INNER JOIN volunteer ON offer.userid = volunteer.userid 
                                    INNER JOIN user ON volunteer.userid = user.userid 
                                    WHERE offer.offerid = $viewid;");

                            $result = mysqli_query($connect, $query);

                            if ($result -> num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $requestid = $row["requestid"];
                                    $offerid = $row["offerid"];
                                    $offerdate = $row["offerdate"];
                                    $remarks = $row["remarks"];
                                    $email = $row["email"];
                                    $fullname = $row["fullname"];
                                    $description = $row["description"];

                                    echo '<tr>';
                                    echo '<td>'.$row["offerid"].'</td>';
                                    echo '<td>'.$row["offerdate"].'</td>';
                                    echo '<td>'.$row["remarks"].'</td>';
                                    echo '<td>'.$row["fullname"].'</td>';
                                    $datenow = date("Y-m-d");
                                    $agenow = date_diff(date_create($row["dateofbirth"]), date_create($datenow));
                                    echo '<td>'.$agenow->format('%y').'</td>';
                                    echo '<td>'.$row["occupation"].'</td>';
                                }
                            }
                            ?>

                            <?php
                            if (isset($_GET['offer-message'])) {
                                if ($_GET['offer-message'] == "offer-success") {
                                    echo "<div class='alert alert-success' role='alert'>Offer Accepted and an Email is Sent Successfully</div>";
                                }
                            }
                            ?>
                            <form method="POST" action="action/accept-offer.php">
                                <input class="form-control" type="hidden" name="offerid" value="<?php echo $offerid;?>">
                                <input class="form-control" type="hidden" name="remarks" value="<?php echo $remarks;?>">
                                <input class="form-control" type="hidden" name="email" value="<?php echo $email;?>">
                                <input class="form-control" type="hidden" name="fullname" value="<?php echo $fullname;?>">
                                <input class="form-control" type="hidden" name="offerdate" value="<?php echo $offerdate;?>">
                                <input class="form-control" type="hidden" name="description" value="<?php echo $description;?>">
                                <input class="form-control" type="hidden" name="datenow" value="<?php echo $datenow;?>">
                                <input class="form-control" type="hidden" name="adminfullname" value="<?php echo $_SESSION["fullname"];?>">
                                <input class="form-control" type="hidden" name="adminemail" value="<?php echo $_SESSION["email"];?>">
                                <div class="form-group">
                                    <td>
                                        <input class="btn btn-outline-info" type="submit" value="Accept" name="send">
                                    </td>
                                </div>
                            </form>
                            </tbody>
                        </table>
                        <a href="select-request.php?id=<?php echo $requestid; ?>" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <!--FOOTER START-->
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright ?? SCHOOLHELP 2022</span></div>
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

        <script>
            $(document).ready(function () {
                $('#req-form').DataTable({
                    order: [[ 2, 'asc' ], [ 1, 'asc' ]]
                });
            });
        </script>
</body>

</html>