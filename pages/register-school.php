<?php
session_start();

if($_SESSION['loginas'] != 'administrator') {
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="../assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
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
                                    <th>School Name</th>
                                    <th>City</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                include "connection.php";
                                $query = ("SELECT * FROM `school`");
                                $result = mysqli_query($connect, $query);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
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
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                                type="button" style="margin-bottom: 10px;">Register as
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="active-display">School</a>
                            <a class="dropdown-item" href="#">School Administrator</a>

                        </div>
                    </div>


                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">School Form</p>
                        </div>
                        <div class="card-body"><label class="form-label">School Name</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">School Address</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">City</label>
                            <div class="input-group"><input class="form-control" type="text"></div><button class="btn btn-primary" type="button" style="background: var(--bs-green);margin-top: 20px;">Submit</button>
                        </div>
                    </div>


                    <hr>



                    <div class="card shadow" style="display: none" id="administrator-form">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">School Administrator Form</p>
                        </div>
                        <div class="card-body"><label class="form-label">Username</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">Password</label>
                            <div class="input-group"><input class="form-control" type="password"></div><label class="form-label" style="margin-top: 15px;">Full Name</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">Email</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">Phone</label>
                            <div class="input-group"><input class="form-control" type="number"></div><label class="form-label" style="margin-top: 15px;">Staff ID</label>
                            <div class="input-group"><input class="form-control" type="text"></div><label class="form-label" style="margin-top: 15px;">Position</label>
                            <div class="input-group"><input class="form-control" type="text"></div><button class="btn btn-primary" type="button" style="background: var(--bs-green);margin-top: 20px;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>


    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/theme.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $('#schoolinfotable').dataTable({
            scrollY: 270,
            scrollX: true,
        });
        $('#active-display').click(function (){
            $('#administrator-form').show();
        })
    </script>
</body>

</html>