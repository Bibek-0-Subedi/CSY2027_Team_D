<?php
    include 'header.php';
    $userCheck = new Databasetable('staff');
    if(isset($_POST['Login'])){
        $userExist = $userCheck->find('email',$_POST['email']);
        $user = $userExist->fetch();
        if($user['type'] == 1){
            if($user['password'] == $_POST['password']){
                $_SESSION['adminSessionId'] = $user['staff_id'];
                header('Location:adminDash.php');
            }
            else{
                echo '<h1>Incorrect Password!</h1>';
            }
        }
        else if ($user['type'] == 2){
            if($user['password'] == $_POST['password']){
                $_SESSION['leaderSessionId'] = $user['staff_id'];
                header('Location:leaderDash.php');
            }
            else{
                echo '<h1>Incorrect Password!</h1>';
            }
        }   
        else if ($user['type'] == 3){
            if($user['password'] == $_POST['password']){
                $_SESSION['lecturerSessionId'] = $user['staff_id'];
                header('Location:lecturerDash.php');
            }
            else{
                echo '<h1>Incorrect Password!</h1>';
            }
        }   
    }

?>

<div class="container-fluid loginform">
    <form action="" method="POST">
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