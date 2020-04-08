
<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">	
<h2> LIST OF ASSIGNMENTS </h2>



 
        <?php
            echo ($assignments);

        ?>
      

<a href="<?= site_url() ?>assignment/view"> View Uploaded Assignments </a><br><br>

<a href="<?= site_url() ?>assignment/add"> Add Assignment </a><br><br>

<a href="<?= site_url() ?>assignment/upload"> Upload Assignment </a><br><br>

<?php } 

elseif(($this->session->userdata('student_logged'))) { ?>
	
	<a href="<?= site_url() ?>assignment/upload"> Upload Assignment </a><br><br>

<?php }
else {
	redirect(site_url());
}?>

</div>