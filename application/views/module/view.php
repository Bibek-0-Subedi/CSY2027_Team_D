<?php if(($this->session->userdata('type')) == 3) {?>

    <div class="container-fluid mx-3">
        <div class="row border-bottom my-2">
            <h2><?= $modules['module_name']; ?> Materials</h2>
        </div>
    <!-- Upload Assignment Button -->
    <div class="row mt-5 mb-5">
        <a href="<?= site_url() .'tutor/' ?>module/add/<?= $modules['module_code'] ?>" class="btn btn-outline-primary big-icon mr-3 px-5"> 
            <i class="fa fa-plus"></i>
            <h5>Add Material</h5>
        </a>
        <a href="<?= site_url().'tutor/module' ?>/takeAttendance/<?= $modules['module_code'].'/'.date('Y-m-d') ?>" class="btn btn-outline-primary big-icon mr-3 px-5">
            <i class="fa fa-list-alt"></i>
            <h5>Take attendance</h5>
        </a>
        <a class="btn btn-outline-primary big-icon mr-3 px-5" href="<?= site_url(). 'tutor/module' ?>/assignment/index/<?=$modules['module_code']?>">
            <i class="fa fa-folder"></i>
            <h5>View Assignment</h5>
        </a>
        <a class="btn btn-outline-primary big-icon mr-3 px-5" href="<?= site_url(). 'tutor/module' ?>/studentList/<?= $modules['module_code'] ?>"> 
            <i class="fas fa-user-graduate"></i>
            <h5>View Student</h5>
        </a>
    </div>
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
                        <th data-filter-control="select">Description</th>
                        <th data-filter-control="select">File</th>
                        <th data-filter-control="select">Week/Title</th>
                        <th data-filter-control="select">Posted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($module_files as $module_file) { ?>
                        <tr>
                            <td><?= $module_file['module_id'] ?></td>
                            <td><?= $module_file['description'] ?></td>
                                <td><a class="" href="<?= site_url() ?>assets/module_files/<?= $module_file['file'] ?>" download="<?= $module_file['filename'] ?>"><?= $module_file['file'] ?></a>
                            <td><?= $module_file['filename'] ?></td>
                            <td><?= $module_file['created_at'] ?></td>
                            <td class=""style="display: flex; justify-content: space-around;">
                                <a href="<?= site_url() ?>tutor/module/update/<?php echo $module_file['file_id']; ?>" class="btn btn-success mr-2">Edit</a>
                                <?php if($module_file['archive'] == '0'){ ?>
                                <?php echo form_open('tutor/module/'.$module_file['file_id'] ); ?>
                                    <input type="submit" class="btn btn-info mr-2" name="archive" value="Archive">
                                </form>
                                <?php } else { echo form_open('tutor/module/'.$module_file['file_id'] ); ?>
                                    <input type="submit" class="btn btn-info mr-2" name="unarchive" value="Unarchive">
                                </form>
                                    <?php } ?>
                                <?php echo form_open('tutor/module/'.$module_file['file_id'] ); ?>
                                    <input type="submit" class="btn btn-danger mr-2" name="delete" value="Delete">
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

<?php }

else {
    redirect('admin/login');
}?>

       
