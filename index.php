 <?php
session_start();
include 'connect.php';
include 'function.php';

if (!isset($_SESSION['adminEmail'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="AX-U" content="IE-edge">
	<meta name="viewport" content="width =device-width, initial-scale=1.0">
	<title>SAVING MANAGEMENT SYSTEM &hearts;</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">	

</head>
<body>
<?php
	include('header.php');
?>

<section class="center-text">

	<strong>Admin Login Area</strong>
	<div class="login-form box-center">
		<?php

		if (isset($_SESSION['error'])) {
			showError();
		}
		?>
		<form action="login/index.php" method="post">
			<div class="form-group">
				<label for="email" class="sr-only"></label>
			<input type="email" class="form-contol" name="email" placeholder="Admin@access.com" autofocus="" required="">
			</div>
			<div class="form-group">
				<label for="password" class="sr-only"></label>
			<input type="password" class="form-contol" name="password" placeholder="*****" required="">
			</div>
			<input type="submit" class="btn btn-primary" name="login" value="Login">
		</form>
		
	</div>
	
</section>


<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/jquery.min.js"></script>

</body>
</html>
<?php
}
else{
	// unset($_SESSION['adminEmail']);
	header('location:index.php');
	exit();
}
	unset($_SESSION['error']);
	$conn->close();

?>














<!--
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="vieport" content="width=device-width, initial-scale=1.0">
	<title>Savings Records System</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<header>
	<h1 class="logo">SAVINGS MANAGEMENT SYSTEM</h1>
</header>
<?php

?>	
<main>
<div class="form">
	<form action="login/index.php" method="post">
		<input type="email" name="email" placeholder="user@Admin.com" required="">
		<input type="password" name="pass" placeholder="*****" required="">
		<input type="submit">
	</form>
</div>
</main>
</body>
</html> -->