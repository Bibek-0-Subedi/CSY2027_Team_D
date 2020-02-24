<?php
    include 'header.php';

//    admin - adminSessionId CourseLeader leaderSessionId , lecturer lecturerSessionId, student studentSessionId
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

    <main>
        <form action="" method="POST" class="loginform">
            <label>USERNAME</label><br>
            <input type="text" name="email"><br><br>
            <label>PASSWORD</label><br>
            <input type="text" name="password"><br><br>
            <a href="#">Forget Your Password</a><br><br>
            <input type="submit" name="Login" value="Login" class="loginButton">
        </form>
    </main>
    <?php
        include 'footer.php';
    ?>

