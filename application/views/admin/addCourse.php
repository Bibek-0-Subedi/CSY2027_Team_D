<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Course Detail</h2>
        <?php echo validation_errors(); ?>
        <!-- begin Course add form -->
        <?php echo form_open('admin/addCourse', ['class' => 'pl-sm-2 pr-sm-2 mt-4']) ;?>
            <div class="form-group row">
                <label for="Course Id" class="col-sm-2">Course Id</label><input type="text" class="form-control col-sm-1" name="course_code">
            </div>
           <div class="form-group row">
                <label for="Course Name" class="col-sm-2">Course Name</label><input type="text" class="form-control col-sm-2" name="course_name">
            </div>
            <div class="form-group row">
                <label for="Course Duration" class="col-sm-2">Course Duration</label><input type="text" class="form-control col-sm-2" name="course_duration">
            </div>
            <div class="form-group row">
                <label for="Department Id" class="col-sm-2">Department</label>
                <select class="form-control col-sm-2" name='department_id'>
                    <option value="" disabled selected>Select Department</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id'] ?>"><?= $department['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group row">
                <label for="Course Leader" class="col-sm-2">Course Leader</label>
                <select class="form-control col-sm-2" name='department_id'>
                    <option value="" disabled selected>Select Course Leader</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id'] ?>"><?= $department['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" name="add" value="Add Course" class=" btn btn-primary">
        </form>
        <!-- end Course add form -->
    </div>
</div>