<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container mt-5">
<!-- <h2 class="mb-5"><?= $module['module_name']; ?> Module Attendance</h2> -->

<div class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <h5 class="mt-2">
                <h5> Assignment Name:</h5>
                <h5> File: </h5> 
                <h5> Submitted date:</h5>
                <h5> Grade:</h5>
        </h5>    
     </li>
    <?php foreach ($grades as $grade) { ?>
        <li class="list-group-item d-flex justify-content-between">
            <h5 class="mt-2">
                <h5> <?=$grade['assignment_name']; ?> </h5>
            </h5>
            <h5 class="mt-2">
                <h5><a href="<?= site_url() ?>assets/assignment_files/<?= $grade['assignment_file'] ?>" download="<?= $grade['assignment_file'] ?>"> <?=$grade['assignment_file']; ?></a></h5>
            </h5>
            <h5 class="mt-2">
                <h5> <?=$grade['submission_date']; ?> </h5>
            </h5>
            <h5 class="mt-2">
                <h5> <?=$grade['grade']; ?> </h5>
            </h5>
        </li>
    <?php } ?>
</ul>
</div>

</div>

<?php }

else {
    redirect('admin/login');
}?> 