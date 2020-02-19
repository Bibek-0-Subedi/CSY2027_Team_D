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
            <div><a href="login.php">Login</a></div>
        </div>
        <div id="nav">
            <div id="navlogo">
                <img src="Images/logo.jpg" alt="No picture">
                <h1>ADMIN DASHBOARD </h1>
            </div>
            <nav>
                <ul>
                    <!-- for admin page -->
                    <li><a href="adminDash.php">Admission</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Staff</a></li>
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">Admission</a></li>
                    <!-- for landing page  -->
                    <!-- <li><a href="#">About Us</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Help</a></li> -->
                </ul>
            </nav>
        </div>
    </body>
</html>