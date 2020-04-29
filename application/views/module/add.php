<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Add Materials</h2>
        </div>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/add/<?= $modules['module_code'] ?>" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-4">
             <label>Week/Title: </label>
             <input type="text" class="form-control-file" name="module_date"> 
        </div>
        <div class="form-group col-md-4">
             <label>Description: </label>
             <input type="text" class="form-control-file" name="description"> 
        </div>
        <div class="form-group col-md-4">
            <label>Upload Materials Here: </label>
            <input type="file" class="form-control-file" name="file">
            <small class="form-text text-muted">Module files for students</small>
        </div>
        <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="module_code" value="<?= $modules['module_code']?>">
            <input type="hidden" class="form-control" name="type" value="0">
        </div>

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>
</div>
<?php }

else {
    redirect('admin/login');
}?>