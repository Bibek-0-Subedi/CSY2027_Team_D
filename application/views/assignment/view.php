<?php if(($this->session->userdata('type')) == 3) {?>
    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Assignment</h2>
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
     <?php
            if (!empty($this->session->flashdata('graded'))) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $this->session->flashdata('archived'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('deleted'))) {?> 
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $this->session->flashdata('deleted'); ?>
            </div>
            <?php }?>
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
                                <td><a href="<?= site_url() ?>assets/assignment_submissions/<?= $assignment['assignment_file'] ?>" download="<?= $assignment['assignment_file'] ?>"><?= $assignment['assignment_file'] ?></a></td>
                                <td><?= $assignment['created_date'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <?php echo '<button  . data-id="'. $assignment['assignment_id'] .'" class="btn btn-info" data-toggle="modal"  data-target="#gradeStudent" >Grade</button>'; ?>
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

<!-- Modal for the Grading students -->
<div class="modal fade" id="gradeStudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Grade Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('tutor/module/assignment/view/'. $module_id)) ;?>
                    <div class="form-group">
                        <textarea style="display: none" class="form-control" name="assignment_id" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Grades</label>
                    
                         <select class="form-control col-sm-6" name='grade'>
                                <option value="">Choose</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                                <option value="B-">B-</option>
                                <option value="C+">C+</option>
                                <option value="C">C</option>
                                <option value="C-">C-</option>
                                <option value="D+">D+</option>
                                <option value="D">D</option>
                                <option value="D-">D-</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                        </select>
                    </div>
                    <input type="submit" class="btn uniBtn mx-sm-4" name="gradeStudent" value="Grade">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for the grading Student ends -->
<script>
    $(document).ready(function() {
        $('#assignmentTable').DataTable();
    });
    $('#gradeStudent').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var assignment_id = button.data('id') // Extract info from data-id attributes

        var modal = $(this)
        modal.find('.modal-body textarea').val(assignment_id)
        modal.find('.modal-body form').val(assignment_id)
    })

    function checkDelete() {
        return confirm('Do you really want to delete this File ?');
    }

</script>