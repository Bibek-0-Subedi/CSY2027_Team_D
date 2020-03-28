<?php if(($this->session->userdata('type')) == 3) {?>

<h2> ADD ASSIGNMENT</h2>

<div class="container-fluid">
 
    <?php echo form_open('assignment/add') ;?>
        <div class="form-group col-md-4">
            <label>Assignment Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group col-md-4">
            <label>Set Deadline</label>
            <input type="datetime-local" class="form-control" name="deadline">
        </div>
        <div class="form-group col-md-4">
            <label>Module Code</label>
            <input type="text" class="form-control" name="module_id">
        </div>
        <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="staff_id" value="<?php echo $this->session->userdata('id'); ?>">
        </div>
        <div class="form-group col-md-4">
          
        </div>
        <!-- <div class="form-group col-md-4">
        	<label>Upload Assignment Materials</label>
            <input type="file" class="form-control-file" name="UCASDetail">
            <small class="form-text text-muted">Assignment files for students</small>
        </div> -->

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>
</div>
<?php }

else {
	echo "not a tutor should redirect using redirect function";
}?>	

