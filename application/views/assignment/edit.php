<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <h2 class="bg-content"> Edit </h2>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>tutor/module/assignment/edit/<?= $module_id ?>/<?= $modules['file_id'] ?>" method="POST" enctype="multipart/form-data">    

        <div class="form-group row">
             <label for="name" class="col-sm-2">Assignment: </label>
             <input type="text" class="form-control col-sm-2" value="<?= $modules['filename']?>" name="name"> 
        </div>
        <div class="form-group row">
             <label for="deadline" class="col-sm-2">Deadline: </label>
             <input type="datetime-local" value="<?= $modules['deadline']?>" class="form-control col-sm-2" name="description"> 
        </div>
        <div class="form-group row">
            <label for="materials" class="col-sm-2">Upload Materials Here: </label>
            <input type="file" value="<?= $modules['file']?>" class="form-control col-sm-2" name="file">
            <small class="form-text text-muted">Assignment files for students</small>
        </div>
        <div class="form-group row">
            <input type="hidden" class="form-control" name="module_code" value="<?= $modules['module_id']?>">
        </div>

        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>
</div>
<?php }

else {
    redirect('admin/login');
}?> 