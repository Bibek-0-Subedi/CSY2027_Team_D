
<div class="container-fluid mt-4 ml-4">
	<h4 class="bg-content">Profile Details </h4>
	<div class="mt-2">
    	<div class="card">
        	<div class="card-body">
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Name:</h5>
				<h5 class="row-sm-8 mr-3"><?php echo $this->session->userdata('name') . ' ' .
			   		$this->session->userdata('middlename') . ' ' .
			   		$this->session->userdata('surname') ;?></h5>
			   	</div>
			   	<div class="form-group col-md-4">
				<h5 class="row-sm-2">Address:</h5>			   	
				<h5 class="col-sm-8 mr-3"><?php echo $this->session->userdata('address') ;?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Assigned Modules:</h5>		
				<h5 class="col-sm-8 mr-3"><?php echo $this->session->userdata('subject') ;?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Contact:</h5>		
				<h5 class="col-sm-8 mr-3"><?php echo $this->session->userdata('contact') ;?></h5>
				</div>
				<div class="form-group col-md-4">
				<h5 class="row-sm-2">Email:</h5>		
				<h5 class="col-sm-8 mr-3"><?php echo $this->session->userdata('email') ;?></h5>
				</div>
				<a class="pull-right" href="<?= site_url() ?>tutor/updateData/<?php echo $this->session->userdata('id');?>"> Request for change </a>
        	</div>
    	</div>
	</div>
</div>