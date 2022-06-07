<?php
session_start();
include 'connect.php';
if(isset($_GET['user'])){
	$user_id = $_GET['user'];
	// $_SESSION['user_id'] = $user_id;
	// print_r($_SESSION);
}
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
	<form action="php/edit_customer.php" method="post">
		<?php
		$sql = "SELECT * FROM customer_table WHERE id = '$user_id'";

		$result = $conn->query($sql);
		$customer = $result->fetch_assoc();
		   // print_r($customer);
		if ($customer) {
		
		?>
		<input type="text" name="fname"  value="<?=$customer['firstname']?>"  required="">
		<input type="text" name="lname"  value="<?=$customer['lastname']?>"  required="">
		<input type="text" name="oname"  value="<?=$customer['othername']?>"  >
		<input type="text" name="payment_id"  value="<?=$customer['payment_id']?>" readonly="" required="">
		<input type="radio" name="gender" value="male" checked> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other
		<input type="text" name="phone"  value="<?=$customer['phone']?>"  required="">
		<input type="hidden" name="user_id"  value="<?=$customer['id']?>"  required="">
		<input type="file" name="file"   value="<?=$customer['photo']?>" >
		<input type="submit" name="save" value="SAVE">

		<?php
	}
	?>
	</form>
</div>
</main>
</body>
</html>