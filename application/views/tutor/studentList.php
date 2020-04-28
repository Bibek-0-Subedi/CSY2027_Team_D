<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h2> Student Record </h2>
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
                                <a href="<?= site_url() ?>tutor/module/grade/<?= $module_id?>/<?= $student['student_id']?>" class="pull-right">View Grade Record</a>
                                <a href="<?= site_url() ?>tutor/module/attendance/<?= $student['student_id']?>" class="">View Attendance Record</a>
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


       
