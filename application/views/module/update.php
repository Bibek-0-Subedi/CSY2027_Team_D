<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Update Materials</h2>
        </div>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/update/<?= $module_id ?>/<?= $modules['file_id'] ?>" class="row" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-6">
             <label for="week">Week/Title: </label>
             <input type="text" class="form-control " value="<?= $modules['filename']?>" name="name"> 
        </div>
        <div class="form-group col-md-6">
             <label for="description">Description: </label>
             <input type="text" value="<?= $modules['description']?>" class="form-control " name="description"> 
        </div>
        <div class="form-group col-md-6">
            <label for="materials">Upload Materials Here: </label>
            <div class="custom-file">
                <input type="file" name="moduleFile" class="custom-file-input" value="<?= $modules['file']?>" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02"><?= $modules['file']?></label>
            </div>
            <small class="form-text text-muted">Module files for students</small>
        </div>
        <div class="form-group col-md-6">
            <input type="hidden" class="form-control" name="module_code" value="<?= $modules['module_id']?>">
        </div>

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Update</button>
    </form>
</div>
<?php }

else {
    redirect('admin/login');
}?> 