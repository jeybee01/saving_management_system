<?php
session_start();
include 'connect.php';
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
</header>	
<a href="home.php" class="btn-back">Back</a>
<?php

if (isset($_POST['search'])) {
	$payment_id = $_POST['payment_id'];
	$search_query = "SELECT customer_table.*, balance.* FROM customer_table INNER JOIN balance
	WHERE customer_table.id = balance.user_id AND customer_table.payment_id = '$payment_id'";
	
}
else{
	$search_query = "SELECT customer_table.*, balance.* FROM customer_table INNER JOIN balance
	WHERE customer_table.id = balance.user_id ";

}
?>

<section class="customer_main_box">
<div class="form">
	<form id="myForm" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
		<div class="input">
		<!-- <span><strong>Search Customer:</strong></span> -->
		<input type="text" name="payment_id"  value="" placeholder="Search by payment_id" required="" autocomplete="name" autofocus="">

		</div>
		<div class="btn-box">
		<input type="submit" name="search"  value="search">
		</div>

	</form>
</div>


		<div class="info">
		<center id="main_table">	

		<table>
			<tr>
				<th>SN</th>
				<th>FULLNAME</th>
				<th>GENDER</th>
				<th>PHONE</th>
				<th>BALANCE</th>
				<th>ACTIONS</th>


			</tr>
			<tbody>
				<?php
				$result = $conn->query($search_query);
				$ramd = 23;
				while ($row= $result->fetch_assoc()) {
					?>
				
				<tr>
					<td><?=$row['id']?></td>
					<td><?=$row['firstname']." ".$row['lastname']." ".$row['othername']?></td>
					<td><?=$row['gender']?></td>
					<td><?=$row['phone']?></td>
					<td><b><?=$row['amount']?></b></td>
									<td><a href='edit_customer.php?user=<?=$row["id"]+$ramd?>' class='edit' >Edit</a><a class='payment' href='payment.php?user=<?=$row["id"]+$ramd?>'>Payment</a></td>

				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</center>

	
		</div>
		

</section>
<script type="text/javascript">

</script>
</body>
</html>
<?php
}
?>
