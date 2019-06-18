<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', '471proj');


	if (isset($_POST['workout'])) {
		$month = date('m');
		$day = date('d');
		$year = date('Y');
		$time = date('H:i:s');
		$workoutListID = $_SESSION['WID'];

		$privacy = mysqli_real_escape_string($db, $_POST['privacy']);
		$description = mysqli_real_escape_string($db, $_POST['description']);

		$workoutQuery = "INSERT INTO workout (wMonth, wDay, wYear, wTime, privacy, workoutListID_fk, wDesc) VALUES ('$month', '$day', '$year', '$time', '$privacy', '$workoutListID', '$description')";
		$result = mysqli_query($db, $workoutQuery);

		$thisWorkoutIDQuery = "SELECT workoutID FROM workout WHERE workoutListID_fk = '$workoutListID' AND wTime = '$time'";
		$result = mysqli_query($db, $thisWorkoutIDQuery);
		$thisWorkoutID = mysqli_fetch_assoc($result);
		$thisWorkoutIDValue = $thisWorkoutID['workoutID'];

		$ex1name = mysqli_real_escape_string($db, $_POST['ex1name']);
		if (!empty($ex1name)) {
			$ex1sets = mysqli_real_escape_string($db, $_POST['ex1sets']);
			$ex1reps = mysqli_real_escape_string($db, $_POST['ex1reps']);
			$ex1weight = mysqli_real_escape_string($db, $_POST['ex1weight']);

			$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$ex1name', '$ex1sets', '$ex1reps', '$ex1weight', '$thisWorkoutIDValue')";
			$result = mysqli_query($db, $query);

			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo $ex1name . ' succesfully added!';
			echo '</div>';
		}

		$ex2name = mysqli_real_escape_string($db, $_POST['ex2name']);
		if (!empty($ex2name)) {
			$ex2sets = mysqli_real_escape_string($db, $_POST['ex2sets']);
			$ex2reps = mysqli_real_escape_string($db, $_POST['ex2reps']);
			$ex2weight = mysqli_real_escape_string($db, $_POST['ex2weight']);

			$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$ex2name', '$ex2sets', '$ex2reps', '$ex2weight', '$thisWorkoutIDValue')";
			$result = mysqli_query($db, $query);

			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo $ex2name . ' succesfully added!';
			echo '</div>';
		}

		$ex3name = mysqli_real_escape_string($db, $_POST['ex3name']);
		if (!empty($ex3name)) {
			$ex3sets = mysqli_real_escape_string($db, $_POST['ex3sets']);
			$ex3reps = mysqli_real_escape_string($db, $_POST['ex3reps']);
			$ex3weight = mysqli_real_escape_string($db, $_POST['ex3weight']);

			$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$ex3name', '$ex3sets', '$ex3reps', '$ex3weight', '$thisWorkoutIDValue')";
			$result = mysqli_query($db, $query);

			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo $ex3name . ' succesfully added!';
			echo '</div>';
		}

		$ex4name = mysqli_real_escape_string($db, $_POST['ex4name']);
		if (!empty($ex4name)) {
			$ex4sets = mysqli_real_escape_string($db, $_POST['ex4sets']);
			$ex4reps = mysqli_real_escape_string($db, $_POST['ex4reps']);
			$ex4weight = mysqli_real_escape_string($db, $_POST['ex4weight']);

			$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$ex4name', '$ex4sets', '$ex4reps', '$ex4weight', '$thisWorkoutIDValue')";
			$result = mysqli_query($db, $query);

			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo $ex4name . ' succesfully added!';
			echo '</div>';
		}

		$ex5name = mysqli_real_escape_string($db, $_POST['ex5name']);
		if (!empty($ex5name)) {
			$ex5sets = mysqli_real_escape_string($db, $_POST['ex5sets']);
			$ex5reps = mysqli_real_escape_string($db, $_POST['ex5reps']);
			$ex5weight = mysqli_real_escape_string($db, $_POST['ex5eight']);

			$query = "INSERT INTO exercise (name, sets, reps, weight, workoutID_fk) VALUES ('$ex5name', '$ex5sets', '$ex5reps', '$ex5weight', '$thisWorkoutIDValue')";
			$result = mysqli_query($db, $query);

			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo $ex5name . ' succesfully added!';
			echo '</div>';
		}
	}
?>