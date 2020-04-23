<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Module</h2>
    </div>
        <!-- add staff button -->
        <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Module</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-book-open"></i>
                </div> 
                <div>
                    <h4>Total Modules</h4>
                    <h1 class="big-icon ml-5"><?= count($modules) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <a href="moduleDetail" class="btn text-primary border border-primary">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Module</h5>
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
                <table id="moduleTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                            <th>Module Code</th>
                            <th data-filter-control="select">Module Name</th>
                            <th data-filter-control="select">Duration</th>
                            <th data-filter-control="select">Module Leader</th>
                            <th data-filter-control="select">Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modules as $module) { ?>
                            <tr>
                                <td><?= $module['module_code'] ?></td>
                                <td><?= $module['module_name'] ?></td>
                                <td><?= $module['module_duration'] ?></td>
                                <td><?= $module['firstname'] .' ' . $module['surname'] ?></td>
                                <td><?= $module['course_name'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="moduleDetail/<?php echo $module['module_code']; ?>" class="btn btn-success">Edit</a>
                                    <?php echo form_open('admin/module/'.$module['module_code'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                    <?php echo form_open('admin/module/'.$module['module_code'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#moduleTable').DataTable();
                        //  $('#moduleTable').bootstrapTable();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
