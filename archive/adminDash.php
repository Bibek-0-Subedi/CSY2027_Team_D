<?php
    include 'header.php';
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

    $table = new TableGenerator();

    $headings = [
        'admission_id',
        'application_no',
        'student_firstname',
        'student_surname',
        'contact_no',
        'address',
        'email',
        'offer',
        'admission_status',
        'department_id',
        'course_id'
    ];
    
    $table->SetHeadings($headings);
    $data = $students->findAll()->fetchAll();
    foreach($data as $row){
        if(is_string(key($row))){
            $table->addRow($row);
        }
            
    }
?>
    <main>
        <form action="" method="post" enctype='multipart/form-data'>
            <input type="file" name="UCASDetail" class="Button">
            <br>
            <input type="submit" name="upload" value="Upload" class="Button">
        </form>
        <input type="submit" name="Filter" value="Filter" class="Button">

        <div>
        <?php 

        echo $table->getHtml()
        
        ?>
        </div>
    </main>


<?php
    include 'footer.php';
?>
