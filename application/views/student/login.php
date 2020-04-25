<div class="container loginform mt-20 mb-20 col-md-3" style="min-height: 450px; margin-top: 100px">
    <h2 class="text-center" style=" margin-bottom: 30px">Student Login</h2>
    <span style="color: red"><?php echo $this->session->flashdata('invalid');?></span>
    <?php echo form_open('admin/login',['class' => '']) ;?>
        <div class="form-group">
            <label class="h4">Username</label>
            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <small class="form-text text-muted">Email Address provided by the University</small>
            <span style="color: red"><?= form_error('email')?></span>
        </div>
        <div class="form-group">
            <label class="h4">Password</label>
            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <span style="color: red"><?= form_error('password')?></span>
        </div>
        <a href="#" class="">Forgot your Password</a><br><br>
        <button type="submit" class="btn uniBtn" name="Login">Login</button>
    </form>
</div>