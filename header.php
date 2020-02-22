<?php
    session_start();
?>
<html>
    <head>
		<title>Woodland University</title>
		 <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
    <body>
        <div id="datebar">
            <div>11:11:11 Feb 09 2020</div>
            <div><a href="loginStudent.php">Login</a></div>
        </div>
        <div id="nav">
            <div id="navlogo">
                <img src="Images/logo.jpg" alt="No picture">
                <?php 
                    if(isset($_SESSION['adminSessionId'])){ ?> 
                        <h1>ADMIN DASHBOARD </h1>                    
                    <?php }
                    else if(isset($_SESSION['leaderSessionId'])){ ?> 
                        <h1>COURSE LEADER DASHBOARD </h1>            
                    <?php }
                    else if(isset($_SESSION['lecturerSessionId'])){ ?> 
                        <h1>TUTOR DASHBOARD </h1>                    
                        <?php } 
                    else if(isset($_SESSION['studentSessionId'])){ ?> 
                        <h1>STUDENT DASHBOARD </h1>
                    <?php } 
                    else { ?>
                        <h1>WELCOME </h1>
                    <?php }
                ?>
            </div>
            <nav>
                <ul>
                    <?php
                       if(isset($_SESSION['adminSessionId'])){ ?> 
                            <li><a href="adminDash.php">Admission</a></li>
                            <li><a href="#">Student</a></li>
                            <li><a href="#">Staff</a></li>
                            <li><a href="#">Course</a></li>
                            <li><a href="#">Module</a></li>                    
                      <?php }
                        else if(isset($_SESSION['leaderSessionId'])){ ?> 
                            <li><a href="leaderDash.php">Course</a></li>
                            <li><a href="#">Student</a></li>
                            <li><a href="#">Module</a></li>                    
                      <?php }
                        else if(isset($_SESSION['lecturerSessionId'])){ ?> 
                            <li><a href="adminDash.php">Admission</a></li>
                            <li><a href="#">Student</a></li>
                            <li><a href="#">Staff</a></li>
                            <li><a href="#">Course</a></li>
                            <li><a href="#">Module</a></li>                    
                          <?php } 
                        else if(isset($_SESSION['studentSessionId'])){ ?> 
                            <li><a href="adminDash.php">Admission</a></li>
                            <li><a href="#">Student</a></li>
                            <li><a href="#">Staff</a></li>
                            <li><a href="#">Course</a></li>
                            <li><a href="#">Module</a></li>                    
                        <?php } 
                        else { ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                        <?php }
                    ?>
                </ul>
            </nav>
        </div>
    </body>
</html>