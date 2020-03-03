<?php 
  include 'adminHeader.php';
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
  <!-- begin admission container -->
  <div class="container-fluid ">
    <div class="pl-sm-2 pr-sm-2 mt-2">
      <div class="row mb-1">
          <h3>Admission</h3>
      </div>
      <!-- begin csv upload -->
      <div class="row bg-content pl-sm-1">
        <form action="" method="post" enctype='multipart/form-data'>
          <div class="form-group">
            <label>Upload Student Details </label>
            <input type="file" class="form-control-file" name="UCASDetail">
            <small class="form-text text-muted">CSV file from UCAS with student details</small>
            <input type="submit" name="upload" value="Upload" class="btn-primary">
          </div>
        </form>
      </div>
      <div class="row mt-3">
        <a href="addStudent.php" class="btn btn-primary">Add Student</a>
      </div>
      <!-- end csv upload  -->
      <!-- begin filter and search post -->
      <div class="row mt-4">
        <div class="col-lg-9 ml-n3">
            <form class="form-inline" method="POST">
                <select class="custom-select mr-sm-2">
                  <option selected>All Admissions</option>
                  <option value="CasePaper">CasePaper</option>
                  <option value="NonCasePaper">NonCasePaper</option>
                </select>
                <select class="custom-select mr-sm-2">
                  <option selected>All Offers</option>
                  <option value="Conditional">Conditional</option>
                  <option value="Unconditional">Unconditional</option>
                </select>
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="filter">Filter</button>
            </form>
        </div>
        <div class="col-lg-3 ml-auto">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="searchPost">Search Post</button>
            </form>
        </div>
      </div>
      <!-- end filter and search post  -->
      <!-- begin table structure -->
      <div class="row mt-3 bg-content pl-sm-1">
          <?php
            $table = new TableGenerator();
            $tableHead = [
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
            $table->SetHeadings($tableHead);
            $data = $students->findAll()->fetchAll();
            foreach($data as $row){
                if(is_string(key($row))){
                    $table->addRow($row);
                }       
            }
            echo $table->getHTML();
          ?>
      </div>
      <!-- end table structure -->
    </div>
  </div>
  <!-- end admission container -->
<?php 
    include 'adminFooter.php';
?>
    
