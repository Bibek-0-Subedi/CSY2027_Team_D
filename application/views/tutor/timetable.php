<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h4> Time Tables</h4>
        </div>
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($timetable as $routine) { ?>
                            <div class="card mb-2">
                                <div class="card-body">
								<a href="viewTimeTable/<?= $routine['routine_id'] ?>">TimeTable for <?= $routine['year']?></a>
                            </div>
                        </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php }

else {
    redirect('admin/login');
}?>


       
