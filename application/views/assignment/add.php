<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <?php if(!$assignment['assignment_id']){?>
    <h2 class="bg-content"> Add Assignment</h2>
    <?php } else { ?>
    <h2 class="bg-content"> Edit Assignment</h2>
    <?php }?>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>assignment/add/<?= $assignment['assignment_id'] ?>" method="POST" enctype="multipart/form-data">    

         <div class="form-group col-md-4">
            <label for="assignment_name" class="ml-3">Assignment Name</label>
            <input type="text" class="form-control col-sm-8 mr-3 <?php echo form_error('assignment_name') ? 'is-invalid' : '' ?>" name="assignment_name" value="<?php echo isset($_POST['assignment_name']) ? $_POST['assignment_name'] : $assignment['assignment_name'] ?>">
            <?= form_error('assignment_name') ?>
        </div>
         <div class="form-group col-md-4">
            <label for="deadline" class="col-sm-2">Deadline</label>
            <input type="datetime-local" class="form-control col-sm-8 mr-3 <?php echo form_error('deadline') ? 'is-invalid' : '' ?>" name="deadline" value="<?php echo isset($_POST['deadline']) ? $_POST['deadline'] : $assignment['deadline'] ?>">
            <?= form_error('deadline') ?>
        </div>
        <div class="form-group col-md-4">
            <label for="module" class="col-sm-2">Module</label>
            <select class="form-control col-sm-5 mr-3 <?php echo form_error('module_code') ? 'is-invalid' : '' ?>" name='module_code'>
                <option value="" disabled <?php if (!isset($_POST['module_code']) && $assignment['module_code'] == "") echo "selected" ?>>Select Module</option>
                <?php foreach($module as $mod) { ?>
                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('module_code') ?>
        </div>
        <div class="form-group col-md-4">
            <label for="Course" class="col-sm-2">Course</label>
            <select class="form-control col-sm-5 mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='course_code'>
                <option value="" disabled <?php if (!isset($_POST['course_code']) && $assignment['course_id'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach($course as $crse) { ?>
                <option value="<?= $crse['course_code'] ?>"><?= $crse['course_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('course_code') ?>
        </div>
        <div class="form-group col-md-4">
            <label>Upload Materials Here: </label>
            <input type="file" class="form-control-file" name="file">
            <small class="form-text text-muted">Assignment files for students</small>
        </div>
        <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="assignment_id" value="<?= $assignment['assignment_id']?>">
             <input type="hidden" name="staff_id" value="<?php echo $this->session->userdata('id');?>">
        </div>

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>
</div>
<?php }

else {
    echo "not a tutor should redirect using redirect function";
}?> 











