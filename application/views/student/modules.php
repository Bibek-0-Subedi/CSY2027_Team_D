
<div class="container mt-5">
<h2 class="mb-5">Modules</h2>
<div class="row">
<?php
foreach($modules as $module){
?>
    <div class="col-sm-4">
        <div class="card mb-4">
            <a href="module/<?= $module['module_code'] ?>" class="btn btn-outline-primary">
                <div class="card-body">
                    <h3 class="card-title"><?= $module['module_name'] ?></h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
                </div>
            </a>
        </div>
    </div>
<?php } ?>
</div>
</div>

