<!DOCTYPE html>

<html lang="en">
<head>
    <title>Hypertrophy - Workout List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../css/global.css" rel="stylesheet" media="screen">
    <link href="../../css/dashboard/dashboardNavbarBackGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/dashboardGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/workout.css" rel="stylesheet" media="screen" />
</head>
<body>
    <nav class="navbar fixed-top navbar-dark fixed-top-2">
        <div class="container">
        <ul class="navbar-nav" id="back">
            <li class="nav-item active">
                <i class="fas fa-arrow-circle-left fa-2x"></i>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">User Workout</a>
            </li>
        </ul>
    </div>
    </nav>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container" id="home">
            <div class="input-group md-form form-sm form-2 pl-0" id="search">
                <input class="form-control my-0 py-1" type="text" placeholder="Search Users" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                </div>
            </div>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <u1 class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#what">Community Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#help">Personal Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pages/signup.html">Account Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pages/login.html">Log Out</a>
                    </li>
                </u1>
            </div>
        </div>
    </nav>

    <?php 
        include 'workoutHandler.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</div>

</html>