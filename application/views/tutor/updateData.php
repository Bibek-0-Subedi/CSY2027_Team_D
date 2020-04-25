<?php if(($this->session->userdata('type')) == 3) {?>

<?php if($this->session->userdata('approval') == 0){ ?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Edit Your Information</h2>
        <small class="md-4"> Your Request Has Been Accepted by Administration! You can now update the data! </small> <br>

        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <?php echo form_open(base_url('tutor/updateData/' . $id )) ;?>
            <div class="form-group row">
                <label for="firstname" class="col-sm-2">Firstname:</label><input type="text" class="form-control col-sm-2" value="<?php echo $this->session->userdata('name')?>" name="firstname">
            </div>
            <div class="form-group row">
                <label for="Middlename" class="col-sm-2">Middlename:</label><input type="text" class="form-control col-sm-2" value="<?php echo $this->session->userdata('middlename')?>" name="middlename">
            </div>
            <div class="form-group row">
                <label for="Surname" class="col-sm-2">Surname:</label><input type="text" class="form-control col-sm-2" value="<?php echo $this->session->userdata('surname')?>" name="surname">
            </div>
            <div class="form-group row">
                <label for="Address" class="col-sm-2">Address:</label><input type="text" class="form-control col-sm-2" value="<?php echo $this->session->userdata('address')?>" name="address">
            </div>
            <div class="form-group row">
                <label for="Contact" class="col-sm-2">Contact Number:</label><input type="text" class="form-control col-sm-2" value="<?php echo $this->session->userdata('contact')?>" name="contact">
            </div>
             <input type="hidden" name="staff_id" value="<?php echo $this->session->userdata('id'); ?>">
              <input type="hidden" name="approval" value="<?php echo $this->session->userdata('approval'); ?>">

            <input type="submit" name="add" class=" btn btn-primary">
        </form>
        <!-- end student add form -->
    </div>
</div>

<?php } else {

    echo "Since Email should be sent from the website to the administrator holding the required data..email format should be here..after admin approves the required data after reviewing valid record in the email..form to update data appears here.. (when the approval is set to 0) <br>";

    echo "Send Your Data via Email For the Validation";

    echo "<br> Email Pattern Here <br> ";

    echo " -- Your  Request Has Been Sent! ";

} ?>

<?php }

else {
    redirect('admin/login');
}?>