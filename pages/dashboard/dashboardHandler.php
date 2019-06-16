<?php
//Connect to the Database
$db = mysqli_connect('localhost', 'root', '', '471proj');

//Complete an SQL query that finds all public workouts stored in the database
$searchQuery = "SELECT fname, lname, userID, wMonth, wDay, wYear, wTime, workoutID FROM workout, standard_user, user WHERE privacy = 'public' AND workoutListID_fk = workoutListID AND userID_fk = userID ORDER BY workoutID DESC";
$result = mysqli_query($db, $searchQuery);


//Echo the HTML code that will present the data on the web page
while ($workoutInfo = mysqli_fetch_assoc($result)){
		echo '<div class="container" id="dashboard-post">';
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
?>