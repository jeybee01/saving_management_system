<?php
session_start();
?>
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
</html>