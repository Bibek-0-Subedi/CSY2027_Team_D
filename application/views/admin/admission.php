<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Admissions</h2>
        </div>
      <!-- begin csv upload -->
      <div class="card">
        <div class="card-header">CSV File Upload</div>
        <div class="card-body row">
          <div class="col-md-8">
              <form action="uploadCSV" method="post" enctype='multipart/form-data'>
                  <div class="input-group mb-2">
                      <div class="custom-file">
                          <input type="file" name="UCASDetail" class="custom-file-input" id="cvsUplaod" >
                          <label class="custom-file-label" for="cvsUplaod">Choose file</label>
                      </div>
                  </div>
                  <small class="form-text text-muted">CSV file from UCAS with student details</small>
                  <input type="submit" name="upload" value="Upload CSV File" class="btn btn-outline-primary mt-3">
              </form>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-3">
              <a href="add" class="btn text-primary border border-primary">
                  <div class="big-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Student</h5>
              </a>
          </div>
        </div>     
      </div>

      <?php if (!empty($this->session->flashdata('added'))) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('added'); ?>
        </div>
    <?php } ?>
      <!-- <div class="row mt-3">
        <a href="add" class="btn btn-primary">Add Student</a>
      </div> -->
      <!-- end csv upload  -->
      <!-- begin filter and search post -->
      <div class="row mt-5 mb-3">
        <div class="col-md-7 ml-n3">
        <?php echo form_open('admin/admission/', ['class' => 'form-inline']); ?>
            <select class="custom-select col-sm-2 mr-2" name="assigned">
                <option value="3" <?php if (!isset($_POST['assigned'])) echo "selected"; ?>>CaseFile</option>
                <option value="1" <?php if (isset($_POST['assigned']) && $_POST['assigned'] == 1) echo "selected"; ?>>Created</option>
                <option value="0" <?php if (isset($_POST['assigned']) && $_POST['assigned'] == 0) echo "selected"; ?>>Pending</option>
            </select>
            <select class="custom-select col-sm-2 mr-2" name="status">
                <option value="3" <?php if (!isset($_POST['status'])) echo "selected"; ?>>Status</option>
                <option value="1" <?php if (isset($_POST['status']) && $_POST['status'] == 2) echo "selected"; ?>>Provisional</option>
                <option value="2" <?php if (isset($_POST['status']) && $_POST['status'] == 0) echo "selected"; ?>>Dormant</option>
            </select>
            <select class="custom-select col-sm-3 mr-3" name='course'>
                <option value="null">Course</option>
                <?php foreach ($courses as $crse) { ?>
                    <option value="<?= $crse['course_code'] ?>" <?php if (isset($_POST['course']) && $_POST['course'] == $crse['course_code']) echo "selected"; ?>><?= $crse['course_name'] ?></option>
                <?php } ?>
            </select>
            <button class="btn btn-info my-2 my-sm-0 mr-2" type="submit" name="filter">Filter</button>
            <a href="" class="btn btn-secondary my-2 my-sm-0" type="button">Clear All</a>
            </form>
        </div>
      </div>
      <!-- end filter and search post  -->
      <!-- begin table structure -->
      <div class="row">
          <div class="container-fluid">
          <table id="admissionTable" class="table table-striped  table-bordered table-hover" data-url="json/data1.json" data-filter-control="true">
            <thead class="thead-light">  
            <?php
                $tableHead = ['Id', 'Assigned Id', 'Status', 'Full Name', 'Address', 'Contact', 'Course Code', 'Email', 'Qualification'];

                foreach($tableHead as $tableHeading){ 
                    echo '<th>' . $tableHeading . '</th>';
                }
                echo '</thead>';
                
                foreach($admissions as $row){
                    echo '<tr>';
                    echo '<td>' . $row['admission_id'].'</td>';
                    if(empty($row['assigned_id'])){
                        echo '<td><a href="casefile/'.$row["admission_id"].'">Create Id</a></td>';
                    }else{
                        echo '<td>' . $row['assigned_id'].'</td>';
                    }
                    if($row['status'] == 0){
                        $status = 'Inactive';
                    }else if($row['status'] == 1){
                        $status = '<a href="casefile/'.$row["admission_id"].'">Provisional</a>';
                    }else if($row['status'] == 2){
                        $status = 'Dormant';
                    }
                    echo '<td>' . $status.'</td>';
                    echo '<td>' . $row['firstname'].' '.$row['middlename'].' '.$row['surname'].'</td>';
                    echo '<td>' . $row['permanent_address'].'</td>';
                    echo '<td>' . $row['contact'].'</td>';
                    echo '<td>' . $row['course_name'].'</td>';
                    echo '<td>' . $row['email'].'</td>';
                    echo '<td>' . $row['qualification'].'</td>';
                    echo '</tr>'; 
                }
                // echo ($admissions);
            ?>
            </table>
          </div>  
      </div>
      <!-- end table structure -->
    <!-- </div> -->
  </div>
  <script>
    $(document).ready(function() {
        $('#admissionTable').DataTable();
    });
</script>