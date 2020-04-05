<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Module Detail Form</h2>
        <!-- begin Course form -->
        <?php echo form_open('admin/moduleDetail/'.$module['module_code'], ['class' => 'pl-sm-2 pr-sm-2 mt-4']); ?>
        <div class="form-group row">
            <?php if(!$module['module_code']){?>
            <label for="ModuleCode" class="col-sm-2">Module Code</label>
            <?php } ?>
            <input type="<?php echo $module['module_code'] ? 'hidden' : 'text';?>" class="form-control col-sm-2 mr-3 <?php echo form_error('module_code') ? 'is-invalid' : '' ?>" name="module_code" value="<?php echo isset($_POST['module_code']) ? $_POST['module_code'] : $module['module_code'] ?>">
            <?= form_error('module_code') ?>
        </div>
        <div class="form-group row">
            <label for="module_name" class="col-sm-2">Module Name</label>
            <input type="text" class="form-control col-sm-2 mr-2 <?php echo form_error('module_name') ? 'is-invalid' : '' ?>" name="module_name" value="<?php echo isset($_POST['module_name']) ? $_POST['module_name'] : $module['module_name'] ?>">
            <?= form_error('module_name') ?>
        </div>
        <div class="form-group row">
            <label for="duration" class="col-sm-2">Duration</label>
            <input type="text" class="form-control col-sm-2 mr-3 <?php echo form_error('module_duration') ? 'is-invalid' : '' ?>" name="module_duration" value="<?php echo isset($_POST['module_duration']) ? $_POST['module_duration'] : $module['module_duration'] ?>">
            <?= form_error('module_duration') ?>
        </div>
        <div class="form-group row">
            <label for="Course" class="col-sm-2">Course</label>
            <select class="form-control col-sm-2 mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='course_code'>
                <option value="" disabled <?php if (!isset($_POST['course_code']) && $module['course_code'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach($course as $crse) { ?>
                <option value="<?= $crse['course_code'] ?>"><?= $crse['course_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('course_code') ?>
        </div>
        <input type="submit" name="add" value="Save" class=" btn btn-primary">
        </form>
        <!-- end Course form -->
    </div>
</div>