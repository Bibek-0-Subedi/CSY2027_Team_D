<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('layouts/header');
$this->load->view('layouts/siteNav');
?>
<div class="container-fluid">
	<div class="row mt-2">
		<div class="container-fluid">
			<div class="row">
				<!-- begin first column -->
				<div class="col-lg-5 p-3">

					<div class="card">
						<div class="card-header ">
							<h4>Events & Notice</h4>
						</div>
						<div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						</div>
						<div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Cras justo odio</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Vestibulum at eros</li>
							</ul>
						</div>
						<div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>

					</div>
				</div>
				<!-- end first column -->
				<!-- begin second column -->
				<div class="col-lg-4 p-3 ">
					<div class="card">
						<div class="card-header ">
							<h4>Events & Notice</h4>
						</div>
						<div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card mt-3">
						<div class="card-header ">
							<h4>Events & Notice</h4>
						</div>
						<div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
				<!-- end second column -->
				<!-- begin third column -->
				<div class="col-lg-3 p-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">You are not logged in</h5>
							<p class="card-text">Please go to the following links to Log in to the system</p>
							<a href="<?php echo base_url(); ?>admin/login" class="btn uniBtn loginButton">Staff Login</a><br><br>
							<a href="<?php echo base_url(); ?>student/login" class="btn uniBtn loginButton ">Student Login</a>
						</div>
					</div>
				</div>
				<!-- end third column -->
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('layouts/footer');
?>