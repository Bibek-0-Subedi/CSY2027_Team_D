<div class="container mt-5">
<h2 class="mb-5"><?= $module['module_name']; ?> Module</h2>
<div class="mb-5">
    <a class="btn btn-outline-primary big-icon mr-5 px-5" href="attendance/<?= $module['module_code'] ?>">
        <i class="fa fa-list-alt"></i>
        <h5>See Attendances</h5>
    </a>
    <a class="btn btn-outline-primary big-icon mr-5 px-5" href="announcement/<?= $module['module_code'] ?>">
        <i class="fa fa-bullhorn"></i>
        <h5>See Announcements</h5>
    </a>
    <?php if(isset($assignment) && $assignment['archive'] == 0){ ?>
        <a class="btn btn-outline-primary big-icon" href="assignment/<?= $module['module_code'] ?>">
        <i class="fa fa-folder"></i>
        <h5>See Assignments and Grades</h5>
    </a>
    <?php } ?>
</div>
<h3 class="mb-5">Week Files</h3>
<?php foreach ($module_files as $module_file) { ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $module_file['filename'] ?></h4>
            <p><?= $module_file['description'] ?></p>
            <a class="btn btn-primary pull-right" role="button" href="<?= site_url() ?>assets/module_files/<?= $module_file['file'] ?>" download="<?= $module_file['filename'] ?>">Download <span class="fa fa-download"></span></a>
        </div>
    </div>
<?php } ?>

</div>