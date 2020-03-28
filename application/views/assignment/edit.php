<?php if(($this->session->userdata('type')) == 3) {?>
<h2> EDIT ASSIGNMENT -FROM HERE- </h2>

<?php echo form_open(base_url('assignment/edit/' . $id )) ;?>
        <div class="form-group col-md-4">
            <label>Assignment Name</label>
            <input type="text" class="form-control" name="name">

        </div>
 
        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>

 <?php } 

else {
	echo "not a tutor should redirect using redirect function";
}?>	

