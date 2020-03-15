<?php
    include 'header.php';
    if(isset($_POST['Login'])){
        $stmt = $pdo->prepare("SELECT * FROM staff WHERE email = :email");
        $criteria = [
            'email' => $_POST['email']
        ];
        $stmt->execute($criteria);
        $user = $stmt->fetch();
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
    <form>
    <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Username</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Email Address provided by the University</small>
    </div>
    <div class="form-group col-md-3">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <a href="#" class="mx-sm-3">Forgot your Password</a><br><br>
    <button type="submit" class="btn uniBtn mx-sm-3" >Login</button>
    </form>
</div>