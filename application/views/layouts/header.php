<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <script src="<?= base_url() ?>assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-light adminHead">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#nav-linkDropdown" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand d-block bt-border text-black text-center py-2"><img src="<?= base_url() ?>assets/img/logo-icon.jpg" alt="logoIcon">  Woodlands University College</a>
        <?php
            if(isset($_SESSION['adminSessionId'])){
                $adminStaff = new Databasetable('staff');
                $admin = $adminStaff->find('staff_id',$_SESSION['adminSessionId']);
                $adminName = $admin->fetch(); ?>
                <div class="row ml-auto mr-3">
                    <div class="col-lg-6">
                        <h5><?php echo $adminName['firstname']?></h5>      
                    </div>
                    <div class="col-lg-6">
                        <h5><a href="logout.php" style="color:black; text-decoration:none;">Logout</a></h5>    
                    </div>
                </div>
        <?php    } 
        ?>
    </div>
    <!-- end nav head -->
    <div class="admin-container">
        <!-- begin side bar  -->
        <div class="navbar navbar-expand-lg adminSidebar d-block">
            <div class="collapse navbar-collapse mb-auto adminSidebarTest" id="nav-linkDropdown">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/admission">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/student"></i> Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/staff">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/course">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/module">Module</a>
                    </li>
                </ul>
            </div>        
        </div>
    <!-- <div class="container"> -->