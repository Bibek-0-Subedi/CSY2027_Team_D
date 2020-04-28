<?php if(($this->session->userdata('type')) == 3) {?>
<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h3>Assignment</h3>
        </div>
        <!-- Assignment Back Button -->
        <!-- <div class="row mt-3 float-right">
            <a href="<?= site_url() ?>assignment/index" class="btn btn-primary "> <-Back</a>
        </div> -->
        <div class="row mt-4">
            <div class="col-lg-9 ml-n3">
                <form class="form-inline" method="POST">
                    <select class="custom-select mr-sm-2">
                        <option selected>Module</option>`
                        <option value="Module1">Level 4</option>
                        <option value="Module2">Level 5</option>
                    </select>
                    <select class="custom-select mr-sm-2">
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
                <table id="assignmentTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                           <th>Module Code</th>  
                            <th data-filter-control="select">Grade</th>
                            <th data-filter-control="select">Student Id</th>
                            <th data-filter-control="select">Assignment File</th>
                            <th data-filter-control="select">Submission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignments as $assignment) { ?>
                            <tr>
                                <td><?= $assignment['module_code'] ?></td>
                                <td><?= $assignment['grade'] ?></td>
                                <td><?= $assignment['student_id'] ?></td>
                                <td><?= $assignment['assignment_file'] ?></td>
                                <td><?= $assignment['created_date'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="<?= site_url(). 'tutor/module'?>/assignment/grade/<?= $assignment['module_code'] ?>/<?= $assignment['assignment_id']; ?>" class="btn btn-info">Grade</a>
                                    <?php echo form_open('tutor/module/assignment/view/'. $assignment['module_code'] .'/'.$assignment['assignment_id'] ); ?>
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

