<?php
session_start();

//if not logged in , redirect to login page
if(!isset($_SESSION['user'])){
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form>
		<h2>Profile</h2>
		<h4>hello, this is your profile page</h4>

		<div>
			Elon Reeve Musk FRS is a business magnate, industrial designer, and engineer. He is the founder, CEO, CTO, and chief designer of SpaceX; early stage investor, CEO, and product architect of Tesla, Inc.; founder of The Boring Company;
		</div>

		<a href="logout.php"><button type="button">LOGOUT</button></a>
	</form>

</body>
</html>