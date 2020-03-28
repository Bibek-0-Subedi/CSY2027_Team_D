<div class="container-fluid">
    <div class="pl-sm-2 pr-sm-2 mt-2">
        <h2 class="bg-content">Student Detail Form</h2>
        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <?php echo form_open('admin/add', ['class' => 'pl-sm-2 pr-sm-2 mt-4']) ;?>
            <div class="form-group row">
                <label for="firstname" class="col-sm-2">Firstname</label><input type="text" class="form-control col-sm-2" name="firstname">
            </div>
            <div class="form-group row">
                <label for="Middlename" class="col-sm-2">Middlename</label><input type="text" class="form-control col-sm-2" name="middlename">
            </div>
            <div class="form-group row">
                <label for="Surname" class="col-sm-2">Surname</label><input type="text" class="form-control col-sm-2" name="surname">
            </div>
            <div class="form-group row">
                <label for="TemporaryAddress" class="col-sm-2">Temporary Address</label><input type="text" class="form-control col-sm-3" name="tempAddress">
            </div>
            <div class="form-group row">
                <label for="PermanentAddress" class="col-sm-2">Permanent Address</label><input type="text" class="form-control col-sm-3" name="permAddress">
            </div>
            <div class="form-group row">
                <label for="Contact" class="col-sm-2">Contact Number</label><input type="text" class="form-control col-sm-3" name="contact">
            </div>
            <div class="form-group row">
                <label for="Email" class="col-sm-2">Email</label><input type="text" class="form-control col-sm-3" name="email">
            </div>
            <div class="form-group row">
                <label for="Qualification" class="col-sm-2">Qualification</label><input type="text" class="form-control col-sm-3" name="qualification">
            </div>
            <!-- Select Will be used for  -->
            <div class="form-group row">
                <label for="CourseCode" class="col-sm-2">Course Code</label>
                <select name="courseCode" class="form-control col-sm-2" name='courseCode'>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?= $course['course_code'] ?>"><?= $course['course_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="add" value="Add Student" class=" btn btn-primary">
        </form>
        <!-- end student add form -->
    </div>
</div>