<div class="container-fluid mx-3">
        <div class="pl-sm-2 pr-sm-2 mt-2">
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
                    <?php foreach ($staffRequests as $staffRequest) { ?>
                        <li class="list-group-item">
                            <a href="staffDetail/<?= $staffRequest['staff_id'] ?>?type=request">
                                <h5><?= "Woodland University's staff <strong>".$staffRequest['firstname'].' '.$staffRequest['surname'].'</strong> wants to change their information' ?></h5>
                                <p><?= $staffRequest['changes'] ?></p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php foreach ($studentRequests as $studentRequest) { ?>
                        <li class="list-group-item">
                            <a href="studentDetail/<?= $studentRequest['admission_id'] ?>?type=request">
                                <h5><?= "Woodland University's student <strong>".$studentRequest['firstname'].' '.$studentRequest['surname'].'</strong> wants to change their information' ?></h5>
                                <p><?= $studentRequest['changes'] ?></p>
                            </a>
                        </li>
                    <?php } 
                        if(count($studentRequests) == 0 && count($staffRequests) == 0 ){ ?>
                            <li class="list-group-item">No Notifications</li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>