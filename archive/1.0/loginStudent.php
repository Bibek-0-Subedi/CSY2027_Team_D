<?php
    include 'header.php';
//    admin - adminSessionId CourseLeader leaderSessionId , lecturer lecturerSessionId, student studentSessionId

?>

    <!-- <p>this is test</p> -->
    <main>
        <form method="POST" class="loginform">
            <label>USERNAME</label><br>
            <input type="text" name="username"><br><br>
            <label>PASSWORD</label><br>
            <input type="text" name="password"><br><br>
            <a href="#">Forget Your Password</a><br><br>
            <input type="submit" name="Login" value="Login" class="loginButton">
        </form>
    </main>
    <?php
        include 'footer.php';
    ?>

