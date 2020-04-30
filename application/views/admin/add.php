<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Student Detail Form</h2>
        </div>
        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <?php echo form_open('admin/add', ['class' => 'pl-sm-2 pr-sm-2 mt-4 row']) ;?>
            <div class="form-group col-md-6">
                <label for="firstname">Firstname</label><input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="Middlename">Middlename</label><input type="text" class="form-control" name="middlename">
            </div>
            <div class="form-group col-md-6">
                <label for="Surname">Surname</label><input type="text" class="form-control" name="surname">
            </div>
            <div class="form-group col-md-6">
                <label for="TemporaryAddress">Temporary Address</label><input type="text" class="form-control" name="tempAddress">
            </div>
            <div class="form-group col-md-6">
                <label for="PermanentAddress">Permanent Address</label><input type="text" class="form-control" name="permAddress">
            </div>
            <div class="form-group col-md-6">
                <label for="Contact">Contact Number</label><input type="text" class="form-control" name="contact">
            </div>
            <div class="form-group col-md-6">
                <label for="Email">Email</label><input type="text" class="form-control" name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="Qualification">Qualification</label><input type="text" class="form-control" name="qualification">
            </div>
            <!-- Select Will be used for  -->
            <div class="form-group col-md-6">
                <label for="CourseCode">Course Code</label>
                <select name="courseCode" class="form-control" name='courseCode'>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?= $course['course_code'] ?>"><?= $course['course_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <small class="text-muted">The student will be added to the admission list after submitting the form.</small>
                <input type="submit" name="add" value="Add Student" class="form-control btn btn-primary mt-2">
            </div>
        </form>
        <!-- end student add form -->
</div>