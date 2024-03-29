<?php echo validation_errors(); ?>
<div class="container-fluid loginform pl-sm-2 pr-sm-2 mt-5 mb-5">
    <h2>Student Login</h2>
    <?php echo form_open('students/login',['class' => 'pl-sm-2 pr-sm-2 mt-5 mb-5']) ;?>
        <div class="form-group col-md-3">
            <label>Username</label>
            <input type="email" class="form-control" name="email">
            <small class="form-text text-muted">Email Address provided by the University</small>
        </div>
        <div class="form-group col-md-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <a href="#" class="mx-sm-3">Forgot your Password</a><br><br>
        <button type="submit" class="btn uniBtn mx-sm-3" name="Login">Login</button>
    </form>
</div>