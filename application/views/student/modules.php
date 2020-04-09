
<div class="container mt-5">
<h1 class="mb-5">Modules</h1>
<div class="row">
<?php
foreach($modules as $module){
?>
    <div class="col-sm-4">
        <div class="card text-white bg-light mb-4">
            <a href="module/<?= $module['module_code'] ?>" class="text-decoration-none">
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

