
    <div class="container-fluid">
        <div class="pl-sm-2 pr-sm-2 mt-2">
            <div class="row">
                <h3>Student Case File</h3>
            </div>
            <div class="row mt-1">
                <div class="container-fluid">
                    <div class="row">
                        <!-- begin left container form  -->
                        <div class="col-lg-5 form-container">
                            <h4 class="mt-3">Student Detail</h4>
                            <h5>Name : <?= $firstname.' '.$middlename.' '.$surname ?></h5>
                            <h5>Applied Course : <?= $course_name ?></h5>
                            <h5>Contact : <?= $contact ?></h5>
                            <h5>Email : <?= $email ?></h5>
                            <form action="" method="POST" class="mt-4 h5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="offer" value="unconditional">
                                    <label class="form-check-label">Unconditional Offer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="offer"  value="conditional" checked>
                                    <label class="form-check-label">Conditional Offer</label>
                                </div>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal">Create Case File</button>
                                </div>
                            </form>
                            <div class="mt-2">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#emailDraft" >Send Offer Letter</button>
                            </div>
                        </div>
                        <!-- end left container form  -->
                        <!-- begin right container preview pane  -->
                        <div class="col-lg-7 preview-container">
                            <h4 class="mt-3">Preview Pane</h4>
                            <h5>Documents to be submitted by the Students</h5>
                            <ul>
                                <li>High School Certificate</li>
                                <li>Recommendation Letter</li>
                                <li>Statement of Purpose</li>
                            </ul>
                            <form action="" method="post" enctype='multipart/form-data'>
                                <div class="form-group bg-content p-2">
                                    <label>Upload Student Documents </label>
                                    <input type="file" class="form-control-file" name="studentDoc">
                                    <small class="form-text text-muted">Upload Above Mentioned documents with renamed hs,re and sop respectively</small>
                                    <input type="submit" name="upload" value="Upload" class="btn-primary">
                                </div>
                            </form>
                            <!-- begin preview window  -->
                             <div style="border: 2px solid whitesmoke; min-height: 53vh;">
                                 Preview of the document to be displayed
                             </div>   
                            <!-- end preview window  -->
                        </div>
                        <!-- end right container preview pane  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <?php 
    //include 'adminFooter.php';
?>
<!-- begin Modal for Email Draft  -->
<div class="modal fade" id="emailDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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