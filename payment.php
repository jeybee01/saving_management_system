<?php
session_start();
include 'connect.php';

if (isset($_GET['user'])) {
	$user_id = $_GET['user'];
	$date = date("d-m-y");
	$sql = "SELECT * FROM customer_table WHERE id= '$user_id'";
	$result =$conn->query($sql);
	$row = $result->fetch_assoc();

	if ($row) {
		$sql1 = "SELECT * FROM balance WHERE user_id = '$user_id'";
	$result1 =$conn->query($sql1);
	$row1 = $result1->fetch_assoc();
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
	<?php
	if (isset($_SESSION['success'])) {
			echo $_SESSION['success'];
			session_destroy();
	}
	?>
<a href="home.php" class="btn-back">Back</a>

<main>
<div class="form">
	<form action="php/payment.php" method="post">
		<div class="info">
			<p><?= $date?></p>
		<center>	
		<div style="width: 100px; height:100px; border: 2px solid red;"></div>
		<div id="imgDisplayPhoto" align='center' style="border:1px solid red; height:160px; width:120px;">
		<img id="img_prev_Photo" alt="select an image" border="0" style="height:160px; width:120px;">
		</div>
		<p>Name:</p><span><?= $row['firstname'].' '.$row['lastname'].' '. $row['othername']; ?></span>
	</center>
		</div>
		
		<div class="input">
		<span>Balance</span>
		<input type="text" name="balance"  value="<?=$row1['amount']?>"  readonly="">	
		</div>
		<div class="input">
		<span>Amount:</span>
		<input type="text" name="amount"  value=""  required="">
		<input type="hidden" name="user_id"  value="<?=$user_id?>"  >

		</div>
		
		<!-- <input type="text" name="deposit"  value=""  ><span>Withdraw</span> -->
		<div class="btn-box">
		<input type="submit" name="withdraw" value="Withdraw">
		<input type="submit" name="deposit" value="Deposit">
		</div>
		
<?php
}
}
?>
	</form>
</div>
</main>
</body>
</html>