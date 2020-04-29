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
                            <h5> Name: <?= $student['firstname'].' '.$student['middlename'].' '.$student['surname'] ?></h5>
                            <p> Email: <?= $student['email'] ?></p>
                            <a href="<?= site_url() ?>tutor/module/grade/<?= $student['student_id']?>" class="btn btn-primary pull-right">View Grade Record</a>
                            <a href="<?= site_url() ?>tutor/module/attendance/<?= $student['student_id']?>/<?= $student['module_code']?>" class="btn btn-primary">View Attendance Record</a>
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


       
