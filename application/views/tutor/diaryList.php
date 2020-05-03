<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Your Diary</h2>
        </div>
        <div class="row mt-3 pl-3">
            <a href="<?= site_url().'tutor/diary/add'?>" class="btn btn-outline-primary big-icon mr-3 mb-3 px-5"> 
                <i class="fa fa-plus"></i>
                <h5>Add a new Diary Page</h5>
            </a>
        </div>
        <?php
            if (!empty($this->session->flashdata('added'))) { ?>
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $this->session->flashdata('added'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('edited'))) {?> 
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $this->session->flashdata('edited'); ?>
            </div>
        <?php }?>    
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($diaries as $diary) { ?>
                            <div class="card">
                                <div class="card-body">
                                <h3><?= $diary['title'] ?></h3>
                                <p><?= $diary['description'] ?></p>
                                <p>Created at: <?= $diary['date'] ?></p>
                                <a href="<?= site_url() ?>tutor/diary/edit/<?= $diary['diary_id']?>" class="btn btn-outline-primary pull-right">Edit</a> 
                            </div>
                        </div> 
                <?php } ?>
            </div>
        </div>
</div>

<?php }

else {
    redirect('admin/login');
}?>


       
