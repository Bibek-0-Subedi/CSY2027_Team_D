<?php
    include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Woodland University College</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#nav-linkDropdown" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-linkDropdown">
                <div class="container-fluid">
                    <!-- begin sidebar -->
                    <div class="col-lg-2 fixed-top adminSidebar">
                        <a href="#" class="navbar-brand d-block bt-border text-white text-center py-2">Woodlands University College</a>
                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item ">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminDash.php"><i class="fas fa-home"></i> Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminAdmission.php"> <i class="fas fa-user"></i> Admission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminStudent.php"> <i class="fas fa-user"></i> Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminStaff.php"> <i class="fas fa-users"></i> Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminCourse.php"> <i class="fas fa-book"></i> Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tp-3 mb-2 text-white" href="adminModule.php"> <i class="fas fa-book-open"></i> Module</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar -->
                </div>
            </div>
    </nav>
<div class="col-lg-10 fixed-top ml-auto">
    <!-- begin top admin-navbar -->
    <div class="row adminHead py-2" >
        <div class="col-lg-10">
                <h4>Admin Dashboard</h4>
        </div>
        <div class="col-lg-2 ml-auto pr-sm-3">
            <?php
                if(isset($_SESSION['adminSessionId'])){
                    $adminStaff = new Databasetable('staff');
                    $admin = $adminStaff->find('staff_id',$_SESSION['adminSessionId']);
                    $adminName = $admin->fetch(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4><?php echo $adminName['firstname']?></h4>      
                        </div>
                        <div class="col-lg-6">
                            <h4><a href="logout.php">Logout</a></h4>    
                        </div>
                    </div>
            <?php    } 
            ?>
        </div>
    </div>
    <!-- end top admin-navbar -->