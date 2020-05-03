<?php if(($this->session->userdata('type')) == 3) {?>
    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Attendances</h2>
        </div>
    <div class="row">
        <h5 class="col-md-5">Date: <?= $this->uri->segment(5); ?></h5>
        <div class="col-md-6">
            <h5>Select Date: </h5>
            <input type="date" class="form-control mt-2"  min='<?= date('Y') ?>-01-01' max='<?= date('Y') ?>-12-31' id="attendanceDate" value="<?= $this->uri->segment(5) ?>" data-location="<?php echo site_url().'tutor/module/takeAttendance/'.$this->uri->segment(4).'/'?>" onchange="location = this.dataset.location+this.value;">
        </div>
    </div>
    <ul class="list-group mt-5">

    <?php 
    foreach ($students as $student) { 
        $status = -1;
        foreach ($attendance as $attend) {
            if($attend['assigned_id'] == $student['assigned_id']){
                $status = $attend['status'];
            }
        }  
    ?>
        <li class="list-group-item d-flex justify-content-between">
            <h5 class="my-1"><?= $student['firstname']." ".$student['surname'] ?></h5>
            <div class="form-group pull right my-1">
                <form class="attendance-form" action="<?php echo site_url();?>tutor/module/addAttendance" method="POST">
                    <input type="hidden" name="module_code" value="<?= $student['module_code'] ?>">
                    <input type="hidden" name="assigned_id" value="<?= $student['assigned_id'] ?>">
                    <input type="hidden" name="staff_id" value="<?= $this->session->userdata('id') ?>">
                    <input type="hidden" name="date" value="<?= $this->uri->segment(5) ?>">
                    <?php 
                        $present = $absent = $noInfo = '';
                        if($status == 2){
                            $present = 'checked';
                        }else if($status == 1){
                            $absent = 'checked';
                        }else if($status == 0){
                            $noInfo = 'checked';
                        }
                    ?>
                    <!-- <label class="mr-3">
                        <input type="radio" class="attendBtn mr-1" name="status" value='1' <?= $present ?>> Present
                    </label>
                    <label class="mr-3">
                        <input type="radio" class="attendBtn mr-1" name="status" value='0' <?= $absent ?>> Absent
                    </label> -->

                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" value='2' class="attendBtn custom-control-input" <?= $present ?>>
                        <div class="custom-control-label"><i class="fa fa-circle-o"></i></div>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" value='1' class="attendBtn custom-control-input" <?= $absent ?>>
                        <div class="custom-control-label"><i class="fas fa-font"></i></div>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="status" value='0' class="attendBtn custom-control-input" <?= $noInfo ?>>
                        <div class="custom-control-label"><i class="fas fa-times"></i></div>
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