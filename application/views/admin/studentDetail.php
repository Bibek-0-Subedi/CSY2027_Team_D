<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Student Detail Form</h2>
        </div>
        <!-- begin student add form -->
        <?php echo form_open('admin/studentDetail/' . $student['student_id'], ['class' => 'pl-sm-2 pr-sm-2 mt-4 row']) ;?>
        <?php if(isset($_GET['type']) && ($_GET['type'] == 'request') && $student['approval'] == 1){ ?>
            <div class="bg-light rounded p-2 mb-3 col-md-12">
                <p>This change was requested by <?= $student['firstname'].' '.$student['surname'] ?></p>
                <p><?= $student['changes'] ?></p>
            </div>
            <input type="hidden" name="changeApproved" value="1">
            <?php } ?>
            <div class="form-group col-md-6">
                <label for="Student ID">Student Id</label>
                <?php if($student['student_id']){?>
                    <input type="text" readonly class="form-control" value="<?= $student['student_id'] ?>">
                 <?php } ?>
            </div>
            <div class="form-group col-md-6">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control  <?php echo form_error('firstname') ? 'is-invalid' : '' ?>" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : $student['firstname']?>">
                <?= form_error('firstname') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="Middlename">Middlename</label>
                <input type="text" class="form-control <?php echo form_error('middlename') ? 'is-invalid' : '' ?>" name="middlename" value="<?php echo isset($_POST['middlename']) ? $_POST['middlename'] :  $student['middlename']?>">
                <?= form_error('middlename') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="Surname">Surname</label>
                <input type="text" class="form-control <?php echo form_error('surname') ? 'is-invalid' : '' ?>" name="surname" value=" <?php echo isset($_POST['surname']) ? $_POST['surname'] : $student['surname']?>">
                <?= form_error('surname') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="TemporaryAddress">Temporary Address</label>
                <input type="text" class="form-control <?php echo form_error('tempAddress') ? 'is-invalid' : '' ?>" name="tempAddress" value="<?php echo isset($_POST['tempAddress']) ? $_POST['tempAddress'] : $student['temporary_address']?>">
                <?= form_error('tempAddress') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="PermanentAddress">Permanent Address</label>
                <input type="text" class="form-control <?php echo form_error('permAddress') ? 'is-invalid' : '' ?>" name="permAddress" value="<?php echo isset($_POST['permAddress']) ? $_POST['permAddress'] : $student['permanent_address']?>">
                <?= form_error('permAddress') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="Contact">Contact Number</label>
                <input type="text" class="form-control <?php echo form_error('contact') ? 'is-invalid' : '' ?>" name="contact" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : $student['contact']?>">
                <?= form_error('contact') ?>
            </div>
            <div class="form-group col-md-6">
                <label for="Email">Email</label>
                <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $student['email']?>">
                <?= form_error('email') ?>
            </div>
            <div class="form-group col-md-6">
            <label for="Password">Password</label>
            <input type="text" class="form-control mr-3 <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <?= form_error('password') ?>
            </div>
            
            <div class="form-group col-md-6">
                <label for="Qualification">Qualification</label>
                <input type="text" class="form-control <?php echo form_error('qualification') ? 'is-invalid' : '' ?>" name="qualification" value=" <?php echo isset($_POST['qualification']) ? $_POST['qualification'] : $student['qualification']?>">
                <?= form_error('qualification') ?>
            </div>
            <!-- Select Will be used for  -->
            <div class="form-group col-md-6">
                <label for="CourseCode">Course Code</label>
                <select class="form-control  mr-3 <?php echo form_error('subject') ? 'is-invalid' : '' ?>" name='courseCode'>
                <option value=""  <?php if (!isset($_POST['course_code']) && $student['course_code'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach($courses as $course) { ?>
                    <option value="<?= $course['course_code'] ?>"<?php if ((isset($_POST['course_code'])) || ($course['course_code'] == $student['course_code'])){ echo "selected" ;} ?>><?= $course['course_name'] ?></option>
            <?php } ?>
            </select>
                <?= form_error('course_code') ?>
            </div>
            <div class="form-group col-md-6">
                <small class="text-muted">The student will be added to the admission list after submitting the form.</small>
                <input type="submit" name="add" value="Save" class="form-control btn btn-primary mt-2">
            </div>
        </form>
        <!-- end student add form -->
</div>