<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Profile Details</h2>
        </div>
	<div class="mb-5">
		<div class="card p-0">
			<div class="card-header text-center mb-3"><h5 class="m-0">Tutor's Detail</h5></div>
			<div class="d-flex">
				<div class="large-icon text-center px-4 ml-2 mr-5">
					<div class="d-inline-flex p-5 mb-5 rounded-circle bg-secondary">
						<i class="fas fa-user text-light mx-1"></i>
					</div>
					<div><a class="btn btn-outline-primary mb-3" href="<?= site_url() ?>tutor/updateData">Request For Change</a></div>
					<div><a class="btn btn-outline-primary mb-3" href="#">See PAT Session Requests</a></div>
				</div>
				<div class="card-body ml-5">
					<h2><?= $tutor['firstname'].' '.$tutor['middlename'].' '.$tutor['surname'] ;?></h2>
					<p class="card-text">
					<ul class="list-group list-group-flush">
						<h4><?= $tutor['email'] ?></h4>
						<p>Permanent Address: <?= $tutor['address'] ?></p>
						<p>Contact: <?= $tutor['contact'] ?></p>
						<p>Course: <?= $tutor['course_name'] ?></p>
						<p>Email: <?= $tutor['email'] ?></p>
					</p>
				</div>
			</div>
		</div>
    </div>
</div>

<?php }

else {
    redirect('admin/login');
}?>