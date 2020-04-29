<div class="container mt-5">
    <h2 class="mb-3">Dashboard</h2>

    <div class="row mb-5">
        <div class="card p-0 col-md-4 mr-4">
            <div class="card-header text-center mb-3"><h5 class="m-0">Student's Detail</h5></div>
            <div class="large-icon text-center card-img-top px-4">
                <div class="d-inline-flex p-5 mb-5 rounded-circle bg-secondary">
                    <i class="fas fa-user text-light mx-1"></i>
                </div>
            </div>
            <div class="card-body text-center">
                <h2><?= $student['firstname'].' '.$student['middlename'].' '.$student['surname'] ;?></h2>
                <p class="card-text">
                <ul class="list-group list-group-flush">
                    <h4><?= $student['email'] ?></h4>
                    <p>Permanent Address: <?= $student['permanent_address'] ?></p>
                    <p>Contact: <?= $student['contact'] ?></p>
                    <p>Course: <?= $student['course_name'] ?></p>
                    <p>Email: <?= $student['email'] ?></p>
                    <p>Qualification: <?= $student['qualification'] ?></p>
                </p>
                <div>
                    <?php if($student['approval'] == 0){ ?>
                        <a class="btn btn-outline-primary mb-3" href="updateData">Request For Change</a>
                    <?php }else{ ?>
                        <div class="btn btn-outline-success mb-3" >Change Request Sent</div>
                    <?php } ?>
                    
                </div>
                <div>
                    <?php if($student['pat_request'] == 0){ ?>
                    <a class="btn btn-outline-primary mb-3" href="patRequest">Request For PAT Session</a>
                    <?php }else{ ?>
                        <div class="btn btn-outline-success mb-3" >PAT Request Sent</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card p-0 col-md-7 notifs">
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