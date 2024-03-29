<!-- begin nav head -->
<div class="navbar navbar-expand-lg navbar-light adminHead">
    <div>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#nav-linkDropdown" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand d-block bt-border text-black text-center py-2"><img src="<?php echo base_url();?>assets/img/logo-icon.jpg" alt="logoIcon">  Woodlands University College</a>
    </div>
    <div class="logout-link mt-2">
        <?php if (($this->session->userdata('type')) == 1 || $this->session->userdata('type') == 2 || $this->session->userdata('type') == 3 ) :?>
            <h4 class="mr-3 mt-1"><i class="fas fa-user-shield mr-2"></i><?php echo $this->session->userdata('name') . ' '. $this->session->userdata('surname') ;?></h4>
        <?php endif;?>
    </div>
</div>
<!-- end nav head -->
<div class="admin-container">
    <!-- begin side bar  -->
    <div class="navbar navbar-expand-lg adminSidebar d-block">
        <div class="collapse navbar-collapse mb-auto adminSidebarTest" id="nav-linkDropdown">
        <ul class="navbar-nav flex-column">
            <?php if ($this->session->userdata('type') == 1 || $this->session->userdata('type') == 2 ){?>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/dashboard">
                            <span>Dashboard</span>
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/admission">
                            <span>Admission</span>
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/student">
                            <span>Students</span>
                            <i class="fas fa-user-graduate"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/staff">
                            <span>Staff</span>
                            <i class="fas fa-user-tie"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/course">
                        <span>Course</span>
                        <i class="fas fa-book"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/module">
                            <span>Module</span>
                            <i class="fas fa-book-open"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/timeTable">
                            <span>TimeTable</span>
                            <i class="fas fa-calendar"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/announcement">
                            <span>Announcements</span>
                            <i class="fas fa-bullhorn"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/logout">
                            <span>Logout</span>
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>

                 <!-- begin for tutor as the user -->   
                <?php } elseif(($this->session->userdata('type')) == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/dashboard">
                            <span>Dashboard</span>
                            <i class="fas fa-home"></i>
                        </a>
                    </li>  
                     <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/profile">
                            <span>Profile</span>
                            <i class="fas fa-portrait"></i>
                        </a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/modules/">
                            <span>Module</span>
                            <i class="fas fa-book-open"></i>
                        </a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/pat/">
                            <span>PAT</span>
                            <i class="fas fa-chalkboard-teacher"></i>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/diary/">
                            <span>Diary</span>
                            <i class="fas fa-pen-alt"></i>
                        </a>
                    </li>   
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/announcement">
                            <span>Announcements</span>
                            <i class="fas fa-bullhorn"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>tutor/timetable">
                            <span>TimeTable</span>
                            <i class="fas fa-calendar"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-between" href="<?= site_url() ?>admin/logout">
                            <span>Logout</span>
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li> 
                 <!-- end for tutor as the user -->      
                <?php } ?>    
            </ul>
        </div>        
    </div>
    <!-- end side bar  -->
    <!-- begin main content -->
