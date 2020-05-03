<div class="container mt-5">
<h2 class="mb-5"><?= $module['module_name']; ?> Module Attendance</h2>
<h5 class="mb-3"><?= $student['firstname'].' '.$student['surname']; ?></h5>
<a href="<?= site_url().'tutor/lowAttendance/'.$student['student_id'].'/'.$module['module_code'] ?>" class="btn btn-primary col-md-3 my-3">Send Low attendance Email</a>
<div class="list-group">
    <?php foreach ($attendances as $attendance) { ?>
        <li class="list-group-item d-flex justify-content-between">
            <h5 class="mt-2">
                <?php
                    $date = date_create($attendance['date']);
                    echo date_format($date,"dS F Y");
                ?>
            </h5>
            <?php 
                if($attendance['status'] == 2){
                    $status = '<i class="fas fa-check-circle text-primary"></i>';
                }else if($attendance['status'] == 1){
                    $status = '<i class="fas fa-times-circle text-secondary"></i>';
                }else if($attendance['status'] == 0){
                    $status = '<i class="fas fa-times-circle text-danger"></i>';
                }
            ?>
            <div style="font-size:28px;"><?= $status ?></div>
        </li>
        
    <?php } ?>
        <?php if(count($attendances) == 0){ ?>
            <h5>No Attendance to Show</h5>
        <?php } ?>
        
    </div>

</div>