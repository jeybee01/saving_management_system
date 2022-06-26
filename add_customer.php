<?php
session_start();
if (!isset($_SESSION['jb'])) {
	header('Location:index.php');
	exit();
}else
{
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
<a href="home.php" class="btn-back">Back</a>
</header>	
<main>
<div class="form">
	<form action="php/add_customer.php" method="post" enctype="multipart/form-data">
		<input type="text" name="fname" placeholder="FirstName" required="">
		<input type="text" name="lname" placeholder="LastName" required="">
		<input type="text" name="oname" placeholder="OtherName" >
		<input type="radio" name="gender" value="male" checked> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other
		<input type="text" name="phone" placeholder="Phone" required="">
		<div class="form-group" >
		<!-- <label for="photo">Upload Passport</label> -->
		<img id="profileDisplay" src="files/avatar.jpg" alt="Select an image"  onclick="triggerClick()" border="0" style="height:160px; width:120px;">

		<input type="file" name="photo" class="file_upload" id="profileImage" onClick="imageDown();" onChange="displayImage(this);" style="display: none;" />
		</div>
		<input type="submit" name="submit" value="ADD CUSTOMER">
	</form>
</div>
</main>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/photo.js"></script> 

</body>
</html>
<?php
}
?>