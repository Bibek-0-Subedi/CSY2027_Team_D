<div class="container-fluid mx-3">
    <!-- <div class="mt-2"> -->
        <div class="row border-bottom my-2">
            <h2>Announcements</h2>
        </div>
        <?php echo validation_errors(); ?>
        <!-- begin student add form -->
        <div class="row">
        <?php echo form_open('admin/addAnnouncement', ['class' => 'pl-sm-2 pr-sm-2 mt-4 col-md-5']) ;?>
        <h4 class="mb-4">Create an Announcement</h4>
            <div class="form-group">
                <label for="title">Title</label><input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <small class="text-muted">This announcement will be sent to all the staff and students of the university.</small>
                <input type="submit" name="add" value="Create Announcement" class="form-control btn btn-primary mt-2">
            </div>
        </form>
        <div class="col-md-1"></div>
            <div class="notifs col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">Created Announcements</h5>    
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php foreach ($announcements as $announcement) { ?>
                        <li class="list-group-item">
							<h5><?= $announcement['title'] ?></h5>
							<p><?= $announcement['content'] ?></p>
							<p>By : Administrator</p>

                            <p>Date: <?= $announcement['created_at'] ?></p>
                            <a href="deleteAnnouncement/<?= $announcement['id'] ?>" class="btn btn-danger text-white pull-right">Delete</a>
                        </li>
                    <?php } 
                        if(count($announcements) == 0){ ?>
                            <li class="list-group-item">No Announcements</li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
</div>