<h1>Assigned Module</h1>
<br> Module You Are Assigned With: <br>	

<?php foreach($modules as $row){
		echo "<br>";
		echo $row['module_name'];
		echo "<br> Module Duration: ";
		echo $row['module_duration']; ?>
		<a href="<?= base_url('./materials/module/' . $row['filename']); ?>"> <?php echo $row['filename']?></a> <?php 

		echo "<br>";

} ?>

<a href="<?= site_url() ?>module/add/<?php echo $this->session->userdata('id');?>"> Add Material </a>




