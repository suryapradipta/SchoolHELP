<?php
session_start();

if($_SESSION['loginas']!="volunteer") {
    header("location:login.php?message=fail");
}
$viewid = $_GET['id'];
include "action/connection.php";
$query = "SELECT * FROM `school` INNER JOIN request ON school.schoolid =
        request.schoolid LEFT JOIN tutorialrequest ON request.requestid = 
        tutorialrequest.requestid LEFT JOIN resourcerequest ON request.requestid = 
        resourcerequest.requestid WHERE request.requestid = "."$viewid";
    $result = mysqli_query($connect, $query);
    if ($result -> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["requeststatus"] == "NEW"){
                $schoolname = $row["schoolname"];
                $requestdate = $row["requestdate"];
                $description = $row["description"];

                $proposeddate = $row["proposeddate"];
                $proposedtime = $row["proposedtime"];
                $studentlevel = $row["studentlevel"];
                $numstudent = $row["numstudents"];

                $resourcetype = $row["resourcetype"];
                $numrequired = $row["numrequired"];
            }  
        }
    }
    if($proposeddate!=null)
    {
        $type = "Tutorial Request";
    }
    if($resourcetype!=null)
    {
        $type = "Resource Request";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../assets/img/icon32x32.png">
    <title>View Request</title>
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
                    <div class="sidebar-brand-text mx-3"><span>SchoolHELP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="home-volunteer.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard Volunteer</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="viewrequest.php"><i class="fas fa-user"></i><span>View Request </span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
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
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutmodal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">View request Details</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8 col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!--TUTORIAL REQUEST CARD-->
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Request ID : <?php echo $viewid; ?></p>
                                        </div>
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="mb-3"><label class="form-label"><strong>School Name</strong></label>
                                                        <input class="form-control" type="text" readonly value ="<?php echo $schoolname; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"><strong>Request Date</strong></label>
                                                        <input class="form-control" type="text" readonly value ="<?php echo $requestdate; ?>"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"><strong>Request Type</strong></label>
                                                        <input class="form-control" type="text" readonly value ="<?php echo $type; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"><strong>Description</strong></label>
                                                        <input class="form-control" type="text" readonly value ="<?php echo $description; ?>"></div>
                                                    </div>
                                                </div>
                                                <?php if($type=="Tutorial Request") {?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Proposed Tutorial Date</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $proposeddate; ?>"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Proposed Tutorial Time</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $proposedtime; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Student Level</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $studentlevel; ?>"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Num of Student</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $numstudent; ?>"></div>
                                                        </div>
                                                    </div>
                                                <?php } if($type=="Resource Request") {?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Resource Type</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $resourcetype; ?>"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"><strong>Resource Number</strong></label>
                                                            <input class="form-control" type="text" readonly value ="<?php echo $numrequired; ?>"></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <hr>
                                            </form>
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <a href="viewrequest.php"><button class="btn btn-secondary me-1 mb-1">Back</button></a>
                                                    <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#submit">Submit Offer </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © SCHOOLHELP 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <!--LOG OUT MODAL-->
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
    <!--LOG OUT MODAL END-->

    <!--Submit offer modal-->
    <div class="modal fade" id="submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Offer for Request id<<?php echo $viewid; ?>></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action=action/submitoffer-action.php>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="remarks"><strong>Offer Remarks</strong></label>
                            <input class="form-control" type="text" id="remarks" placeholder="Enter Remarks" name="remarks" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" value="<?php echo $viewid; ?>" name="input">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Submit offer modal end-->

    <script src="../assets/js/modal.js"></script>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/theme.js"></script>

    <script src="../assets/js/jquery-3.6.1.js" type="text/javascript"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/datatables.js"></script>
            
    <script>
        $('#schoolinfotable').dataTable({
            scrollX: true,
        });
    </script>
</body>

</html>
