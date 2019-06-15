<!--https://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html-->

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Hypertrophy - The New Social Media Community For Gym-Goers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../css/global.css" rel="stylesheet" media="screen"/>
    <link href="../../css/dashboard/dashboardNavbarBackGlobal.css" rel="stylesheet" media="screen"/>
    <link href="../../css/dashboard/dashboardGlobal.css" rel="stylesheet" media="screen"/>
    <link href="../../css/dashboard/dashboardSearch.css" rel="stylesheet" media="screen" />
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
                <!--<a class="nav-link" href="#">'000'</a>-->
            </li>
        </ul>
    </div>
    </nav>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container" id="home">
            <div class="input-group md-form form-sm form-2 pl-0" id="search">
                <input type="text" name = "search_text" id = "search_text" placeholder="Search Users" aria-label="Search" class="form-control my-0 py-1">
                <div class="input-group-append">
                </div>
                
            </div>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <u1 class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#what">Personal Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#help">Workout List</a>
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
       
        

        <div class="container" id="dashboard-post">
            <div class="card">
                <div class="card-header">
                    <div class="align-items-center">                
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" class="btn primary">View User's Wall</button>
                </div>
            </div>
        </div>
        <!--This is where the result from the Ajax script appears, need to change the location of this
            later but for sake of demonstrating functionality, this is fine-->
        <div id = "result"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--Ajax script for accessing the users that have been searched, don't change this.-->
   <script>
    $(document).ready(function(){

    load_data();

    function load_data(query){
        $.ajax({
        url:"searchBar.php",
        method:"POST",
        data:{query:query},
        success:function(data){
            $('#result').html(data);
        }
        });
    }
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != ''){
            load_data(search);
        }
        else{
            load_data();
        }
    });
    });
    </script>




</body>

</html>



