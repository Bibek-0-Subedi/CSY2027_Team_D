<div class="container mt-5">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h4> Your Diary </h4>
        </div>
        <div class="row mt-3">
         <a href="<?= site_url().'student/diary/add'?>" class="btn btn-primary ml-5">Add Information</a>
     </div>
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($diaries as $diary) { ?>
                            <div class="card">
                                <div class="card-body">
                                <a> Title: </a><br>
                                <a class="ml-5"><?= $diary['title'] ?></a><br>
                                <a> Description: </a><br>
                                <a class="ml-5"><?= $diary['description'] ?></a><br>
                                <a class="pull-right"> <?= $diary['date'] ?></a>
                                <a href="<?= site_url() ?>tutor/diary/edit/<?= $diary['diary_id']?>" class="">Edit</a> 
                            </div>
                        </div> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>



       
