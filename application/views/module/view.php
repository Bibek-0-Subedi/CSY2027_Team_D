<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h2 class=><?= $modules['module_name']; ?> Module</h1>
        </div>
        <!-- Upload Assignment Button -->
        <div class="row mt-3">
            <a href="<?= site_url() .'tutor/' ?>module/add/<?= $modules['module_code'] ?>" class="btn btn-primary"> Add Material </a>
        </div>
        <div class="row mt-3">
         <a href="<?= site_url().'tutor/module' ?>/attendance/<?= $modules['module_code'].'/'.date('Y-m-d') ?>" class="btn btn-primary ml-5">Take attendance</a>

        <a class="btn btn-primary ml-5" href="<?= site_url(). 'tutor/module' ?>/assignment/index/<?=$modules['module_code']?>">View Assignment</a>
        <a class="mb-2" href="<?= site_url(). 'tutor/module' ?>/studentList/<?= $modules['module_code'] ?>"> View Student</a>
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
                                    <a href="<?= site_url() ?>tutor/module/update/<?php echo $modules['module_code']; ?>/<?php echo $module_file['file_id']; ?>" class="btn btn-success">Edit</a>
                                    <?php if($module_file['archive'] == '0'){ ?>
                                    <?php echo form_open('tutor/module/'. $modules['module_code'] . '/' . $module_file['file_id'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form>
                                    <?php } else { echo form_open('tutor/module/'. $modules['module_code'] . '/' . $module_file['file_id'] ); ?>
                                        <input type="submit" class="btn btn-info" name="unarchive" value="Unarchive">
                                    </form>
                                     <?php } ?>
                                    <?php echo form_open('tutor/module/'. $modules['module_code'] . '/' . $module_file['file_id'] ); ?>
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

<?php }

else {
    redirect('admin/login');
}?>

       
