<?php if(($this->session->userdata('type')) == 3) {?>
<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h3>Assignment</h3>
        </div>
        <!-- Upload Assignment Button -->
        <div class="row mt-3 float-right">
            <a href="<?= site_url(). 'module' ?>/assignment/view/<?= $modules['module_code'] ?>" class="btn btn-primary">View Uploaded Assignments</a>
        </div>
        <div class="row mt-3">
            <a href="<?= site_url(). 'module' ?>/assignment/add/<?= $modules['module_code'] ?>" class="btn btn-primary"> Upload Assignment </a>
        </div>
       <!--  <div class="row mt-4">
            <div class="col-lg-9 ml-n3">
                <form class="form-inline" method="POST">
                    <select class="custom-select mr-sm-2">
                        <option selected>Module</option>
                        <option value="1">Level 4</option>
                        <option value="2">Level 5</option>
                    </select>
                    <select class="custom-select mr-sm-2">
                        <option selected>Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                    </select>
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="filter">Filter</button>
                </form>
            </div>
        </div> -->
        <!-- end filter and search post  -->
        <!-- begin table structure -->
        <div class="row mt-3 ">
            <div class="container-fluid">
                <table id="assignmentTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                           <th>File Id</th>  
                           <th data-filter-control="select">Assignment Name</th>
                            <th data-filter-control="select">Deadline</th>
                            <th data-filter-control="select">Assignment File</th>
                            <th data-filter-control="select">Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignments as $assignment) { ?>
                            <tr>
                                <td><?= $assignment['file_id'] ?></td>
                                <td><?= $assignment['filename'] ?></td>
                                <td><?= $assignment['description'] ?></td>
                                <td><a href="<?= site_url() ?>assets/module_files/<?= $assignment['file'] ?>" download="<?= $assignment['file'] ?>"><?= $assignment['file'] ?></a></td>
                                <td><?= $assignment['created_at'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="<?= site_url(). 'module' ?>/assignment/edit/<?= $assignment['file_id']; ?>" class="btn btn-success">Edit</a>
                                    <?php if($assignment['archive'] == '0'){ ?>
                                    <?php echo form_open('module/assignment/index/'.$assignment['file_id'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                    <?php } else { echo form_open('module/assignment/index/'.$assignment['file_id'] ); ?>
                                        <input type="submit" class="btn btn-info" name="unarchive" value="Unarchive">
                                    </form>
                                     <?php } ?>
                                    <?php echo form_open('module/assignment/index/'.$assignment['file_id'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#assignmentTable').DataTable();
                        //  $('#moduleTable').bootstrapTable();
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<?php }

else {
    redirect('admin/login');
}?>
