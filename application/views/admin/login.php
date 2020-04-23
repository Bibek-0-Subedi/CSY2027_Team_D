<?php echo validation_errors(); ?>
<div class="container loginform mt-20 mb-20 col-md-4">
    <h2 class="text-center">Staff Login</h2>
    <?php echo form_open('admin/login',['class' => '']) ;?>
        <div class="form-group">
            <label>Username</label>
            <input type="email" class="form-control" name="email">
            <small class="form-text text-muted">Email Address provided by the University</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <a href="#" class="mx-sm-3">Forgot your Password</a><br><br>
        <button type="submit" class="btn uniBtn mx-sm-3" name="Login">Login</button>
    </form>
</div>