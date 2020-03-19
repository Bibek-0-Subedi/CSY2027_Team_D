<?php
    include 'classes/databasetable.php';
    include 'classes/tableGenerator.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Woodland University College</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#nav-linkDropdown" >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-linkDropdown">                            
                    <div class="row">
                        <div class="col-lg-2 bg-dark adminSidebar">
                            this is left
                        </div>      
                    </div>
                    <div class="row">
                        <div class="col-lg-6 bg-success">
                            <div class="col-lg-4 bg-dark">
                                col 1           
                            </div>
                            <div class="col-lg-4 bg-success">
                                    col 2
                            </div>        
                            <div class="col-lg-4 bg-dark">
                                col 3
                            </div> 
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
