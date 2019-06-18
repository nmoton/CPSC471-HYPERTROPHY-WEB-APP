<?php
session_start();

error_reporting(0);

$connect = mysqli_connect("localhost", "root", "", "471proj");
$output = '';

if(isset($_POST["profile"])){
 $search = mysqli_real_escape_string($connect, $_POST["profile"]);

 $query = "SELECT userID, fname, lname, bAge, gender FROM user WHERE userID = '$search'";
 $result = mysqli_query($connect, $query);
 $profileInfo = mysqli_fetch_assoc($result);
 $userID = $profileInfo['userID'];

 echo $search;

 echo '<div class="container" id="user-banner">';
        echo '<div class="container" id="banner-info">';
            echo '<div class="card">';
                echo '<h5 class="card-header">User Profile</h5>';
                echo '<div class="card-body">';
                    echo '<div class="user-name" id="user-name">';
                        echo '<h5>' . $profileInfo['fname'] . ' ' . $profileInfo['lname'] .'</h5>';
                    echo '</div>';
                    echo '<div class="user-about" id="user-about">';
                        echo '<p><strong>User ID: </strong> #000' . $profileInfo['userID'] . '</p>';
                        echo '<p><strong>Gender:</strong> ' . $profileInfo['gender'] . '</p>';
                        echo '<p><strong>Age:</strong> ' . $profileInfo['bAge'] . 'Years Old</p>';
                    echo '</div>';
                    if (!empty($profileInfo['facebook']) || !empty($profileInfo['twitter']) || !empty($profileInfo['instagram'])){
                        echo '<hr>';
                        echo '<div class="user-social" id="user-social">';
                        if(!empty($profileInfo['facebook'])){
                            $facebook = $profileInfo['facebook'];
                            echo '<a href="https://facebook.com/' . $facebook .'""><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Facebook </button></a>';
                        }
                        if(!empty($profileInfo['twitter'])){
                            $twitter = $profileInfo['twitter'];
                            echo '<a href="https://twitter.com/' . $twitter .'"><button type="button" class="btn btn-tw"><i class="fab fa-twitter pr-1"></i> Twitter </button></a>';
                        }
                        if(!empty($profileInfo['instagram'])){
                            $instagram = $profileInfo['instagram'];
                            echo '<a href="https://instagram.com/' . $instagram .'""><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Instagram </button></a>';
                        }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

$searchQuery = "SELECT fname, lname, userID, wMonth, wDay, wYear, wTime, workoutID FROM workout, standard_user, user WHERE standard_user.userID_fk = '$userID' AND standard_user.workoutListID_fk = workout.workoutListID_fk AND user.userID = standard_user.userID_fk ORDER BY workoutID DESC";
$result = mysqli_query($connect, $searchQuery);

echo '<div class="container" id="profile-post-area">';
while ($workoutInfo = mysqli_fetch_assoc($result)){
        echo '<div class="container" id="profile-post">';
            echo '<div class="card">';
                echo '<div class="card-header">';
                    echo'<h5>' . $workoutInfo['fname'] . ' ' . $workoutInfo['lname'] .'</h5>';
                    echo '<h6>UID: #000' . $workoutInfo['userID'] . '</h6>';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<div class="text-muted h7 mb-2">'; 
                        echo '<small>' . $workoutInfo['wMonth'] . '/' .$workoutInfo['wDay'] . '/' . $workoutInfo['wYear'] . ' - ' . $workoutInfo['wTime'] . '</small> ';
                    echo '</div>';
                    echo '<p class="card-text">' .$workoutInfo['fname'] . ' has completed a workout.</p>';
                    echo '<form action="workout.php" method="post">';
                       echo '<button type="submit" class="btn primary" name="workout" value="'. $workoutInfo['workoutID'] .'">View Workout</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';

echo '</div>';

}
else {
    $userID = $_SESSION['PID'];
    $workoutListID = $_SESSION['WID'];

    $query = "SELECT * FROM user WHERE userID = '$userID'";
    $result = mysqli_query($connect, $query);
    $profileInfo = mysqli_fetch_assoc($result);

    echo $profileInfo['facebook'];

     echo '<div class="container" id="user-banner">';
        echo '<div class="container" id="banner-info">';
            echo '<div class="card">';
                echo '<h5 class="card-header">User Profile</h5>';
                echo '<div class="card-body">';
                    echo '<div class="user-name" id="user-name">';
                        echo '<h5>' . $profileInfo['fname'] . ' ' . $profileInfo['lname'] .'</h5>';
                    echo '</div>';
                    echo '<div class="user-about" id="user-about">';
                        echo '<p><strong>User ID: </strong> #000' . $profileInfo['userID'] . '</p>';
                        echo '<p><strong>Gender:</strong> ' . $profileInfo['gender'] . '</p>';
                        echo '<p><strong>Age:</strong> ' . $profileInfo['bAge'] . 'Years Old</p>';
                    echo '</div>';
                    if (!empty($profileInfo['facebook']) || !empty($profileInfo['twitter']) || !empty($profileInfo['instagram'])){
                        echo '<hr>';
                        echo '<div class="user-social" id="user-social">';
                        if(!empty($profileInfo['facebook'])){
                            $facebook = $profileInfo['facebook'];
                            echo '<a href="https://facebook.com/' . $facebook .'""><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Facebook </button></a>';
                        }
                        if(!empty($profileInfo['twitter'])){
                            $twitter = $profileInfo['twitter'];
                            echo '<a href="https://twitter.com/' . $twitter .'"><button type="button" class="btn btn-tw"><i class="fab fa-twitter pr-1"></i> Twitter </button></a>';
                        }
                        if(!empty($profileInfo['instagram'])){
                            $instagram = $profileInfo['instagram'];
                            echo '<a href="https://instagram.com/' . $instagram .'""><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Instagram </button></a>';
                        }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

$searchQuery = "SELECT fname, lname, userID, wMonth, wDay, wYear, wTime, workoutID FROM workout, standard_user, user WHERE standard_user.userID_fk = '$userID' AND standard_user.workoutListID_fk = workout.workoutListID_fk AND user.userID = standard_user.userID_fk ORDER BY workoutID DESC";
$result = mysqli_query($connect, $searchQuery);

echo '<div class="container" id="profile-post-area">';

//Echo the HTML code that will present the data on the web page
while ($workoutInfo = mysqli_fetch_assoc($result)){
        echo '<div class="container" id="profile-post">';
            echo '<div class="card">';
                echo '<div class="card-header">';
                    echo'<h5>' . $workoutInfo['fname'] . ' ' . $workoutInfo['lname'] .'</h5>';
                    echo '<h6>UID: #000' . $workoutInfo['userID'] . '</h6>';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<div class="text-muted h7 mb-2">'; 
                        echo '<small>' . $workoutInfo['wMonth'] . '/' .$workoutInfo['wDay'] . '/' . $workoutInfo['wYear'] . ' - ' . $workoutInfo['wTime'] . '</small> ';
                    echo '</div>';
                    echo '<p class="card-text">' .$workoutInfo['fname'] . ' has completed a workout.</p>';
                    echo '<form action="workout.php" method="post">';
                       echo '<button type="submit" class="btn primary" name="workout" value="'. $workoutInfo['workoutID'] .'">View Workout</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

echo '</div>';

?>