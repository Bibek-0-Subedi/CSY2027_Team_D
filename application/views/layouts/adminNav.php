<!-- begin nav head -->
<div class="navbar navbar-expand-lg navbar-light adminHead">
    <div>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#nav-linkDropdown" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand d-block bt-border text-black text-center py-2"><img src="<?php echo base_url();?>assets/img/logo-icon.jpg" alt="logoIcon">  Woodlands University College</a>
    </div>
    <div class="logout-link">
        <?php if (($this->session->userdata('type')) == 1) :?>
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
    </div>
</div>
<!-- end nav head -->
<div class="admin-container">
    <!-- begin side bar  -->
    <div class="navbar navbar-expand-lg adminSidebar d-block">
        <div class="collapse navbar-collapse mb-auto adminSidebarTest" id="nav-linkDropdown">
        <ul class="navbar-nav flex-column">
            <?php if ($this->session->userdata('type') == 1){?>
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
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>admin/logout">Logout</a>
                    </li>

                 <!-- begin for tutor as the user -->   
                <?php } elseif(($this->session->userdata('type')) == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>tutor/dashboard">Dashboard</a>
                    </li>  
                     <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>tutor/profile/<?php echo $this->session->userdata('id');?>">Profile</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>tutor/module/">Module</a>
                    </li>  
                     <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="<?= site_url() ?>tutor/student">Student</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link tp-3 mb-2 text-white" href="#">Pat</a>
                    </li>  
                 <!-- end for tutor as the user -->      
                <?php } ?>    
            </ul>
        </div>        
    </div>
    <!-- end side bar  -->
    <!-- begin main content -->
