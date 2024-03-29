
<div class="container mt-5">
<h2 class="mb-5">Grades</h2>
<div class="list-group">
<?php
foreach($grades as $grade){
?>

    <li class="list-group-item d-flex justify-content-between">
        <div>
            <h5 class="mt-2"><?= $grade['module_name'] ?></h5>
            <?php
                $date = date_create($grade['created_date']);
            ?>
            <div>Submitted On: <strong><?= date_format($date,"dS F Y") ?></strong></div>
        </div>
        <?php if($grade['grade'] !== NULL){ ?>
        <div style="font-size:28px; margin-top:10px;"><?= $grade['grade'] ?></div>
        <?php }else{ ?>
            <div style="font-size:20px; margin-top:10px;">Not Graded yet</div>
        <?php } ?>
    </li>
<?php } ?>
<?php if(count($grades) == 0){ ?>
    <li class="list-group-item d-flex justify-content-between">No Grades to show</li>
    <?php } ?>
</div>
</div>

