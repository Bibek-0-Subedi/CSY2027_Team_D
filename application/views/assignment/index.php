<?php if(($this->session->userdata('type')) == 3) {?>
    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2>Assignment</h2>
        </div>
    <!-- Upload Assignment Button -->
    <div class="mt-3">
        <a href="<?= site_url(). 'tutor/module' ?>/assignment/view/<?= $modules['module_code'] ?>" class="btn btn-outline-primary big-icon mr-3 px-5">
            <i class="fa fa-folder"></i>
            <h5>View Uploaded Assignments</h5>
        </a>
        <a href="<?= site_url(). 'tutor/module' ?>/assignment/add/<?= $modules['module_code'] ?>" class="btn btn-outline-primary big-icon mr-3 px-5">
            <i class="fa fa-plus"></i>
            <h5>Upload Assignment</h5>
        </a>
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
                                <a href="<?= site_url(). 'tutor/module' ?>/assignment/edit/<?= $assignment['file_id']; ?>" class="btn btn-success mr-2">Edit</a>
                                <?php if($assignment['archive'] == '0'){ ?>
                                <?php echo form_open('tutor/module/assignment/index/'.$assignment['file_id'] ); ?>
                                    <input type="submit" class="btn btn-info mr-2" name="archive" value="Archive">
                                </form>
                                <?php } else { echo form_open('tutor/module/assignment/index/'.$assignment['file_id'] ); ?>
                                    <input type="submit" class="btn btn-info mr-2" name="unarchive" value="Unarchive">
                                </form>
                                    <?php } ?>
                                <?php echo form_open('tutor/module/assignment/index/'.$assignment['file_id'] ); ?>
                                    <input type="submit" class="btn btn-danger mr-2" name="delete" value="Delete">
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

<?php }

else {
    redirect('admin/login');
}?>
