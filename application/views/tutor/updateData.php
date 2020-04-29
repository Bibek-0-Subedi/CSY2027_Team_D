<?php if(($this->session->userdata('type')) == 3) {?>

<?php if($approval == 0){ ?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Edit your Information</h2>
        </div>
    <small class="md-4"> Your Request Has Been Accepted by Administration! You can now update the data! </small> <br>

    <?php echo validation_errors(); ?>
    <!-- begin student add form -->
    <?php echo form_open(base_url('tutor/updateData'),['class' => 'pl-sm-2 pr-sm-2 mt-4 row']) ;?>
        <div class="form-group col-md-6">
            <label for="firstname">Firstname:</label><input type="text" class="form-control " value="<?php echo $firstname; ?>" name="firstname">
        </div>
        <div class="form-group col-md-6">
            <label for="Middlename">Middlename:</label><input type="text" class="form-control " value="<?php echo $middlename; ?>" name="middlename">
        </div>
        <div class="form-group col-md-6">
            <label for="Surname">Surname:</label><input type="text" class="form-control " value="<?php echo $surname; ?>" name="surname">
        </div>
        <div class="form-group col-md-6">
            <label for="Address">Address:</label><input type="text" class="form-control " value="<?php echo $address; ?>" name="address">
        </div>
        <div class="form-group col-md-6">
            <label for="Contact">Contact Number:</label><input type="text" class="form-control " value="<?php echo $contact; ?>" name="contact">
        </div>
        <div class="form-group col-md-6">
            <label for="Email">Email:</label><input type="text" class="form-control " value="<?php echo $email; ?>" name="email">
        </div>
        <div class="form-group col-md-6">
            <label for="Password">Password:</label><input type="text" class="form-control " name="password">
        </div>
        <div class="form-group col-md-6">
            <label for="Subject">Subject:</label>
            <select name="subject" id="" class="form-control ">
                <?php foreach ($courses as $course) {?>
                    <option value="<?= $course['course_code'] ?>"<?php if ((isset($_POST['course_code'])) || ($course['course_code'] == $subject)){ echo "selected" ;} ?>><?= $course['course_name'] ?></option>
                <?php } ?>
            </select>
        </div>
            <input type="hidden" name="staff_id" value="<?php echo $staff_id ?>">
            <input type="hidden" name="approval" value="<?php echo $approval; ?>">
        <div class="form-group col-md-6">
            <small class="text-muted">Your Request will be sent to Administrator.</small>
            <input type="submit" name="add" value="Request Change" class="form-control btn btn-primary mt-2">
        </div>
    </form>
        <!-- end student add form -->
</div>

<?php } else {
    echo '<div class="container">';

    echo " <h5> Your  Request Has Been Sent! </h5>";
    echo '</div>';
} ?>

<?php }

else {
    redirect('admin/login');
}?>