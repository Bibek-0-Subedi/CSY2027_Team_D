<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <h2 class="bg-content"> <?= $modules['module_name']?> - Add Assignment </h2>
    <?php echo validation_errors(); ?>
   
    <form action="<?= site_url() ?>assignment/add/<?= $modules['module_code'] ?>" method="POST" enctype="multipart/form-data">    

        <div class="form-group col-md-4">
             <label>Assignment Name: </label>
             <input type="text" class="form-control-file" name="name"> 
        </div>
        <div class="form-group col-md-4">
             <label>Deadline: </label>
             <input type="datetime-local" class="form-control-file" name="description"> 
        </div>
        <div class="form-group col-md-4">
            <label>Upload Materials Here: </label>
            <input type="file" class="form-control-file" name="file">
            <small class="form-text text-muted">Assignment files for students</small>
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


