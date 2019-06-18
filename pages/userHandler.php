<?php
	session_start();

	$email = "";

	$errors = array();
	
	//Connect to the database
	$db = mysqli_connect("localhost", "root", "", "471proj");

	//POST the user's information through the registration form
	if (isset($_POST['register'])) {
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$bMonth = $_POST['bmonth'];
		$bDay = $_POST['bday'];
		$bYear = $_POST['byear'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];

		//Confirm the user hasn't registered using the same email address before
		$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		
		//Provde the user with a 
		if ($password != $confirmPassword) {
			echo '<div class="alert alert-danger" role="alert">';
				echo'The passwords do not match.';
			echo '</div>';
		}
		
		if ($user) {
			if ($user['email'] == $email) {
				echo '<div class="alert alert-danger" role="alert">';
					echo 'An account with this email already exists!';
				echo '</div>';
			}
		}
		
		else {	
			//Enter theuser's information into the DB and randomly generate a new userID
			$query = "INSERT INTO user (fname, lname, bMonth, bDay, bYear, email, password, gender, bAge) VALUES ('$fname', '$lname', '$bMonth', '$bDay', '$bYear', '$email', '$password', '$gender', '$age')";

			//Return a fatal database error if the user cannot be inserted.
			if(!mysqli_query($db, $query)){
				die('FATAL DATABASE ERROR: Cannot insert new record!');
			}

			//Retrieve the user's userID from the database where their email matches and store the value as userID
			$pullUserIDQuery = "SELECT userID FROM user WHERE email = '$email'";
			$pullUserIDQueryResult = mysqli_query($db, $pullUserIDQuery);
			$pullUserID = mysqli_fetch_assoc($pullUserIDQueryResult);
			$userID = $pullUserID['userID'];

			//Retrieve the user's workoutListID from the database based on their userID and store the value as workout_listID
			$newWorkout_ListQuery = "INSERT INTO workout_list (userID_fk) VALUES ('$userID')";
			$newWorkout_List = mysqli_query($db, $newWorkout_ListQuery);

			//Generate a new workoutListID for the user
			$pullWorkout_ListIDQuery = "SELECT workoutListID FROM workout_list WHERE userID_fk = '$userID'";
			$pullWorkout_ListIDQueryResult = mysqli_query($db, $pullWorkout_ListIDQuery);
			$pullWorkout_ListID = mysqli_fetch_assoc($pullWorkout_ListIDQueryResult);
			$workout_listID = $pullWorkout_ListID['workoutListID'];

			echo '<p>Workout List:</p>' . $workout_listID;

			//Generate a new personalWallID for the user
			$newPersonal_WallQuery = "INSERT INTO personal_wall (userID_fk) VALUES ('$userID')";
			$newPersonal_Wall = mysqli_query($db, $newPersonal_WallQuery);

			//Retrieve the user's personallWallID from the database based on their userID and store the value as personal_listID
			$pullPersonal_WallIDQuery = "SELECT personalWallID FROM personal_wall WHERE userID_fk = '$userID'";
			$pullPersonal_WallIDQueryResult = mysqli_query($db, $pullPersonal_WallIDQuery);
			$pullPersonal_WallID = mysqli_fetch_assoc($pullPersonal_WallIDQueryResult);
			$personal_wallID = $pullPersonal_WallID['personalWallID'];

			 echo '<p>Personal Wall:</p>' . $personal_wallID;

			 //Generate a new PRListID for the user
			$newPR_ListQuery = "INSERT INTO pr_list (userID_fk) VALUES ('$userID')";
			$newPR_List = mysqli_query($db, $newPR_ListQuery);

			//Retrieve the user's PRListID from the database based on their userID and store the value as PR_ListID
			$pullPR_ListIDQuery = "SELECT prListID FROM pr_list WHERE userID_fk = '$userID'";
			$pullPR_ListIDQueryResult = mysqli_query($db, $pullPR_ListIDQuery);
			$pullPR_ListID = mysqli_fetch_assoc($pullPR_ListIDQueryResult);
			$PR_ListID = $pullPR_ListID['prListID'];

			 echo '<p>PR List:</p>' . $PR_ListID;

			//Generate a new Standard User entry for the user based on their userID, PRListID, PersonalWallID, and WorkoutListID 
			$newStandardUserQuery = "INSERT INTO standard_user (userID_fk, personalWallID_fk, workoutListID_fk, prListID_fk) VALUES ('$userID', '$personal_wallID', '$workout_listID', '$PR_ListID')";
			$newStandardUser = mysqli_query($db, $newStandardUserQuery);
			
			//Return the user to the index
			header('location: ../index.html');
		}
	}

	//for logging in users 
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		//Server-side field error checks if client-side fail
		if (empty($email)) {
			array_push($errors, "Please enter your Email");
			echo '<div class="alert alert-danger" role="alert">';
				echo'Please enter your email.';
			echo '</div>';
		}
		
		if (empty($password)) {
			array_push($errors, "Please enter your Password");
			echo '<div class="alert alert-danger" role="alert">';
				echo'Please enter your password.';
			echo '</div>';
		}

		if (count($errors) == 0) {
			$login_query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$login_result = mysqli_query($db, $login_query);

			//Get the account's personal user info
			$userInfo = mysqli_fetch_assoc($login_result);
		 
			if (mysqli_num_rows($login_result)) {
				$_SESSION['success'] = "You are now logged in";

				$userID = $userInfo['userID'];

				//Store the user's userID in the SESSION variable UID
				$_SESSION['UID'] = $userID;

				//Get the standard user's personalWall, workoutList, and personalRecordList information
				$standard_user_query = "SELECT * FROM standard_user WHERE userID_fk = '$userID'";
				$standard_user_result = mysqli_query($db, $standard_user_query);
				$standard_userInfo = mysqli_fetch_assoc($standard_user_result);
				error_log($standard_userInfo);

				//Store the user's personalWallID in the SESSION variable PID
				 $_SESSION['PID'] = $standard_userInfo['personalWallID_fk'];

				 //Store the user's workoutListID in the SESSION variable PID
				 $_SESSION['WID'] = $standard_userInfo['workoutListID_fk'];

				 //Store the user's personalRecordListID in the SESSION variable PRID
				 $_SESSION['PRID'] = $standard_userInfo['prListID_fk'];

				 //Redirect to dashboard/workoutList.php - TEMPORARY
				 header('location: dashboard/dashboard.php');
			}	
		}
	}
?>