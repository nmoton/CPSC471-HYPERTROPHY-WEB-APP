<?php
session_start();

//Retrieve the user's specific workoutListID from the SESSION variable WID
$workoutListID = $_SESSION['WID'];

//Connect to the Database
$db = mysqli_connect('localhost', 'root', '', '471proj');

//Complete an SQL query that finds all of the user's most recent workouts based on their workoutListID
$searchQuery = "SELECT * FROM workout WHERE workoutListID_fk = '$workoutListID' ORDER BY workoutID DESC";
$result = mysqli_query($db, $searchQuery);

//Determine the number of workouts the user has completed
$num_workouts = mysqli_num_rows($result);

//Echo the HTML code that will present the data on the web page
while ($workoutInfo = mysqli_fetch_assoc($result)){
	if ($workoutInfo['privacy'] == 'public'){
		echo '<a class="list-group-item flex-column align-items-start list-group-item-primary ">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $workoutInfo['wMonth'] . '/' .$workoutInfo['wDay'] . '/' . $workoutInfo['wYear'] . ' - ' . $workoutInfo['wTime'] . '</small> ';
	    	echo '</div>';
	    	echo '<p class="mb-1">'. $workoutInfo['wDesc'] . '</p>';
	    	echo '<small>Public - Shared on your personal wall and the community wall</small>';
            echo '<hr>';
            echo '<form action="workout.php" method="post">';
            	echo '<button type="submit" class="btn primary" name="workout" value="'. $workoutInfo['workoutID'] .'"">View Workout #' . $num_workouts . '</button>';
            echo '</form>';
		echo' </a>';
	} else {
		echo '<a class="list-group-item flex-column align-items-start">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $workoutInfo['wMonth'] . '/' .$workoutInfo['wDay'] . '/' . $workoutInfo['wYear'] . ' - ' . $workoutInfo['wTime'] . '</small> ';
	    	echo '</div>';
	    	echo '<p class="mb-1">'. $workoutInfo['wDesc'] . '</p>';
	    	echo '<small> Private - Stored only in your workout list</small>';
	    	echo '<hr>';
	    	echo '<form action="workout.php" method="post">';
            	echo '<button type="submit" class="btn primary" name="workout" value="'. $workoutInfo['workoutID'] .'"">View Workout #' . $num_workouts . '</button>';
            echo '</form>';
		echo' </a>';
	}
	$num_workouts--;
}
?>