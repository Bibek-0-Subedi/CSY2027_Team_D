<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Staff</h2>
    </div>
        <!-- add staff button -->
        <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Staff</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-user-tie"></i>
                </div> 
                <div>
                    <h4>Total Staffs</h4>
                    <h1 class="big-icon ml-5"><?= count($staff) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <a href="staffDetail" class="btn text-primary border border-primary">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Staff</h5>
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
                <table id="staffTable" class="table table-striped  table-bordered table-hover" data-url="json/data1.json" data-filter-control="true">
                    <thead>
                        <tr>
                            <th>Staff Id</th>
                            <th data-filter-control="select">Status</th>
                            <th data-filter-control="select">Full Name</th>
                            <!-- <th data-filter-control="select">Address</th> -->
                            <!-- <th data-filter-control="select">Contact</th> -->
                            <th data-filter-control="select">Email</th>
                            <th data-filter-control="select">Subject</th>
                            <th data-filter-control="select">Role</th>
                            <th data-filter-control="select">Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff as $staff) { ?>
                            <tr>
                                <td><?= $staff['staff_id'] ?></td>
                                <td>
                                    <?php if ($staff['status']) {
                                        echo "Active";
                                    } else {
                                        echo "Dormant";
                                    }
                                    ?>
                                </td>
                                <td><?= $staff['firstname'].' '.$staff['middlename'].' '.$staff['surname'] ?></td>
                                <!-- <td><?= $staff['address'] ?></td> -->
                                <!-- <td><?= $staff['contact'] ?></td> -->
                                <td><?= $staff['email'] ?></td>
                                <td>
                                    <?php if ($staff['subject']) {
                                            echo $staff['course_name'];
                                    } elseif ($staff['role'] != 1) { ?>
                                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-id="<?= $staff['staff_id'] ?>" data-target="#assignCourse">Assign</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($staff['role']) {
                                        case '1':
                                            echo "Admin";
                                            break;
                                        case '2':
                                            echo "Course Leader";
                                            break;
                                        case '3':
                                            echo "Tutor";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $staff['approval'] ?></td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="staffDetail/<?php echo $staff['staff_id']; ?>" class="btn btn-success mr-2">Edit</a>
                                    <?php echo form_open('admin/staff/' . $staff['staff_id']); ?>
                                    <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#staffTable').DataTable();
                        //  $('#staffTable').bootstrapTable();
                    });
                </script>
            </div>
        </div>
    <!-- </div> -->
</div>
<!-- Modal for the Assigning Course  -->
<div class="modal fade" id="assignCourse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Course Leader</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('admin/staff/')?>
                <div class="form-group">
                    <textarea style="display: none" class="form-control" name="staff_id" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Courses:</label>
                    <select class="form-control col-sm-6 mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='subject'>
                        <?php foreach ($course as $crse) { ?>
                            <option value="<?= $crse['course_code'] ?>"><?= $crse['course_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="assignCourse" value="Assign">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for the assigning course  ends -->
<!-- Modal for the Assigning Module Leader -->
<div class="modal fade" id="assignModule" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Module Leader</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('admin/staff/')?>
                <div class="form-group">
                    <textarea style="display: none" class="form-control" name="staff_id" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Courses:</label>
                    <select class="form-control col-sm-6 mr-3 <?php echo form_error('course_code') ? 'is-invalid' : '' ?>" name='subject'>
                        <?php foreach ($module as $mod) { ?>
                            <option value="<?= $mod['module_code'] ?>"><?= $mod['module_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="assignModule" value="Assign">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for the assigning cousrse leader ends -->
<script>
    $('#assignCourse').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var staff_id = button.data('id') // Extract info from data-id attributes

        var modal = $(this)
        modal.find('.modal-body textarea').val(staff_id)
    })
</script>