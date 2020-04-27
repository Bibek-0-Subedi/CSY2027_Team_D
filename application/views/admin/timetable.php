<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
    <div class="row border-bottom my-2">
        <h2>Time Table</h2>
    </div>
        <!-- add Module button -->
        <div class="row mt-3 mb-5 bg-light py-4 rounded">
            <!-- <a href="staffDetail" class="btn btn-primary">Add Module</a> -->
            <div class="col-md-9 text-info pt-3 d-flex">
                <div class="large-icon px-4">
                    <i class="fas fa-calendar"></i>
                </div> 
                <div>
                    <h4>Total TimeTable</h4>
                    <h1 class="big-icon ml-5"><?= count($timetables) ?></h1>
                </div>
            </div>
            <div class="col-md-2">
              <button  class="btn text-primary border border-primary" data-target="#createTimetable" data-toggle="modal">
                  <div class="medium-icon px-5">
                      <i class="fa fa-user-plus"></i>
                  </div>    
                  <h5>Add Timetable</h5>
              </button>
          </div>
        </div>
        <!-- add module button  -->
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
           <?php }elseif (!empty($this->session->flashdata('created'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('created'); ?>
            </div>
        <?php } elseif (!empty($this->session->flashdata('deleted'))) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('deleted'); ?>
            </div>
        <?php } ?>
        <!-- end filter and search post  -->
        <!-- begin table structure -->
        <div class="row mt-3 ">
            <div class="container-fluid">
                <table id="timeTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead class="thead-light">
                        <tr>
                            <th data-filter-control="select">Routine Id</th>
                            <th data-filter-control="select">Year</th>
                            <th data-filter-control="select">Course</th>
                            <th style="width: 10%" data-filter-control="select">Time Table</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($timetables as $timetable) { ?>
                            <tr>
                                <td><?= $timetable['routine_id'] ?></td>
                                <td><?= $timetable['year'] ?></td>
                                <td><?= $timetable['course_name'] ?></td>
                                <td>
                                    <?php if($timetable['timetable']){?>
                                        <a href="timeTableView/<?php echo $timetable['routine_id']; ?>" class="btn btn-primary">View</a>
                                    <?php } else {?>
                                        <a href="createTimeTable/<?php echo $timetable['routine_id']; ?>" class="btn btn-success">Create</a>
                                        <?php } ?>
                                </td>
                                <td style="display: flex; justify-content: space-around;">
                                    <a href="editTimeTable/<?php echo $timetable['routine_id']; ?>" class="btn btn-success">Edit</a>
                                    <?php echo form_open('admin/timeTable/'.$timetable['routine_id'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                    <?php echo form_open('admin/timeTable/'.$timetable['routine_id'] ); ?>
                                        <input type="submit" class="btn btn-danger" name="delete" onclick="return checkDelete()" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#timeTable').DataTable();
                    });
                    function checkDelete(){
                        return confirm('Do you really want to delete this Time Table ?');
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Modal for the creating timetable -->
<div class="modal fade" id="createTimetable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Time Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/timeTable/') ?>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Year</label>
                    <input type="text" class="form-control col-sm-10" name="year">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Courses</label>
                    <select class="form-control col-sm-10 mr-3" name='course_name'>
                        <?php foreach ($courses as $course) { ?>
                            <option value="<?= $course['course_code'] ?>"><?= $course['course_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="createTimetable" value="Create Timetable">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
