<?php 
    include 'header.php';
?>
    <div class="container-fluid" style="height: 85vh;">
        <div class="row mt-2">
            <div class="container-fluid">
                <div class="row">
                    <!-- begin first column -->
                    <div class="col-lg-5 bg-dark">
                        first column
                    </div>
                    <!-- end first column -->
                    <!-- begin second column -->
                    <div class="col-lg-4 bg-success">
                        second column
                    </div>
                    <!-- end second column -->
                    <!-- begin third column -->
                    <div class="col-lg-3 bg-dark p-3">
                        <div class="row ml-auto mr-auto">
                            <a class="btn btn-primary" href="loginStaff.php" role="button">Staff Login</a>
                        </div>
                        <div class="row mt-4 ml-auto">
                            <a class="btn btn-primary" href="loginStudent.php" role="button">Student Login</a>
                        </div>
                    </div>
                    <!-- end third column -->
                </div>
            </div>
        </div>
    </div>

<?php 
    include 'footer.php';
?>