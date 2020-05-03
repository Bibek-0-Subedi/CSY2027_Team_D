<div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Edit Information In Your Diary</h2>
        </div>
        <?php echo validation_errors(); ?>  
          <?php echo form_open('student/diary/edit/' . $diary['diary_id']); ?>

          <div class="form-group col-md-6">
            <label for="title" class="mr-3 mt-5">Title </label>
            <textarea name="title" class="md-textarea form-control" rows="1"><?= $diary['title'] ?></textarea>
          </div>

 	        <div class="form-group col-md-6">
 	          <label for="information" class="mr-3 mt-5">Your Information </label>
            <textarea name="information" class="md-textarea form-control" rows="10"><?= $diary['description'] ?></textarea>
          </div>

          <div class="form-group col-md-4">
                <small class="text-muted">These information will be edited on your diary-information list.</small>
          </div>
          
          <div class="form-group col-md-3">   
                <input type="submit" name="add" value="Edit" class="form-control btn btn-primary mt-2">
          </div>
</div>

