<?php if(($this->session->userdata('type')) == 3) {?>
<div class="container mt-5">
    <h2>Attendances</h2>
    <h5>Date: <?= $this->uri->segment(4); ?></h5>
    <ul class="list-group mt-5">
    
    <?php 
    foreach ($students as $student) { 
        $status = -1;
        foreach ($attendance as $attend) {
            if($attend['student_id'] == $student['student_id']){
                $status = $attend['status'];
            }
        }  
    ?>
        <li class="list-group-item d-flex justify-content-between">
            <h4 class="mb-0"><?= $student['firstname'] ?></h4>
            <div class="form-group pull right">
                <form class="attendance-form" action="<?php echo site_url();?>module/addAttendance" method="POST">
                    <input type="hidden" name="module_code" value="<?= $student['module_code'] ?>">
                    <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">
                    <input type="hidden" name="staff_id" value="<?= $this->session->userdata('id') ?>">
                    <input type="hidden" name="date" value="<?= $this->uri->segment(4) ?>">
                    <?php 
                        $present = $absent = '';
                        if($status == 1){
                            $present = 'checked';
                        }else if($status == 0){
                            $absent = 'checked';
                        }
                    ?>
                    <label class="mr-3">
                        <input type="radio" class="attendBtn mr-1" name="status" value='1' <?= $present ?>> Present
                    </label>
                    <label class="mr-3">
                        <input type="radio" class="attendBtn mr-1" name="status" value='0' <?= $absent ?>> Absent
                    </label>
                </form>
            </div>
        </li>
    <?php } ?>
    
    </ul>
</div>

<?php }

else {
    redirect('admin/login');
}?>