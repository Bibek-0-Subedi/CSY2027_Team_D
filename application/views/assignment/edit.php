<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2> Edit Assignment</h2>
        </div>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/assignment/edit/<?= $module_id ?>/<?= $modules['file_id'] ?>" class="row" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-6 mb-4">
             <label for="name">Assignment: </label>
             <input type="text" class="form-control " value="<?= $modules['filename']?>" name="name"> 
        </div>
        <div class="form-group col-md-6">
             <label for="deadline">Deadline: </label>
             <input type="datetime-local" value="<?= $modules['deadline']?>" class="form-control" name="description"> 
        </div>
        <div class="form-group col-md-6 mb-4">
            <label>Upload Materials Here: </label>
            <div class="custom-file">
                <input type="file" value="<?= $modules['file']?>" class="custom-file-input" name="assignmentFile" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
            <small class="form-text text-muted">Assignment files for students</small>
        </div>
        <div class="form-group col-md-6 mb-4">
            <input type="hidden" class="form-control" name="module_code" value="<?= $modules['module_id']?>">
        </div>
        <div class="form-group col-md-6 mb-4">
            <button type="submit" class="btn form-control uniBtn" name="upload">Upload</button>
        </div>
    </form>
</div>
<?php }

else {
    redirect('admin/login');
}?> 