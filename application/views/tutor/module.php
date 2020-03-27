<h1>Assigned Module</h1>

<?php foreach($module as $row){

echo $row['module_name'];

echo " Module Duration: ";
echo $row['module_duration'];

}

?>

<a href="<?= base_url('path/to/directory/' . $row['module_file']); ?>"> <?php echo $row['module_file']?></a>

<a href="<?= site_url() ?>module/add"> Add Material </a>

