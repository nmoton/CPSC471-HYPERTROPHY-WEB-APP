<!DOCTYPE html>

<html lang="en">
<head>
    <title>Hypertrophy - Add a Workout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../css/global.css" rel="stylesheet" media="screen">
    <link href="../../css/dashboard/dashboardNavbarBackGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/dashboardGlobal.css" rel="stylesheet" media="screen" />
    <link href="../../css/dashboard/addWorkoutTemp.css" rel="stylesheet" media="screen" />
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
                <a class="nav-link" href="#">Add a Workout</a>
            </li>
        </ul>
    </div>
    </nav>

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
        
    <div class="container" id="alertSection">
        <?php 
            include 'addWorkoutTempHandler.php';
        ?>
    </div>
    
    <div class="container" id="addWorkout">
        <form class="form" id="form-workout" method="post">
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Workout Information</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="description" id="description" placeholder="Workout Description" required="true"/>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="privacy" id="privacy" placeholder="Privacy (private/public - lowercase)" required="true"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Exercise #1</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex1name" id="ex1name" placeholder="Exercise Name"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex1sets" id="ex1sets" placeholder="Sets"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex1reps" id="ex1reps" placeholder="Reps"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex1weight" id="ex1weight" placeholder="Weight (lbs)"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Exercise #2</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex2name" id="ex2name" placeholder="Exercise Name"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex2sets" id="ex2sets" placeholder="Sets"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex2reps" id="ex2reps" placeholder="Reps"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex2weight" id="ex2weight" placeholder="Weight (lbs)"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Exercise #3</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex3name" id="ex3name" placeholder="Exercise Name"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex3sets" id="ex3sets" placeholder="Sets"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex3reps" id="ex3reps" placeholder="Reps"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex3weight" id="ex3weight" placeholder="Weight (lbs)"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Exercise #4</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex4name" id="ex4name" placeholder="Exercise Name"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex4sets" id="ex4sets" placeholder="Sets"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex4reps" id="ex4reps" placeholder="Reps"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex4weight" id="ex4weight" placeholder="Weight (lbs)"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="addWorkoutCard">
                <h5 class="card-header">Exercise #5</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex5name" id="ex5name" placeholder="Exercise Name"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex5sets" id="ex5sets" placeholder="Sets"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex5reps" id="ex5reps" placeholder="Reps"/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="ex5weight" id="ex5weight" placeholder="Weight (lbs)"/>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-md btn-primary btn-block" name="workout">Save Workout</button>
        </form>

    <script src="../../js/dashboard/addWorkout.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>