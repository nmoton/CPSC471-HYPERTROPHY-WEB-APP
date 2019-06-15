<?php
//(1) Specific user based workout lists cannot be retrieved as the user table has not been configured properly
$db = mysqli_connect('localhost', 'root', '', '471proj');

//As stated in (1), the table has not been configured correctly, so we are only using values based on workoutListID = 1
$searchQuery = "SELECT * FROM workout WHERE workoutListID_fk = '1' ORDER BY workoutID DESC";
$result = mysqli_query($db, $searchQuery);

$num_workouts = mysqli_num_rows($result);

//Time cannot be displayed as the wTime variable in the database was not configured properly
while ($row = mysqli_fetch_assoc($result)){
	if ($row['privacy'] == 'public'){
		echo '<a class="list-group-item flex-column align-items-start list-group-item-primary ">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $row['wMonth'] . '/' .$row['wDay'] . '/' . $row['wYear'] . '</small>';
	    	echo '</div>';
	    	echo '<p class="mb-1">Workout Description</p>';
	    	echo '<small>Public - Shared on your personal wall and the community wall</small>';
            echo '<hr>';
            echo '<button type="button" class="btn primary">View Workout #' . $num_workouts . '</button>';
			echo' </a>';
	} else {
		echo '<a class="list-group-item flex-column align-items-start">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $row['wMonth'] . '/' .$row['wDay'] . '/' . $row['wYear'] . '</small>';
	    	echo '</div>';
	    	echo '<p class="mb-1">Workout Description</p>';
	    	echo '<small> Private - Stored only in your workout list</small>';
	    	echo '<hr>';
            echo '<button type="button" class="btn primary">View Workout #' . $num_workouts . '</button>';
			echo' </a>';
	}
	$num_workouts--;
}
?>