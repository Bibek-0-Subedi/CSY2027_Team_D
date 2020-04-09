<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Add Assignment</h2>
        <!-- begin Assignment form -->
        <form action="<?= site_url() ?>assignment/add/<?= $assignment['assignment_id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <?php if(!$assignment['assignment_id']){?>
            <input type="<?php echo $assignment['assignment_id'] ? 'hidden' : 'hidden';?>" class="form-control col-sm-2 mr-3 <?php echo form_error('assignment_id') ? 'is-invalid' : '' ?>" name="assignment_id" value="<?php echo isset($_POST['assignment_id']) ? $_POST['assignment_id'] : $assignment['assignment_id'] ?>">
            <?= form_error('assignment_id') ?>
            <?php } ?>
        </div>
         <div class="form-group row">
            <input type="hidden" name="staff_id" value="<?php echo $this->session->userdata('id');?>">
        </div>
        <div class="form-group row">
            <label for="assignment_name" class="col-sm-2">Assignment Name</label>
            <input type="text" class="form-control col-sm-3 mr-2 <?php echo form_error('assignment_name') ? 'is-invalid' : '' ?>" name="assignment_name" value="<?php echo isset($_POST['assignment_name']) ? $_POST['assignment_name'] : $assignment['assignment_name'] ?>">
            <?= form_error('assignment_name') ?>
        </div>
        <div class="form-group row">
            <label for="deadline" class="col-sm-2">Deadline</label>
            <input type="datetime-local" class="form-control col-sm-3 mr-3 <?php echo form_error('deadline') ? 'is-invalid' : '' ?>" name="deadline" value="<?php echo isset($_POST['deadline']) ? $_POST['deadline'] : $assignment['deadline'] ?>">
            <?= form_error('deadline') ?>
        </div>
        <div class="form-group row">
            <label for="module" class="col-sm-2">Module</label>
            <select class="form-control col-sm-3 mr-3 <?php echo form_error('module_code') ? 'is-invalid' : '' ?>" name='module_code'>
                <option value="" disabled <?php if (!isset($_POST['module_code']) && $assignment['module_code'] == "") echo "selected" ?>>Select Module</option>
                <?php foreach($module as $mod) { ?>
                <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('module_code') ?>
        </div>
        <div class="form-group row">
            <label for="Course" class="col-sm-2">Course</label>
            <select class="form-control col-sm-3 mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='course_code'>
                <option value="" disabled <?php if (!isset($_POST['course_code']) && $assignment['course_code'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach($course as $crse) { ?>
                <option value="<?= $crse['course_code'] ?>"><?= $crse['course_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('course_code') ?>
        </div>
        <div class="form-group row mt-2">
            <label for="assignment_file" class="col-sm-2">Upload Assignment Materials</label>
            <input type="file" class="form-control col-sm-3 mr-3" name="files"><br>
            <small class="form-text text-muted">Assignment files for students</small>
        </div>
        <input type="submit" name="upload" value="Upload" class=" btn btn-primary">
        </form>
        <!-- end assignment file form -->
    </div>
</div>




