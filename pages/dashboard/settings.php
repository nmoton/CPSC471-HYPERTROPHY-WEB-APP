<!DOCTYPE html>

<html lang="en">
<head>
    <title>Hypertrophy - Account Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../css/global.css" rel="stylesheet" media="screen">
    <link href="../../css/dashboard/dashboardNavbarBackGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/dashboardGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/settings.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/dashboard.css" rel="stylesheet" media="screen" />
</head>
<body>
    <nav class="navbar fixed-top navbar-dark fixed-top-2">
        <div class="container">
        <ul class="navbar-nav" id="back">
            <li class="nav-item active">
                <a href="dashboard.php"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul>
    </div>
    </nav>

    <div class="container" id="alertSection">
    	<?php 
        	include 'settingsHandler.php';
    	?>
	</div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container" id="home">
            <form action ="dashboardSearch.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control my-0 py-1" placeholder="Search User" aria-label="Search User" aria-describedby="basic-addon2" id="seach" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="navbarButton"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <u1 class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="addWorkoutTemp.php">New Workout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="workoutList.php">Workout List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="personalWall.php">Personal Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../../index.html">Log Out</a>
                    </li>
                </u1>
            </div>
        </div>
    </nav>

    <div class="container" id="changePasswordCard">
        <div class="card">
            <h5 class="card-header">Change your password</h5>
            <div class="card-body">
                <form class="form-password" id="form-password" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="Current Password" autofocus=""/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary btn-block" name="password">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container" id="addSocialMediaCard">
        <div class="card">
            <h5 class="card-header">Add Social Media</h5>
            <div class="card-body">
                <form class="form" id="form-social" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram Username"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter Username"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook Username"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary btn-block" name="social">Add Social Media</button>
                </form>
            </div>
        </div>
    </div>


    <script src="../../js/dashboard/addWorkout.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>