<div class="timebar">
    <div>
        <h4>Current Date</h4>
    </div>
    <div class="logout-link">
        <?php if ($this->session->userdata('student_logged')) :?>
            <h4><?php echo $this->session->userdata('name') ;?></h4>
            <form class="form layout-search" method="post" action="<?php echo base_url();?>student/logout">
                <button class="btn" type="submit"><i class="fa fa-power-off" style="font-size: 20px; color: red"></i></button>
            </form>                                            
        <?php endif;?>
        <?php if (($this->session->userdata('type')) == 2) :?>
            <h3><?php echo $this->session->userdata('name') ;?></h3>
            <form class="form layout-search" method="post" action="<?php echo base_url();?>admin/logout">
                <button class="btn" type="submit"><i class="fa fa-power-off" style="font-size: 20px; color: red"></i></button>
            </form>                                            
        <?php endif;?>
        <?php if (($this->session->userdata('type')) == 3) :?>
            <h3><?php echo $this->session->userdata('name') ;?></h3>
            <form class="form layout-search" method="post" action="<?php echo base_url();?>admin/logout">
                <button class="btn" type="submit"><i class="fa fa-power-off" style="font-size: 20px; color: red"></i></button>
            </form>                                            
        <?php endif;?>
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
                        <a class="nav-link" href="#">Module</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Assignment</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Grade</a>
                    </li>  
                <?php } elseif(($this->session->userdata('type') == 2)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Leader</a>
                    </li>
                <?php } elseif(($this->session->userdata('type')) == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>tutor/dashboard">Tutor Dashboard</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>tutor/module/<?php echo $this->session->userdata('id');?>">Module</a>
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
                        <a class="nav-link" href="#">Attendance</a>
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
