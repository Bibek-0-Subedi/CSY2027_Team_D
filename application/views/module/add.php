<?php if(($this->session->userdata('type')) == 3) {?>

<h2> Add Materials</h2>

<div class="container-fluid">
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>module/add/<?php echo $this->session->userdata('id');?>" method="POST" enctype="multipart/form-data">       
        <div class="form-group col-md-4">
             <select class="form-control col-sm-4" name='module_code'>
                <option value="" disabled selected>Module Code</option>
                    <?php foreach ($modules as $module) { ?>
                        <option name="module_code" value="<?= $module['module_code'] ?>"><?= $module['module_code'] ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
        	<label>Upload Materials Here: </label>
            <input type="file" class="form-control-file" name="files">
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


