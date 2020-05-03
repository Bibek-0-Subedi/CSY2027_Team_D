<div class="timebar">
    <div>
        <p class="pt-2 m-0 ml-3 text-white"><?= date("d").'th '.date("M Y") ?></p>
    </div>
    <div class="logout-link">
        <form class="form layout-search ">
            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search">
            <button class="btn" type="submit"><i class="fa fa-search" style="font-size: 20px; color: #8AC6B7"></i></button>
        </form>            
    </div>
</div>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8AC6B7;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/Logo.jpg" class="img-fluid" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-linkDropdown" aria-label="Toggle navigation " aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-linkDropdown">
            <ul class="navbar-nav ml-auto">
                <?php if ($this->session->userdata('student_logged')){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>student/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>student/modules">Modules</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>student/grades">Grades</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>student/diary">Diary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>student/logout">Logout</a>
                    </li>  
                <?php } elseif(($this->session->userdata('type') == 2)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Leader</a>
                    </li>
                <?php } elseif(($this->session->userdata('type')) == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>tutor/dashboard">Dashboard</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>tutor/module">Module</a>
                    </li>  
                     <li class="nav-item">
                        <a class="nav-link" href="#">Student</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pat</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>assignment/index">Assignment</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="attendance">Attendance</a>
                    </li>    
                <?php } else { ?>    
                <!-- begin for guest user -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="nav-linkDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                        </a>
                        <div class="dropdown-menu" aria-labelledby="nav-linkDropdownMenu">
                            <a class="dropdown-item" href="#">Software Engineering</a>
                            <a class="dropdown-item" href="#">Network Engineering</a>
                            <a class="dropdown-item" href="#">Business Administration</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>support">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>about">About Us</a>
                    </li>
                <!-- end for guest user -->                                                      
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
