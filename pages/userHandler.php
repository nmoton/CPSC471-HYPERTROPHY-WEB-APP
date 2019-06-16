<?php
//Initialize a user session
session_start();

$email = "";

//create db link
$db = mysqli_connect("localhost", "root", "", "471proj");
echo "connection successful";

if (isset($_POST['register']))
{
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

  
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  //doing error checks 
  if ($password != $confirmPassword)
  {
    echo"passwords do not match";
  }
  
  if ($user) 
  {
    if ($user['email'] == $email) 
    {
      echo "email already exists";
    }
  }
  
  //Register the user if there are no errors
  else
  {
    //$password = md5($password);//encrypt the password

    $query = "INSERT INTO USER (fname, lname, bMonth, bDay, bYear, email, password, gender, bAge) VALUES ('$fname', '$lname', '$bMonth', '$bDay', '$bYear', '$email', '$password', '$gender', 'age')";
    if(!mysqli_query($db, $query)){
      die('error: cannot insert new record');
    }
    $newrecord = 'new record added to db';
    
    $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now registered and logged-in. Welcome!";
    
    //header('location: dashboard.php');

  }
  
}




















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
    
  }

}

?>