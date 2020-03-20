<div class="timebar">
    <div>
        <h5>Current Date</h5>
    </div>
    <div class="logout-link">
            <a class="h5">
                <span class="caret"></span>
            </a>
            <a class="h5 ml-3 mr-2" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            </form>
        <form class="form layout-search ">
            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search">
            <button class="btn" type="submit"><i class="fa fa-search" style="font-size: 20px; color: #8AC6B7"></i></button>
        </form>            
    </div>
</div>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8AC6B7;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/Logo.jpg" class="img-fluid" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-linkDropdown" aria-label="Toggle navigation " aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-linkDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo base_url();?>">Home</a>
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
                    <a class="nav-link" href="<?php echo base_url();?>support">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>about">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
