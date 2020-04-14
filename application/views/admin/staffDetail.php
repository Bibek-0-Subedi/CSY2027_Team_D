<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Staff Detail Form</h2>
        <!-- begin Staff add form -->
        <?php echo form_open('admin/staffDetail/'.$staff['staff_id'], ['class' => 'pl-sm-2 pr-sm-2 mt-4']); ?>
            <div class="form-group row">
                <?php if(!$staff['staff_id']){?>
                <label for="staffId" class="col-sm-2">Staff Id</label>
                 <?php } ?>
                <input type="<?php echo $staff['staff_id'] ? 'hidden' : 'text';?>" class="form-control col-sm-1 mr-3 <?php echo form_error('staff_id') ? 'is-invalid' : '' ?>" name="staff_id" value="<?php echo isset($_POST['staff_id']) ? $_POST['staff_id'] : $staff['staff_id'] ?>">
                <?= form_error('staff_id') ?>
            </div>
        <div class="form-group row">
            <label for="Status" class="col-sm-2">Status</label>
            <select class="form-control col-sm-1 mr-3 <?php echo form_error('status') ? 'is-invalid' : '' ?>" name='status'>
                <option value="" disabled <?php if ( $status == "3") echo "selected" ?>>Choose</option>
                <option value="1" <?php if ((isset($_POST['status']) == 1) || $staff['status'] == "1") echo "selected" ?>>Active</option>
                <option value="0" <?php if ((isset($_POST['status']) == 0) && $staff['status'] == "0") echo "selected" ?>>Dormant</option>
            </select>
            <?= form_error('status') ?>
        </div>
        <div class="form-group row">
            <label for="firstname" class="col-sm-2">Firstname</label>
            <input type="text" class="form-control col-sm-2 mr-3 <?php echo form_error('firstname') ? 'is-invalid' : '' ?>" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : $staff['firstname'] ?>">
            <?= form_error('firstname') ?>
        </div>
        <div class="form-group row">
            <label for="Middlename" class="col-sm-2">Middlename</label>
            <input type="text" class="form-control col-sm-2 " name="middlename" value="<?php echo isset($_POST['middlename']) ? $_POST['middlename'] : '' ?>">
            <?= form_error('MiddleName') ?>
        </div>
        <div class="form-group row">
            <label for="Surname" class="col-sm-2">Surname</label>
            <input type="text" class="form-control col-sm-2 mr-3 <?php echo form_error('surname') ? 'is-invalid' : '' ?>" name="surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : $staff['surname'] ?>">
            <?= form_error('surname') ?>
        </div>
        <div class="form-group row">
            <label for="Address" class="col-sm-2">Address</label>
            <input type="text" class="form-control col-sm-3 mr-3 <?php echo form_error('address') ? 'is-invalid' : '' ?>" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $staff['address'] ?>">
            <?= form_error('address') ?>
        </div>
        <div class="form-group row">
            <label for="Contact" class="col-sm-2">Contact Number</label>
            <input type="text" class="form-control col-sm-3 mr-3 <?php echo form_error('contact') ? 'is-invalid' : '' ?>" name="contact" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : $staff['contact'] ?>">
            <?= form_error('contact') ?>
        </div>
        <div class="form-group row">
            <label for="Email" class="col-sm-2">Email</label>
            <input type="text" class="form-control col-sm-3 mr-3 <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $staff['email'] ?>">
            <?= form_error('email') ?>
        </div>

        <div class="form-group row">
            <?php if (!$staff['password']) { ?>
            <label for="Password" class="col-sm-2">Password</label>
            <?php } ?>
            <input type="<?php echo $staff['staff_id'] ? 'hidden' : 'text';?>" class="form-control col-sm-3 mr-3 <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : $staff['password'] ?>">
            <?= form_error('password') ?>
        </div>
        <!-- Select Course for the staff  -->
        <div class="form-group row">
            <label for="Subject" class="col-sm-2">Subject</label>
            <select class="form-control col-sm-2 mr-3 <?php echo form_error('subject') ? 'is-invalid' : '' ?>" name='subject'>
                <option value=""  <?php if (!isset($_POST['subject']) && $staff['subject'] == "") echo "selected" ?>>Select Course</option>
                <?php foreach($courses as $course) { ?>
                    <option value="<?= $course['course_code'] ?>"<?php if ((isset($_POST['course_code'])) == $course['course_code']){ echo "selected" ;} ?>><?= $course['course_name'] ?></option>
            <?php } ?>
            </select>
            <?= form_error('subject') ?>
            <?php if(!$staff['staff_id']){?>
            <small class="form-text text-muted">Can Assign the Course to staff Later</small>
            <?php } ?>
        </div>
        <!-- end of select of course for the staff -->
        <!-- Select Will be used for  -->
        <div class="form-group row">
            <label for="Role" class="col-sm-2">Role</label>
            <select class="form-control col-sm-2 mr-3 <?php echo form_error('role') ? 'is-invalid' : '' ?>" name='role'>
                <option value="" disabled <?php if (!isset($_POST['role']) && $staff['role'] == "") echo "selected" ?>>Select Staff Type</option>
                <option value="1" <?php if ((isset($_POST['role']) == 1) || $staff['role'] == "1") echo "selected" ?>>Admin</option>
                <option value="2" <?php if ((isset($_POST['role'])== 2) || $staff['role'] == "2") echo "selected" ?>>Course Leader</option>
                <option value="3" <?php if ((isset($_POST['role']) == 3) || $staff['role'] == "3") echo "selected" ?>>Tutor</option>
            </select>
            <?= form_error('role') ?>
        </div>
        <input type="submit" name="add" value="Save" class=" btn btn-primary">
        </form>
        <!-- end Staff add form -->
    </div>
</div>