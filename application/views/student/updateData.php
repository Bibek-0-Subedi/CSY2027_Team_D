<?php if($approval == 0){ ?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Edit Your Information</h2>
        <!-- <small class="md-4"> Your Request Has Been Accepted by Administration! You can now update the data! </small> <br> -->

        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <?php echo form_open(base_url('student/updateData'),['class' => 'pl-sm-2 pr-sm-2 mt-4 row']) ;?>
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
                <label for="Address">Address:</label><input type="text" class="form-control " value="<?php echo $permanent_address; ?>" name="permanent_address">
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
            <input type="hidden" name="admission_id" value="<?php echo $admission_id ?>">
            <input type="hidden" name="student_id" value="<?php echo $student_id ?>">
            <input type="hidden" name="approval" value="<?php echo $approval; ?>">
            <div class="form-group col-md-6">
                <small class="text-muted">Your Request will be sent to Administrator.</small>
                <input type="submit" name="add" value="Request Change" class="form-control btn btn-primary mt-2">
            </div>
        </form>
        <!-- end student add form -->
    </div>
</div>

<?php } else {
    echo '<div class="container">';

    echo " <h5> Your  Request Has Been Sent! </h5>";
    echo '</div>';
} ?>