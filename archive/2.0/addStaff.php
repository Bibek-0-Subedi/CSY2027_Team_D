<?php 
    include 'adminHeader.php';
?>
    <div class="row pl-sm-2 pr-sm-2 mt-2">
        <div class="container-fluid">
            <h2 class="bg-content">Staff Detail Form</h2>
            <!-- begin student add form -->
            <form action="" method="POST" class="pl-sm-2 pr-sm-2 mt-4">
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
                    <label for="Address" class="col-sm-2">Address</label><input type="text" class="form-control col-sm-3" name="Address">
                </div>
                <div class="form-group row">
                    <label for="Contact" class="col-sm-2">Contact Number</label><input type="text" class="form-control col-sm-3" name="contact">
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-sm-2">Email</label><input type="text" class="form-control col-sm-3" name="email">
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2">Role</label>
                    <select class="custom-select col-sm-3 mr-sm-2">
                        <option selected>Choose..</option>
                        <option value="Course Leader">Course Leader</option>
                        <option value="Module Tutor">Module Tutor</option>
                        <option value="Personal Tutor">Personal Tutor</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="Subject" class="col-sm-2">Specialist Subject</label>
                    <select class="custom-select col-sm-3 mr-sm-2">
                        <option selected>Choose..</option>
                        <option value="Database">Database</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Networking">Networking</option>
                        <option value="Software Development">Software Development</option>
                    </select>
                </div>
                
                <input type="submit" name="add" value="Add Staff" class=" btn btn-primary">
            </form>
            <!-- end student add form -->
        </div>
    </div>   
</div>