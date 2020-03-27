
<?php echo form_open(base_url('assignment/grade/' . $id )) ;?>
        <div class="form-group col-md-4">
            <label>Assignment Name</label>
            <input type="text" class="form-control" name="grade">

        </div>
 
        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Upload</button>
    </form>