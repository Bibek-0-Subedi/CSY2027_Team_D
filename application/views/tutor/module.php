<?php if(($this->session->userdata('type')) == 3) {?>

	<div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Modules you are assigned to: </h2>
        </div>
	<div class="row mt-5">
		<?php foreach($modules as $module){ ?>
    <div class="col-sm-5">
        <div class="card mb-4">
            <a href="<?= site_url() ?>tutor/module/<?= $module['module_code'] ?>" class="btn btn-outline-primary">
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

<?php }

else {
    redirect('admin/login');
}?>