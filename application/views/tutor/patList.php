<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h4> PAT Session Student List</h4>
        </div>
        <?php
            if (!empty($this->session->flashdata('added'))) { ?>
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $this->session->flashdata('added'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('edited'))) {?> 
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $this->session->flashdata('edited'); ?>
            </div>
        <?php }?>
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($students as $student) { ?>
                            <div class="card">
                                <div class="card-body">
                                <!-- <a> Description: </a><br> -->
                                <a href="<?= site_url() ?>tutor/pat/view/<?= $student['student_id']?>" class="mt-2"><?= $student['firstname'] . ' ' . $student['middlename'] . ' ' . $student['surname']?></a><br>
                               <?php if($student['pat_request'] == 1){ ?>
                                <a class="pull-right text-danger ">Requested for the PAT Session!</a> 
                                <?php } ?>
                            </div>
                        </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php }

else {
    redirect('admin/login');
}?>


       
