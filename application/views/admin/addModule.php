<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Module Detail</h2>
        <?php echo validation_errors(); ?>
        <!-- begin Module add form -->
        <?php echo form_open('admin/addModule', ['class' => 'pl-sm-2 pr-sm-2 mt-4']) ;?>
            <div class="form-group row">
                <label for="Module Code" class="col-sm-2">Module Code</label><input type="text" class="form-control col-sm-1" name="module_code">
            </div>
           <div class="form-group row">
                <label for="Module Name" class="col-sm-2">Module Name</label><input type="text" class="form-control col-sm-2" name="module_name">
            </div>
            <div class="form-group row">
                <label for="Course Duration" class="col-sm-2">Module Duration</label><input type="text" class="form-control col-sm-2" name="module_duration">
            </div>
            <div class="form-group row">
                <label for="Module Leader" class="col-sm-2">Module Leader</label>
                <select class="form-control col-sm-2" name='module_leader'>
                    <option value="" disabled selected>Select Module Leader</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id'] ?>"><?= $department['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group row">
                <label for="Course" class="col-sm-2">Course</label>
                <select class="form-control col-sm-2" name='course_code'>
                    <option value="" disabled selected>Select Course</option>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?= $course['course_code'] ?>"><?= $course['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" name="add" value="Add Module" class=" btn btn-primary">
        </form>
        <!-- end Module add form -->
    </div>
</div>