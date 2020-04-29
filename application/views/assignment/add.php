<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2> <?= $modules['module_name']?> - Add Assignment</h2>
        </div>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/assignment/add/<?= $modules['module_code'] ?>" class="row" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-6 mb-4">
             <label>Assignment Name: </label>
             <input type="text" class="form-control" name="name"> 
        </div>
        <div class="form-group col-md-6 mb-4">
             <label>Deadline: </label>
             <input type="datetime-local" class="form-control" name="description"> 
        </div>
        <div class="form-group col-md-6 mb-4">
            <label>Upload Materials Here: </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="assignmentFile" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
            <small class="form-text text-muted">Assignment files for students</small>
        </div>
        <div class="form-group col-md-6 mb-4">
            <input type="hidden" class="form-control" name="module_code" value="<?= $modules['module_code']?>">
             <input type="hidden" class="form-control" name="type" value="1">
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


