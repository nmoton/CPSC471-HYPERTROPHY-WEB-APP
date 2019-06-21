<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', '471proj');


	if (isset($_POST['password'])) {

		$userID = $_SESSION['UID'];

		$currentPassword = mysqli_real_escape_string($db, $_POST['currentPassword']);
		$newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);

		$password_check_query = "SELECT password FROM user WHERE userID = '$userID'";
		$result = mysqli_query($db, $password_check_query);
		$password = mysqli_fetch_assoc($result);
		$passwordCheck = $password['password'];

		//Server-side field error checks if client-side fail
		if (empty($currentPassword)) {
			echo '<div class="alert alert-danger" id="alert" role="alert">';
				echo'Please enter your current password.';
			echo '</div>';
		}
			
		if (empty($newPassword)) {
			echo '<div class="alert alert-danger" id="alert" role="alert">';
				echo'Please enter your new password.';
			echo '</div>';
		}

		if ($passwordCheck == $currentPassword){
			if (!empty($newPassword)) {
				$query = "UPDATE user SET password = '$newPassword' WHERE userID = '$userID'";
				$updatePassword = mysqli_query($db, $query);

				echo '<div class="alert alert-success" id="alert" role="alert">';
					echo'Your password has been changed.';
				echo '</div>';
			}

			else {
				echo '<div class="alert alert-danger" id="alert" role="alert">';
					echo'Please enter your new password.';
				echo '</div>';
			}
		}

		else {
			if (!empty($currentPassword)){
				echo '<div class="alert alert-danger" id="alert" role="alert">';
					echo'Your current password is incorrect.';
				echo '</div>';
			}
		}
	}

	if (isset($_POST['social'])) {

		$userID = $_SESSION['UID'];

		$instagram = mysqli_real_escape_string($db, $_POST['instagram']);
		$facebook = mysqli_real_escape_string($db, $_POST['facebook']);
		$twitter = mysqli_real_escape_string($db, $_POST['twitter']);

		//Server-side field error checks if client-side fail
		if (!empty($instagram)) {
			$query = "UPDATE user SET instagram = '$instagram' WHERE userID = '$userID'";
			$updateInstagram = mysqli_query($db, $query);
			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo'Updated your Instagram.';
			echo '</div>';
		}
			
		if (!empty($facebook)) {
			$query = "UPDATE user SET facebook = '$facebook' WHERE userID = '$userID'";
			$updateInstagram = mysqli_query($db, $query);
			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo'Updated your Facebook.';
			echo '</div>';
		}

		if (!empty($twitter)) {
			$query = "UPDATE user SET twitter = '$twitter' WHERE userID = '$userID'";
			$updateTwitter = mysqli_query($db, $query);
			echo '<div class="alert alert-success" id="alert" role="alert">';
				echo'Updated your Twitter.';
			echo '</div>';
		}
	}
?>