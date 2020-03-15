<?php
    include 'session.php';
?>
<body>
    <div class="navbar navbar-light timebar">
    <!-- <a class="navbar-brand">Navbar</a> -->
    <p class="ml-auto">Feb 09,2020</p>
    <form class="form-inline ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8AC6B7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.jpg" class="img-fluid" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-linkDropdown" aria-label="Toggle navigation " aria-controls="navbarSupportedContent" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-linkDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="nav-linkDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                        </a>
                        <div class="dropdown-menu" aria-labelledby="nav-linkDropdownMenu">
                            <a class="dropdown-item" href="#">Software Engineering</a>
                            <a class="dropdown-item" href="#">Network Engineering</a>
                            <a class="dropdown-item" href="#">Business Administration</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

