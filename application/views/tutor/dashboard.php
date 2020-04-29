<?php if(($this->session->userdata('type')) == 3) {?>
	
<div class="container-fluid mx-3">
	<div class="row border-bottom mb-3">
                <h2>Dashboard</h2>
            </div>
            <!-- <h5 class="pl-1 mb-4"></h5> -->
            <div class="notifs">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Notifications</h5>    
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php foreach ($announcements as $announcement) { ?>
                        <li class="list-group-item">
							<h5><?= $announcement['title'] ?></h5>
							<p><?= $announcement['content'] ?></p>
							<p>By : Administrator</p>

							<p>Date: <?= $announcement['created_at'] ?></p>
                        </li>
                    <?php } 
                        if(count($announcements) == 0){ ?>
                            <li class="list-group-item">No Notifications</li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
</div>
<?php }

else {
    redirect('admin/login');
}?> 