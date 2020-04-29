<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Student Record</h2>
        </div>
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($students as $student) { ?>
                            <div class="card">
                                <div class="card-body">
                                <a> Name: <?= $student['firstname'] ?></a>
                                <a> <?= $student['middlename'] ?></a>
                                <a><?= $student['surname'] ?></a>
                                <br><a> Email: <?= $student['email'] ?></a><br><br>
                                <a href="<?= site_url() ?>tutor/module/grade/<?= $module_id?>/<?= $student['student_id']?>" class="btn btn-primary pull-right">View Grade Record</a>
                                <a href="<?= site_url() ?>tutor/module/attendance/<?= $student['student_id']?>/<?= $student['module_code']?>" class="btn btn-primary ">View Attendance Record</a>
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


       
