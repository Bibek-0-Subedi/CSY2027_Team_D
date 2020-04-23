<div class="container-fluid mx-3">
    <div class="row border-bottom my-2">
        <h2>Student Case File</h2>
    </div>
    <div class="row mt-1">
        <div class="container-fluid">
            <div class="row">
                <!-- begin left container form  -->
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center mb-3"><h5 class="m-0">Student's Detail</h5></div>
                    <div class="large-icon card-img-top text-center px-4">
                        <div class="d-inline-flex p-5 rounded-circle bg-secondary">
                            <i class="fas fa-user text-light mx-1"></i>
                        </div> 
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $firstname.' '.$middlename.' '.$surname ?></h5>
                        <p class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Applied Course : <?= $course_name ?></li>
                            <li class="list-group-item">Contact : <?= $contact ?></li>
                            <li class="list-group-item">Email : <?= $email ?></li>
                        </p>
                        <div>
                            <div class="custom-control custom-radio mb-3">
                                <input class="custom-control-input" type="radio" name="offer" value="unconditional" id="unconditional">
                                <label class="custom-control-label" for="unconditional">Unconditional Offer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="offer"  value="conditional" id="conditional" checked>
                                <label class="custom-control-label" for="conditional">Conditional Offer</label>
                            </div>
                        </div>
                        <?php $disable = ($status == 1) ? 'disabled' : ''; ?>
                        <form action="<?= site_url() ?>admin/createCaseFile/<?= $admission_id ?>" method="post">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100 mb-3" <?= $disable ?>>Create Case File</button>
                                <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#emailDraft">Create Case File</button> -->
                            </div>
                        </form>
                        <?php $disable2 = ($status != 1) ? 'disabled' : ''; ?>
                        <div class="mt-2">
                                <button type="button" class="btn btn-primary w-100 mb-3" data-toggle="modal" <?= $disable2 ?>>Send Offer Letter</button>
                        </div>
                    </div>
                </div>
            </div>
                <!-- end left container form  -->
                <!-- begin right container preview pane  -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Preview Pane</div>
                        <div class="card-body">
                            <h5 class="mb-4 mt-3">Documents to be submitted by the Students</h5>
                            <div class="w-50">
                                <ul class="list-group">
                                    <li class="list-group-item">High School Certificate</li>
                                    <li class="list-group-item">Recommendation Letter</li>
                                    <li class="list-group-item">Statement of Purpose</li>
                                </ul>
                            </div>
                            <div class="bg-light mt-3 p-3">
                                <form action="" method="post" enctype='multipart/form-data'>
                                    <div>Upload Student Documents </div>
                                    <div class="input-group p-2">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="studentDoc"  id="cvsUplaod">
                                            <label class="custom-file-label" for="cvsUplaod">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Upload Above Mentioned documents with renamed hs,re and sop respectively</small>
                                    <input type="submit" name="upload" value="Upload" class="btn btn-outline-primary mt-3">
                                </form>
                            </div>
                            <div class="mt-3 p-2">
                                <h5>Preview of the document to be displayed</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end right container preview pane  -->
            </div>
        </div>
    </div>
</div>
    
 <?php 
    //include 'adminFooter.php';
?>
<!-- begin Modal for Email Draft  -->
<div class="modal fade" id="emailDraft" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Offer Letter Draft</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- begin offer letter draft  -->
           <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Offer Letter</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit, 
                        amet consectetur adipisicing 
                        elit. Ducimus officiis 
                        laboriosam autem voluptates sint veniam consequuntur 
                        maxime neque sapiente qui! Architecto
                        exercitationem laborum culpa sint
                        commodi deserunt possimus quaerat. Et?
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        <!-- end offer letter draft  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send & Print</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal for Email Draft  -->