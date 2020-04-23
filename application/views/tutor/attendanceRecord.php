<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container mt-5">
<!-- <h2 class="mb-5"><?= $module['module_name']; ?> Module Attendance</h2> -->

<div class="list-group">
    <?php foreach ($attendances as $attendance) { ?>
        <li class="list-group-item d-flex justify-content-between">
            <h5 class="mt-2">
                <?php
                    $date = date_create($attendance['date']);
                    echo date_format($date,"dS F Y");
                ?>
            </h5>
            <?php $status = ($attendance['status'] == 1) ? '<i class="fas fa-check-circle text-primary"></i>' : '<i class="fas fa-times-circle text-danger"></i>'; ?>
            <div style="font-size:28px;"><?= $status ?></div>
        </li>
    <?php } ?>
</ul>
</div>

</div>

<?php }

else {
    redirect('admin/login');
}?> 