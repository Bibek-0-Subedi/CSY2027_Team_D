<?php
    include 'header.php';
    include 'classes/databasetable.php';
    $students = new Databasetable('admission');

    if(isset($_POST['upload'])){
        $csvFileName = explode(".", $_FILES['UCASDetail']['name']);
        if(end($csvFileName) == "csv"){
            $csvHandle = fopen($_FILES['UCASDetail']['tmp_name'], "r");
            $mydata = fgetcsv($csvHandle);
            while($data = fgetcsv($csvHandle) ){
                $arr = [];
                $count = 0;
                foreach($data as $key => $value){
                    $arr[$mydata[$count]] = $value;
                    $count++;
                }
                $students->insert($arr);
            }
        }
    }

?>
<html>
    <main>
        <form action="" method="post" enctype='multipart/form-data'>
            <input type="file" name="UCASDetail" class="Button">
            <br>
            <input type="submit" name="upload" value="Upload" class="Button">
        </form>
        <input type="submit" name="Filter" value="Filter" class="Button">
    </main>
    <?php
        include 'footer.php';
    ?>
</html>

