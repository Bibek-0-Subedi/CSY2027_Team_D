
<div class="container mt-5">

<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h2 class=><?= $modules['module_name']; ?> Module</h1>
        </div>
        <!-- Upload Assignment Button -->
        <div class="row mt-3 float-right">
            <a href="<?= site_url() ?>tutor/module" class="btn btn-primary"> Back </a>
        </div>
         <div class="row mt-3">
            <a href="<?= site_url() ?>module/add/<?= $modules['module_code'] ?>" class="btn btn-primary"> Add Material </a>
        </div>
        <div class="row mt-3">
         <a href="<?= site_url().'module' ?>/attendance/<?= $modules['module_code'].'/'.date('Y-m-d') ?>" class="btn btn-primary ml-5">Take attendance</a>
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
                                 <td><a class="" href="<?= base_url('assets/module_files/' . $module_file['file']); ?>"><?= $module_file['file'] ?></a>
                                    <a class="pull-right mt-3" role="button" href="<?= site_url() ?>assets/module_files/<?= $module_file['file'] ?>">View</a></td>
                                <td><?= $module_file['filename'] ?></td>
                                <td><?= $module_file['created_at'] ?></td>
                                <td class=""style="display: flex; justify-content: space-around;">
                                    <a href="<?= site_url() ?>module/update/<?php echo $module_file['module_id']; ?>" class="btn btn-success">Edit</a>
                                    <!-- <?php echo form_open('admin/module/'.$module['module_code'] ); ?>
                                        <input type="submit" class="btn btn-info" name="archive" value="Archive">
                                    </form> -->
                                    <?php echo form_open('module/view/'.$module_file['file_id'] ); ?>
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
</div>

       
