<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Students</h2>
    </div>
    <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Student</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-user-graduate"></i>
                </div> 
                <div>
                    <h4>Total Students</h4>
                    <h1 class="big-icon ml-5"><?= count($students) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <a href="add" class="btn text-primary border border-primary">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Student</h5>
              </a>
          </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-7 ml-n3">
                <form class="form-inline" method="POST">
                    <select class="custom-select mr-sm-2">
                    <option selected>Level</option>
                    <option value="level4">Level 4</option>
                    <option value="level5">Level 5</option>
                    </select>
                    <select class="custom-select mr-sm-2">
                    <option selected>Course</option>
                    <option value="course1">Course 1</option>
                    <option value="course2">Course 2</option>
                    </select>
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="filter">Filter</button>
                </form>
            </div>
            <div class="col-lg-5 ml-auto">
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
                
                foreach($students as $row){
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
    <!-- </div> -->
</div>
    