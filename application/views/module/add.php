<?php if(($this->session->userdata('type')) == 3) {?>

<h2> Add Materials</h2>

<div class="container-fluid">
 
    <?php echo form_open('module/add') ;?>
       
        <div class="form-group col-md-4">
            <label>Module Code</label>
            <select class="custom-select mr-sm-2">
                  
                  <option value="<?php echo $this->session->userdata('id'); ?>">1</option>
                 
                </select>
        </div>
        <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="module_id" value="<?php echo $this->session->userdata('id'); ?>">
        </div>
        <div class="form-group col-md-4">
          
        </div>
        <div class="form-group col-md-4">
        	<label>Upload Materials Here: </label>
            <input type="file" class="form-control-file" name="UCASDetail">
            <small class="form-text text-muted">Module files for students</small>
        </div>
        <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="staff_id" value="<?php echo $this->session->userdata('id'); ?>">
        </div>

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>
</div>
<?php }

else {
	echo "not a tutor should redirect using redirect function";
}?>	

