<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Hypertrophy - Log In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Log in page for Hypertrophy">
		<meta name="author" content="Nathan Moton">

    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    	<link href="../css/global.css" rel="stylesheet" media="screen">
    	<link href="../css/login.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="wrapper">
			<form class="form-signin" method="post">
				<?php 
					include '../pages/userHandler.php';
					include '../errors/errors.php'; 
				?>
				<h2 class="temp-logo-holder text-center">Hypertrophy Logo</h2>
				<h2 class="form-signin-heading text-center">Welcome Back</h2>
				<p>Sign in to stay up to date with friends and family.</p>
				<input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus=""/>
				<input type="password" class="form-control" name="password" placeholder="Password" required="" />
				<button class="btn btn-lg btn-primary btn-block" name="login">Login</button>
				<small>
					<a href="">Forgot Password?</a>
				</small>
			</form>
		</div>
		<div class="wrapper" id="underLogin">
			<small>
				New to Hypertrophy?
				<a href="">Join For Free</a>
			</small>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>