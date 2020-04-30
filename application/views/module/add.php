<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Add Materials</h2>
        </div>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/add/<?= $modules['module_code'] ?>" class="row" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-6">
             <label>Week/Title: </label>
             <input type="text" class="form-control" name="name">  
        </div>
        <div class="form-group col-md-6">
             <label>Description: </label>
             <input type="text" class="form-control" name="description"> 
        </div>
        <div class="form-group col-md-6">
            <label>Upload Materials Here: </label>
            <div class="custom-file">
            <input type="file" class="custom-file-input" name="moduleFile" id="inputGroupFile02">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>

            </div>
            <small class="form-text text-muted">Module files for students</small>
        </div>
        <div class="form-group col-md-6">
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