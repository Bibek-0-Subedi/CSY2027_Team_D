<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content"> <h4> Edit Information In Your Diary  </h4></div>
          <?php echo validation_errors(); ?>  
          <?php echo form_open('tutor/diary/edit/' . $diary_id); ?>

 	        <div class="form-group col-md-6">
 	          <label for="information" class="mr-3 mt-5">Your Information </label>
            <textarea name="information" class="md-textarea form-control" rows="10"></textarea>
          </div>

          <div class="form-group col-md-4">
                <small class="text-muted">These information will be edited on your diary-information list.</small>
          </div>
          
          <div class="form-group col-md-3">   
                <input type="submit" name="add" value="Edit" class="form-control btn btn-primary mt-2">
          </div>
      </div>
</div>

 <?php }

else {
    redirect('admin/login');
}?>