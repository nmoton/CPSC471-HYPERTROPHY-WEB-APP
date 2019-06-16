<?php
	session_start();

	require_once ('simple_html_dom.php');

	$month = date('m');
	$day = date('d');
	$year = date('Y');
	$time = date('H:i:s');
	$privacy = 'public';
	$workoutListID = $_SESSION['WID'];

	$db = mysqli_connect('localhost', 'root', '', '471proj');

	$workoutQuery = "INSERT INTO workout (wMonth, wDay, wYear, wTime, privacy, workoutListID_fk, wDesc) VALUES ('$month', '$day', '$year', '$time', '$privacy', '$workoutListID', 'TEST')";
	$result = mysqli_query($db, $workoutQuery);

	$thisWorkoutIDQuery = "SELECT workoutID FROM workout WHERE workoutListID_fk = '$workoutListID' AND wTime = '$time'";
	$result = mysqli_query($db, $thisWorkoutIDQuery);
	$thisWorkoutID = mysqli_fetch_assoc($result);
	$thisWorkoutIDValue = $thisWorkoutID['workoutID'];


	$table = file_get_html('addWorkout.php');
	foreach($table ->find('tr') as $tr) {
		$exercise = $tr->find('td', 0)->plaintext;
		$weight = $tr->find('td', 1)->plaintext;
		$sets = $tr->find('td', 2)->plaintext;
		$reps = $tr->find('td', 3)->plaintext;
	 
		$exercise_c = mysqli_real_escape_string($db, $exercise);
		$weight_c = mysqli_real_escape_string($db, $weight);
		$sets_c = mysqli_real_escape_string($db, $sets);
		$reps_c = mysqli_real_escape_string($db, $reps);
	 
		$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$exercise', '$sets', '$reps', '$weight', '$thisWorkoutIDValue')";
		$result = mysqli_query($db, $query);
	}

	header('location: workoutList.php');

?>