<?php
session_start();


//if already logged in , redirect to profile
if(isset($_SESSION['user'])){
	header("location:profile.php");
	exit();
}




$error='';

//if email and password is posted/passed
if( isset($_POST['email']) && isset($_POST['password']) ){
	$db_connection = new mysqli("localhost","root","","test");

	//check if account exists with the combination of  email and passsword
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT id FROM user WHERE email='$email' AND password='$password'";
	$results = $db_connection->query($sql);

	if($results->num_rows > 0){
		//set session
		$_SESSION['user'] = 1;

		//logged in , so redirect to profile page
		header("location:profile.php");
	}
	else{
		$error="Wrong credentials";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form action="login.php" method="POST">
		<h2>Login</h2>

		<div><?= $error?></div>

		<input type="email" name="email" placeholder="Enter email">
		<input type="password" name="password" placeholder="Enter password">

		<button>LOGIN</button>

		<hr>
		<div class="more">Don't have account? <a href="signup.php">Signup</a></div>
	</form>

</body>
</html>