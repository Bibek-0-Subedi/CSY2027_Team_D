<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid mt-4 ml-4">
	<h4 class="bg-content">Profile Details </h4>
	<div class="mt-2">
    	<div class="card">
        	<div class="card-body">
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Name:</h5>
				<h5 class="row-sm-8 mr-3"><?= $tutor['firstname'] . ' ' .
			   		$tutor['middlename'] . ' ' .
			   		$tutor['surname'] ;?></h5>
			   	</div>
			   	<div class="form-group col-md-4">
				<h5 class="row-sm-2">Address:</h5>			   	
				<h5 class="col-sm-8 mr-3"><?= $tutor['address']; ?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Assigned Modules:</h5>		
				<h5 class="col-sm-8 mr-3"><?= $tutor['subject']; ?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Contact:</h5>		
				<h5 class="col-sm-8 mr-3"><?= $tutor['contact']; ?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Email:</h5>		
				<h5 class="col-sm-8 mr-3"><?= $tutor['email']; ?></h5>
				</div>
				<a class="pull-right" href="<?= site_url() ?>tutor/updateData/<?php echo $this->session->userdata('id');?>"> Request for change </a>
        	</div>
    	</div>
	</div>
</div>

<?php }

else {
    redirect('admin/login');
}?>