<?php
//Initialize a user session
session_start();

$email = "";

//prints the last sql query error to phpError.log
ini_set("log_errors", 1);
ini_set("error_log", "phpError.log");

$errors = array();

//create db link
$db = mysqli_connect('localhost', 'root', '', '471proj');

//for logging in users 
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  //Server-side field error checks
  if (empty($email)) {
  	array_push($errors, "Please enter your Email");
  }
  
  if (empty($password)) {
  	array_push($errors, "Please enter your Password");
  }

  if (count($errors) == 0) {
  	$login_query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
  	$login_result = mysqli_query($db, $login_query);

  	//Get the account's personal user info
  	$userInfo = mysqli_fetch_assoc($login_result);
   
  	if (mysqli_num_rows($login_result)) {
  	  $_SESSION['email'] = $email;
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
  	   $_SESSION['PID'] = $standard_userInfo['personalWallID'];

  	   //Store the user's workoutListID in the SESSION variable PID
  	   $_SESSION['WID'] = $standard_userInfo['workoutListID'];

  	   //Store the user's personalRecordListID in the SESSION variable PRID
  	   $_SESSION['PRID'] = $standard_userInfo['prListID'];

  	   //Redirect to dashboard/workoutList.php - TEMPORARY
  	   header('location: dashboard/workoutList.php');
  	}
     
   else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }

}

?>