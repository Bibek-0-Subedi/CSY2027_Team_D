
<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <div class="row bg-content">
            <h2> Student Record </h1>
        </div>
        <div class="row ml-4 mt-3 float-right">
            <a href="<?= site_url() ?>tutor/student" class="btn btn-primary"> Back </a>
        </div>
        <div class="row mt-3 ">
            <div class="container-fluid">
                <table id="studentTable" 
                        class="table table-striped  table-bordered table-hover" 
                        data-url="json/data1.json" 
                        data-filter-control="true">
                    <thead>
                        <tr>
                           <th>Module Code</th>  
                           <th data-filter-control="select">Firstname</th>
                            <th data-filter-control="select">Middlename</th>
                            <th data-filter-control="select">Surname</th>
                            <th data-filter-control="select">Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= $student['module_code'] ?></td>
                                <td><?= $student['firstname'] ?></td>
                                <td><?= $student['middlename'] ?></td>
                                <td><?= $student['surname'] ?></td>
                                <td><?= $student['email'] ?></td>
                                <td class=""style="display: flex; justify-content: space-around;">
                                    <a href="#" class="btn btn-primary">View Grade Record</a>
                                    <a href="#" class="btn btn-info">View Attendance Record</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#studentTable').DataTable();
                        //  $('#moduleTable').bootstrapTable();
                    });
                </script>
            </div>
        </div>
    </div>
</div>

       
