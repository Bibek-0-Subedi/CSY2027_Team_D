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
        <!-- end staff button -->
        <?php
            if (!empty($this->session->flashdata('archived'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('archived'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('edited'))) {?> 
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('edited'); ?>
            </div>
            <?php }elseif (!empty($this->session->flashdata('added'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('added'); ?>
            </div>
            <?php }elseif (!empty($this->session->flashdata('cannotDelete'))) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('cannotDelete'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('deleted'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('deleted'); ?>
            </div>
        <?php } ?>
        <div class="row mt-4">
            <div class="col-lg-9 mb-4">
            <?php echo form_open('admin/course', ['class' => 'form-inline']); ?>
                    <select class="custom-select col-sm-2 mr-3" name='department_id'>
                        <option value="0" >Department</option>
                        <?php foreach ($department as $dpt) { ?>
                            <option value="<?= $dpt['department_id'] ?>" <?php if (isset($_POST['name']) && $_POST['name'] == $dpt['department_id']) echo "selected" ; ?>><?= $dpt['name'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-info my-2 my-sm-0 mr-2" type="submit" name="filter">Filter</button>
                    <a href="" class="btn btn-secondary my-2 my-sm-0" type="button">Clear</a>
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
                    <thead class="thead-light">
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
                                <td>
                                    <?php if ($course['course_leader']) {
                                            echo $course['firstname'] .' ' .$course['surname']  ;
                                    }else {
                                            echo "Not Assigned";
                                    } ?>
                                </td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="courseDetail/<?php echo $course['course_code']; ?>" class="btn btn-success">Edit</a>
                                    <?php echo form_open('admin/course/'.$course['course_code'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" onclick="return checkArchive()" value="Archive">
                                    </form>
                                    <?php echo form_open('admin/course/'.$course['course_code'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" onclick="return checkDelete()" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#courseTable').DataTable();
                    });
                    function checkDelete(){
                        return confirm('Do you really want to delete this Course ?');
                    }
                    function checkArchive(){
                        return confirm('Do you really want to archive this Course ?');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

