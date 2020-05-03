<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Enter PAT Information</h2>
        </div>
 			<?php echo validation_errors(); ?>
			<?php echo form_open('tutor/pat/add/'.$student_id); ?>
 		<div class="form-group col-md-6">
 			<label for="information" class="mr-3 mt-4">Personal Tutor Information </label>
  			<textarea name="information" class="md-textarea form-control" rows="10"></textarea>
		</div>
 		<div class="form-group col-md-4">
              <small class="text-muted">These information will be kept safely for future.</small>
        </div>     
        <div class="form-group col-md-3">  
        		<input type="hidden" name="student_id" value="<?= $student_id?>">
                <input type="submit" name="add" value="Add" class="form-control btn btn-primary mt-2">
		</div>

	</div>
</div>

 <?php }

else {
    redirect('admin/login');
}?>