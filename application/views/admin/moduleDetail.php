<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Module Detail Form</h2>
        <!-- begin Course form -->
        <?php echo form_open('admin/moduleDetail/' . $module['module_code'], ['class' => 'pl-sm-2 pr-sm-2 mt-4 row']); ?>
        <div class="form-group col-md-6">
            <label for="ModuleCode">Module Code</label>
            <?php if ($module['module_code']) { ?>
                <input type="text" readonly class="form-control" id="inputEmail" value="<?= $module['module_code'] ?>">
            <?php } ?>
            <input type="<?php echo $module['module_code'] ? 'hidden' : 'text'; ?>" class="form-control  mr-3 <?php echo form_error('module_code') ? 'is-invalid' : '' ?>" name="module_code" value="<?php echo isset($_POST['module_code']) ? $_POST['module_code'] : $module['module_code'] ?>">
            <?= form_error('module_code') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="module_name">Module Name</label>
            <input type="text" class="form-control  mr-2 <?php echo form_error('module_name') ? 'is-invalid' : '' ?>" name="module_name" value="<?php echo isset($_POST['module_name']) ? $_POST['module_name'] : $module['module_name'] ?>">
            <?= form_error('module_name') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="duration">Duration</label>
            <input type="text" class="form-control  mr-3 <?php echo form_error('module_duration') ? 'is-invalid' : '' ?>" name="module_duration" value="<?php echo isset($_POST['module_duration']) ? $_POST['module_duration'] : $module['module_duration'] ?>">
            <?= form_error('module_duration') ?>
        </div>
        <?php if ($module['module_code']) { ?>
            <div class="form-group col-md-6">
                <label for="Module Leader">Module Leader</label>
                <select class="form-control  mr-3 <?php echo form_error('module_leader') ? 'is-invalid' : '' ?>" name='module_leader'>
                    <option value="" <?php if (!isset($_POST['module_leader']) && $module['module_leader'] == "") echo "selected" ?>>Select Module Leader</option>
                    <?php foreach ($moduleLeader as $leader) { ?>
                        <option value="<?= $leader['staff_id'] ?>" <?php if (($module['module_leader']) == $leader['staff_id']) { echo "selected"; } ?>><?= $leader['firstname'] ?></option>
                    <?php } ?>
                </select>
                <?= form_error('module_leader') ?>
            </div>
        <?php } ?>
        <div class="form-group col-md-6">
            <label for="Course">Course</label>
            <select class="form-control  mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='course_code'>
                <option value="" disabled <?php if (!isset($_POST['course_code']) && $module['course_code'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach ($course as $crse) { ?>
                    <option value="<?= $crse['course_code'] ?>"><?= $crse['course_name'] ?></option>
                <?php } ?>
            </select>
            <?= form_error('course_code') ?>
        </div>
        <div class="form-group col-md-6">
            <small class="text-muted">The module will be added to the modules list after submitting the form.</small>
            <input type="submit" name="add" value="Add Module" class="form-control btn btn-primary mt-2">
        </div>
        </form>
        <!-- end Course form -->
    </div>
</div>