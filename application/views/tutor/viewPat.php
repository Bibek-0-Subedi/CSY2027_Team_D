<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>PAT Session Student List</h2>
        </div>
        <?php
            if (!empty($this->session->flashdata('added'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('added'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('edited'))) {?> 
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('edited'); ?>
            </div>
        <?php }?>
        <div class="row mt-3 pl-3">
            <a href="<?= site_url().'tutor/pat/add/'.$student_id?>" class="btn btn-outline-primary big-icon mr-3 mb-3 px-5"> 
                <i class="fa fa-plus"></i>
                <h5>Add a new Diary Page</h5>
            </a>
        </div>
        <div class="row mt-3 ">
            <div class="container-fluid">
                 <?php foreach ($informations as $information) { ?>
                            <div class="card">
                                <div class="card-body">
                                <p>Date: <?= $information['date'] ?></p>
                                <p><?= $information['pat_information'] ?></p>
                                <a href="<?= site_url() ?>tutor/pat/edit/<?= $student_id?>/<?= $information['pat_id']?>" class="btn btn-primary">Edit</a> 
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


       
