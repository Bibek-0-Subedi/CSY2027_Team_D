<div class="container mt-5">
<h2 class="mb-5">Announcements</h2>
    <!-- <h5 class="pl-1 mb-4"></h5> -->
    <div class="notifs">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Announcments</h5>    
            </div>
            <ul class="list-group list-group-flush">
            <?php foreach ($announcements as $announcement) { ?>
                <li class="list-group-item">
                    <h5><?= $announcement['title'] ?></h5>
                    <p><?= $announcement['content'] ?></p>
                    <p>Module: <?= $announcement['module_name'] ?></p>
                    <p>By : Module Tutor</p>

                    <p>Date: <?= $announcement['created_at'] ?></p>
                </li>
            <?php } 
                if(count($announcements) == 0){ ?>
                    <li class="list-group-item">No Announcments</li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>