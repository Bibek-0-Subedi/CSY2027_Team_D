<div class="container mt-5">
<h1 class="mb-5"><?= $module['module_name']; ?> Module</h1>

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