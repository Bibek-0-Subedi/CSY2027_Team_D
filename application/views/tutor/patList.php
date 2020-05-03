<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Pat Session Student</h2>
        </div>
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

<?php }

else {
    redirect('admin/login');
}?>


       
