<div class="container mt-5">
    <?php if($this->session->flashdata('assignmentUpload')){ ?>
        <div class="bg-light"><?= $this->session->flashdata('assignmentUpload') ?></div>
       <?php }?>
    
    <h1 class="mb-5">Assignment</h1>
    <div class="card mb-5">
        <div class="card-header">Information</div>
        <div class="card-body">
            <p class="card-text"><?= $assignment['description'] ?></p>
            <?php $deadline = date_create($assignment['deadline'])  ?>
            <p class="card-text">Submission Deadline: <strong><?= date_format($deadline,"dS F Y \a\\t H:m:s") ?></strong></p>
            <a href="" class="btn btn-primary pull-right">Download Brief</a>
        </div>
    </div>
<?php 
$todayDate = date('Y-m-d H:i:s');
$subDate = date_format(date_create($assignment['deadline']), 'Y-m-d H:i:s');
if( $subDate > $todayDate ){ ?>
    <div class="card mb-5">
        <div class="card-header">Assignment Submission</div>
        <div class="card-body">
            <?php if(empty($submitted)){  ?>
            <form action="<?= site_url().'student/module/uploadAssignment' ?>" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="module_code" value="<?= $assignment['module_code'] ?>">
            <input type="hidden" name="student_id" value="<?= $this->session->userdata('student_id') ?>">
                <div class="input-group mb-2">
                    <div class="custom-file">
                        <input type="file" name="assignmentFile" class="custom-file-input" id="assignmentUpload" required>
                        <label class="custom-file-label" for="assignmentUpload">Choose file</label>
                    </div>
                </div>
                <small class="form-text text-muted">You have to upload your assignment before the deadline mentioned</small>
                <input type="submit" name="upload" value="Upload Assignment" class="btn btn-outline-primary mt-3 pull-right">
            </form>
            <?php }else{
                echo '<div> Assignment Already Submitted</div>';
            } ?>
        </div>
    </div>
<?php }else{
        
    ?>
    <div class="card mb-5">
        <div class="card-header">Grade</div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <?php 
                    if(isset($submitted) && $submitted['grade'] !== NULL){
                    ?>
                <div>
                    <h5 class="mt-2"><?= $submitted['module_name'] ?></h5>
                    <?php
                        $date = date_create($submitted['submission_date']);
                    ?>
                    <div>Submitted On: <strong><?= date_format($date,"dS F Y") ?></strong></div>
                </div>
                <div style="font-size:28px; margin-top:10px;"><?= $submitted['grade'] ?></div>
            <?php }else{
                echo '<div> No Grades to show</div>';
            } ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>