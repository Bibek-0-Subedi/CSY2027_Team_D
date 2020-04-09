<div class="container mt-5">
    <h2 class="mb-5">Dashboard</h2>

    <div class="mb-5">
        <h2><?= $student['firstname'].' '.$student['middlename'].' '.$student['surname'] ;?></h2>
        <h4><?= $student['email'] ?></h4>
        <p>Permanent Address: <?= $student['permanent_address'] ?></p>
        <p>Course: <?= $student['course_name'] ?></p>
    </div>
    <!-- begin quick notification panel  -->
    <h2 class="mb-5">Notifications</h2>

    <div class="row mt-1 notification">
        Quick Notification
    </div>
    <!-- end quick notification panel  -->
    <div class="row mt-1">
        <div class="container-fluid">
            <div class="row">
                <!-- begin first column -->
                <div class="col-lg-6 bg-dark">
                        first
                </div>   
                <!-- end first column -->
                <!-- begin second column -->
                <div class="col-lg-6 bg-success">
                        second
                </div>
                <!-- end second column -->
                </div>
        </div>
    </div>
</div>