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


      <!-- <div class="row mt-3">
        <a href="add" class="btn btn-primary">Add Student</a>
      </div> -->
      <!-- end csv upload  -->
      <!-- begin filter and search post -->
      <div class="row mt-5 mb-3">
        <div class="col-md-7 ml-n3">
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
        <div class="col-md-5 ml-auto">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="searchPost">Search Post</button>
            </form>
        </div>
      </div>
      <!-- end filter and search post  -->
      <!-- begin table structure -->
      <div class="row">
        <table class="table table-hover">
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

                    $status = ($row['status'] == 1) ? 'Live' : 'Dormant';
                    echo '<td>' . $status.'</td>';
                    echo '<td>' . $row['firstname'].' '.$row['middlename'].' '.$row['surname'].'</td>';
                    echo '<td>' . $row['permanent_address'].'</td>';
                    echo '<td>' . $row['contact'].'</td>';
                    echo '<td>' . $row['course_code'].'</td>';
                    echo '<td>' . $row['email'].'</td>';
                    echo '<td>' . $row['qualification'].'</td>';
                    echo '</tr>'; 
                }

                
                // echo ($admissions);
            ?>
            </table>
      </div>
      <!-- end table structure -->
    <!-- </div> -->
  </div>