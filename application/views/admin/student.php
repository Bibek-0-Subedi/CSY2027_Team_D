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
            <a href="studentDetail" class="btn text-primary border border-primary">
                <div class="medium-icon px-5">
                    <i class="fa fa-user-plus"></i>
                </div>
                <h5>Add Student</h5>
            </a>
        </div>
    </div>
    <!-- end add Student button  -->
    <?php
    if (!empty($this->session->flashdata('archived'))) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('archived'); ?>
        </div>
    <?php } elseif (!empty($this->session->flashdata('edited'))) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('edited'); ?>
        </div>
    <?php } elseif (!empty($this->session->flashdata('added'))) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('added'); ?>
        </div>
    <?php } elseif (!empty($this->session->flashdata('assigned'))) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('assigned'); ?>
        </div>
    <?php } ?>

    <div class="row my-4">
        <div class="col-lg-7 ml-n3">
            <?php echo form_open('admin/student/', ['class' => 'form-inline']); ?>
            <select class="custom-select col-sm-2 mr-2" name="status">
                <option value="3" <?php if (!isset($_POST['status'])) echo "selected"; ?>>Status</option>
                <option value="1" <?php if (isset($_POST['status']) && $_POST['status'] == 1) echo "selected"; ?>>Active</option>
                <option value="0" <?php if (isset($_POST['status']) && $_POST['status'] == 0) echo "selected"; ?>>Dormant</option>
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
            <table id="studentTable" class="table table-striped  table-bordered table-hover" data-url="json/data1.json" data-filter-control="true">
                <thead class="thead-light">
                    <?php
                    $tableHead = ['Id', 'Assigned Id', 'Status', 'Full Name', 'Address', 'Contact', 'Course', 'Email', 'Qualification', 'Pat Tutor', 'Action'];

                    foreach ($tableHead as $tableHeading) {
                        echo '<th>' . $tableHeading . '</th>';
                    }
                    echo '</thead>';
                    
                    foreach ($students as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['admission_id'] . '</td>';
                        if (empty($row['assigned_id'])) {
                            echo '<td><a href="casefile/' . $row["admission_id"] . '">Create Id</a></td>';
                        } else {
                            echo '<td>' . $row['assigned_id'] . '</td>';
                        }
                        $status = ($row['status'] == 1) ? 'Live' : 'Dormant';
                        echo '<td>' . $status . '</td>';
                        echo '<td>' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['surname'] . '</td>';
                        echo '<td>' . $row['permanent_address'] . '</td>';
                        echo '<td>' . $row['contact'] . '</td>';
                        echo '<td>' . $row['course_name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['qualification'] . '</td>';
                        echo '<td>';
                        if ($row['pat_tutor'] == 0) {
                            echo '<button  . data-id="' . $row['student_id'] . '" class="btn btn-secondary" data-toggle="modal"  data-target="#assignPatTutor" >Assign</button>';
                        } else {
                            echo $row['tfname'] .' ' .$row['tsname'];
                            echo '<br>';
                            echo '<button  . data-id="' . $row['student_id'] . '" class="btn btn-secondary" data-toggle="modal"  data-target="#assignPatTutor" >Re Assign</button>';
                        }
                        echo '</td>';
                        echo '<td style="display: flex; justify-content: space-around;">';
                        echo '<a href="studentDetail/' . $row['student_id'] . '" class="btn btn-success">Edit</a>';
                        echo form_open('admin/student/' . $row['student_id']);
                        echo  '<input type="submit" class="btn btn-info" name="archive" onclick="return checkArchive()" value="Archive">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
            </table>

        </div>
    </div>
    <!-- </div> -->
</div>

<!-- Modal for the Assigning PatTutor -->
<div class="modal fade" id="assignPatTutor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Pat Tutor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/student/') ?>
                    <div class="form-group">
                        <textarea style="display: none" class="form-control" name="student_id" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Tutors</label>
                        <select class="form-control col-sm-6 mr-3" name='pat_tutor'>
                            <?php foreach ($tutors as $tutor) { ?>
                                <option value="<?= $tutor['staff_id'] ?>"><?= $tutor['firstname'] .' ' .$tutor['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="assignPatTutor" value="Assign">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for the assigning PatTutor ends -->
<script>
    $(document).ready(function() {
        $('#studentTable').DataTable();
    });
    $('#assignPatTutor').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('id') // Extract info from data-id attributes

        var modal = $(this)
        modal.find('.modal-body textarea').val(student_id)
    })

    function checkDelete() {
        return confirm('Do you really want to delete this Student Info ?');
    }

    function checkArchive() {
        return confirm('Do you really want to Archive this Student Info ?');
    }
</script>