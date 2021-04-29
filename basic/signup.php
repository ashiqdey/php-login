<?php
$error='';

//if email and password is posted/passed
if( isset($_POST['email']) && isset($_POST['password']) ){
	$conn = new mysqli("localhost","root","","test");

	$email = $_POST['email'];
	$password = md5($_POST['password']);


	//1. check if account exisst with this email
	$sql = "SELECT id FROM user WHERE email='$email'";
	$results = $conn->query($sql);

	if($results->num_rows > 0){
		$error="Account already exists with this email";
	}
	else{
		//2. create account
		$sql = "INSERT INTO user (email,password) VALUES ('$email', '$password')";

		if($conn->query($sql) === TRUE){
			//account created so redirect to profile page
			header("location:profile.php");
		} 
		else{
		  $error="Failed to create account"; 
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form action="signup.php" method="POST">
		<h2>Signup</h2>

		<div><?= $error?></div>

		<input type="email" name="email" placeholder="Enter email">
		<input type="password" name="password" placeholder="Enter password">

		<button>SIGNUP</button>

		<hr>
		<div class="more">Already have account? <a href="login.php">Login</a></div>
	</form>

</body>
</html>