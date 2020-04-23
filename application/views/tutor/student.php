<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid mt-4 ml-4">
	<div class="row">
                <h4>Students Detail According To Your Assigned Modules: </h4>
	</div>
	<div class="mt-2">
		<?php foreach ($students as $module) { ?>
    	<div class="card">
        	<div class="card-body">
            	<a class="mb-2" href="<?= site_url() ?>tutor/studentList/<?= $module['module_code'] ?>"><?= $module['module_name']; ?> Module</a>
        	</div>
    	</div>
		<?php } ?>
	</div>
</div>

<?php }

else {
    redirect('admin/login');
}?>


       
