<h3>This is tutor dashboard</h3>

<h4>Your Profile Records<h4>

<h5>Your Name:</h5>
<h5><?php echo $this->session->userdata('name') . ' ' .
			   $this->session->userdata('middlename') . ' ' .
			   $this->session->userdata('surname') ;?><h5>

<h5>Your Address:</h5>			   	
<h5><?php echo $this->session->userdata('address') ;?><h5>

<h5>Your Modules:</h5>		
<h5><?php echo $this->session->userdata('subject') ;?><h5>

<h5>Your Contact:</h5>		
<h5><?php echo $this->session->userdata('contact') ;?><h5>

<h5>Your Email:</h5>		
<h5><?php echo $this->session->userdata('email') ;?><h5>	

			
<a href="<?= site_url() ?>tutor/updateData/<?php echo $this->session->userdata('id');?>"> Request for change </a>