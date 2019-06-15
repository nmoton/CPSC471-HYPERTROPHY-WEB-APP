<?php
$db = mysqli_connect('localhost', 'root', '', '471proj');

$searchQuery = "SELECT * FROM workout WHERE workoutListID_fk = '1'";
$result = mysqli_query($db, $searchQuery);

$i = 1;

while ($row = mysqli_fetch_assoc($result)){
		echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
	    	echo '<div class="d-flex justify-content-between" id="workout">';
	        	echo '<h5 class="mb-1">Workout #' . $i . '</h5>';
	        	echo '<small>' . $row['wMonth'] . '/' .$row['wDay'] . '/' . $row['wYear'] . '</small>';
	    	echo '</div>';
	    	echo '<p class="mb-1">Workout Description</p>';

	    	if ($row['privacy'] == 'public'){
	    		echo '<small> Private - Stored only in your workout list</small>';
	    	}

	    	else {
	    		echo '<small>Public - Shared on your personal wall and the community wall</small>';
	    	}
	    	
	    echo' </a>';

	    $i++;
	}
?>