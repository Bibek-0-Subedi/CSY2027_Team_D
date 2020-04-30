<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Course Detail Form</h2>
        </div>
        <!-- begin Course form -->
        <?php echo form_open('admin/courseDetail/'.$course['course_code'], ['class' => 'pl-sm-2 pr-sm-2 mt-4 row']); ?>
        <div class="form-group col-md-6">
            <label for="CourseCode">Course Code</label>
            <?php if($course['course_code']){?>
                <input type="text" readonly class="form-control" id="inputEmail" value="<?= $course['course_code'] ?>">
            <?php } ?>
            <input type="<?php echo $course['course_code'] ? 'hidden' : 'text';?>" class="form-control  mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name="course_code" value="<?php echo isset($_POST['course_code']) ? $_POST['course_code'] : $course['course_code'] ?>">
            <?= form_error('course_code') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control  <?php echo form_error('course_name') ? 'is-invalid' : '' ?>" name="course_name" value="<?php echo isset($_POST['course_name']) ? $_POST['course_name'] : $course['course_name'] ?>">
            <?= form_error('course_name') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="duration">Duration</label>
            <input type="text" class="form-control  mr-3 <?php echo form_error('course_duration') ? 'is-invalid' : '' ?>" name="course_duration" value="<?php echo isset($_POST['course_duration']) ? $_POST['course_duration'] : $course['course_duration'] ?>">
            <?= form_error('course_duration') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="CourseLeader">Course Leader</label>
            <select class="form-control  mr-3 <?php echo form_error('course_leader') ? 'is-invalid' : '' ?>" name='course_leader'>
                <option value="" <?php if (!isset($_POST['course_leader']) && $course['course_leader'] == "") echo "selected" ?>>Select Course Leader</option>
                <?php foreach($courseLeader as $leader) { ?>
                    <option value="<?= $leader['staff_id'] ?>" <?php if (($course['course_leader']) == $leader['staff_id']){ echo "selected" ;} ?>><?= $leader['firstname'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('course_leader') ?>
            <?php if(!$course['course_code']){?>
            <small class="form-text text-muted">Can Assign the Course Leader Later</small>
            <?php } ?>
        </div>
        <div class="form-group col-md-6">
            <label for="Department">Department</label>
            <select class="form-control mr-3 <?php echo form_error('department_id') ? 'is-invalid' : '' ?>" name='department_id'>
                <option value="" <?php if (!isset($_POST['department']) && $course['department_id'] == "") echo "selected" ?>>Select Department</option>
                <?php foreach($department as $dprt) { ?>
                    <option value="<?= $dprt['department_id'] ?>"<?php if (($course['department_id']) == $dprt['department_id']){ echo "selected" ;} ?>><?= $dprt['name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('department_id') ?>
        </div>
        <div class="form-group col-md-6">
            <small class="text-muted">The course will be added to the courses list after submitting the form.</small>
            <input type="submit" name="add" value="Save Course" class="form-control btn btn-primary mt-2">
        </div>
        </form>
        <!-- end Course form -->
</div>