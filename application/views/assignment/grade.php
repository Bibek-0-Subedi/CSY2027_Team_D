<?php if(($this->session->userdata('type')) == 3) {?>

<div class="container-fluid">
<?php echo form_open(base_url('tutor/module/assignment/grade/' . $id )) ;?>
        <div class="form-group col-md-4">
            <label>Grade</label>
             <select class="form-control col-sm-6" name='grade'>
                <option value="">Choose</option>
                <option value="A+">A+</option>
                <option value="A">A</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="B-">B-</option>
                <option value="C+">C+</option>
                <option value="C">C</option>
                <option value="C-">C-</option>
                <option value="D+">D+</option>
                <option value="D">D</option>
                <option value="D-">D-</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
            </select>
        </div>
        <button type="submit" class="btn uniBtn mx-sm-4" name="upload">Ok</button>
    </form>
   </div> 

<?php }

else {
    redirect('admin/login');
}?>  