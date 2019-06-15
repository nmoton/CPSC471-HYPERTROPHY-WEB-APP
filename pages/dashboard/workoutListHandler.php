<?php
$db = mysqli_connect('localhost', 'root', '', '471proj');

$searchQuery = "SELECT * FROM workout WHERE workoutListID_fk = '1' ORDER BY workoutID DESC";
$result = mysqli_query($db, $searchQuery);

$num_workouts = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)){
	if ($row['privacy'] == 'public'){
		echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-primary">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $row['wMonth'] . '/' .$row['wDay'] . '/' . $row['wYear'] . '</small>';
	    	echo '</div>';
	    	echo '<p class="mb-1">Workout Description</p>';
			echo '<small>Public - Shared on your personal wall and the community wall</small>';
			echo' </a>';
	} else {
		echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $num_workouts . '</h5>';
	        	echo '<small>' . $row['wMonth'] . '/' .$row['wDay'] . '/' . $row['wYear'] . '</small>';
	    	echo '</div>';
	    	echo '<p class="mb-1">Workout Description</p>';
	    	echo '<small> Private - Stored only in your workout list</small>';
	    	echo' </a>';
	}
	$num_workouts--;
}
?>