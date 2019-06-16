<?php
//Initialize a user session
session_start();

//create db link
$db = mysqli_connect('localhost', 'root', '', '471proj');

//for logging in users 
  $workoutID = mysqli_real_escape_string($db, $_POST['workout']);

  $searchQuery = "SELECT workoutListID_fk, wMonth, wDay, wYear, wTime, privacy, wDesc, userID, fname, lname, bAge FROM workout, standard_user, user WHERE workoutID = '$workoutID' AND workoutListID_fk = workoutListID AND userID_fk = userID";
  $result = mysqli_query($db, $searchQuery);
  $workoutInfo = mysqli_fetch_assoc($result);

  echo '<div class="container" id="user-banner">';
        echo '<div class="card">';
        echo '<h5 class="card-header">Workout Information</h5>';
        echo    '<div class="card-body">';
          echo    '<div class="user-name" id="user-name">';
            echo     '<h5>'. $workoutInfo['fname'] . ' ' . $workoutInfo['lname'] .'</h5>';
              echo '</div>';
                echo '<div class="user-about" id="user-about">';
                    echo '<p><strong>User ID: </strong> #' . $workoutInfo['userID'] . '</p>';
                    echo '<p><strong>Gender:</strong> GENDER</p>';
                    echo '<p><strong>Age: </strong>' . $workoutInfo['bAge'] . 'Years Old</p>';
                echo '</div>';
                echo '<hr>';
                echo '<div class="workout-about" id="workout-about">';
                    echo '<p><strong>Workout ID: </strong> #' . $workoutID . '</p>';
                    echo '<p><strong>Completed: </strong>' . $workoutInfo['wMonth'] . '/' . $workoutInfo['wDay'] . '/' . $workoutInfo['wYear'] .' - '. $workoutInfo['wTime'] . '</p>';
                    if ($workoutInfo['privacy'] == 'public') {
                      echo '<p><strong>Privacy: </strong> Public </p>';
                    }
                    else {
                      echo '<p><strong>Privacy: </strong> Private </p>';
                    }
                    echo '<p><strong>Description: </strong>' . $workoutInfo['wDesc'] . '</p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    $searchQuery = "SELECT * FROM exercise WHERE workoutID_fk = '$workoutID'";
    $result = mysqli_query($db, $searchQuery);

    echo '<div class="container" id="exerciseList">';
        echo '<ul class="list-group">';

    while ($exerciseInfo = mysqli_fetch_assoc($result)){
      echo '<li class="list-group-item flex-column align-items-start">';
                echo '<div class="d-flex justify-content-between" id="exercise">';
                    echo '<h5 class="mb-1">'. $exerciseInfo['name'] .'</h5>';
                echo '</div>';
                echo '<p><strong>Weight: </strong>' . $exerciseInfo['weight'] .'lbs</p>';
                echo '<p><strong>Set(s): </strong>'. $exerciseInfo['sets'] .'</p>';
                echo '<p><strong>Rep(s): </strong>'  . $exerciseInfo['reps'] . '</p>';
            echo '</li>';
    }
          echo '</ul>';
      echo '</div>';
?>