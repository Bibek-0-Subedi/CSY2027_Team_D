<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Course</h2>
    </div>
        <!-- add staff button -->
        <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Course</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-book"></i>
                </div> 
                <div>
                    <h4>Total Courses</h4>
                    <h1 class="big-icon ml-5"><?= count($courses) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <a href="courseDetail" class="btn text-primary border border-primary">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Course</h5>
              </a>
          </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-9 mb-4">
                <form class="form-inline" method="POST">
                    <select class="custom-select mr-4">
                        <option selected>Module</option>
                        <option value="Module1">Level 4</option>
                        <option value="Module2">Level 5</option>
                    </select>
                    <select class="custom-select mr-4">
                        <option selected>Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                    </select>
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="filter">Filter</button>
                </form>
            </div>
        </div>
        <!-- end filter and search post  -->
        <!-- begin table structure -->
        <div class="row mt-3 ">
            <div class="container-fluid">
                <table id="courseTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th data-filter-control="select">Course Name</th>
                            <th data-filter-control="select">Duration</th>
                            <th data-filter-control="select">Department</th>
                            <th data-filter-control="select">Course Leader</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course) { ?>
                            <tr>
                                <td><?= $course['course_code'] ?></td>
                                <td><?= $course['course_name'] ?></td>
                                <td><?= $course['course_duration'] ?></td>
                                <td><?= $course['name'] ?></td>
                                <td><?= $course['firstname'] ; ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="courseDetail/<?php echo $course['course_code']; ?>" class="btn btn-success">Edit</a>
                                    <?php echo form_open('admin/course/'.$course['course_code'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                    <?php echo form_open('admin/course/'.$course['course_code'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#courseTable').DataTable();
                        //  $('#courseTable').bootstrapTable();
                    });
                </script>
            </div>
        </div>
    </div>
</div>

