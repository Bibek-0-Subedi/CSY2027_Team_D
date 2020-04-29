<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Announcements</h2>
        </div>
        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <?php echo form_open('tutor/addAnnouncement', ['class' => 'pl-sm-2 pr-sm-2 mt-4 row']) ;?>
            <div class="form-group col-md-7">
                <label for="title">Title</label><input type="text" class="form-control" name="title">
            </div>
            <div class="form-group col-md-7">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" rows="10"></textarea>
            </div>
            <div class="form-group col-md-7">
                <label for="module">Module</label>
                <select name="module" id="module" class="form-control">
                    <?php foreach ($modules as $module) { ?>
                        <option value="<?= $module['module_code'] ?>"><?= $module['module_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-7">
                <small class="text-muted">This announcement will be sent to all the staff and students of the university.</small>
                <input type="submit" name="add" value="Create Announcement" class="form-control btn btn-primary mt-2">
            </div>
        </form>
</div>