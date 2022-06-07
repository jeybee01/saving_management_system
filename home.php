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
	<?php
		echo $_SESSION['success'];
	?>	
<section>
<div class="left-menu">
	<ul>
		<li><a href="home.php" class="active"><span>Home</span></a></li>
		<li><a href="add_customer.php"><span>ADD CUSTOMER</span></a></li>
		<li><a href="edit_customer.php"><span>EDIT PROFILE</span></a></li>
		<li><a href="logout.php"><span>LOGOUT</span></a></li>

	</ul>
</div>
<div class="main-section">
	<h4>Customer <small>Records</small></h4>
	<table>
		<tr>
			<th>S/N</th>
			<th>Fullname</th>
			<th>ID</th>
			<th>SEX</th>
			<th>PHONE</th>
			<th>PAYMENT_ID</th>
			<th>ACTIONS</th>

		</tr>
		<tbody>

			<?php

 include 'connect.php';

 $sql = "SELECT * FROM customer_table";

 $result = $conn->query($sql);
 if ($result->num_rows> 0) {

 	while ($row=$result->fetch_assoc()) { 
?>
             <tr>
				<td> <?= $row['id']?> </td>
				<td><?= $row['firstname']?></td>
				<td><?= $row['lastname']?></td>
				<td><?= $row['gender']?></td>
				<td><?= $row['phone']?></td>
				<td><?= $row['payment_id']?></td>
				<td><a href='edit_customer.php?user=<?=$row["id"]?>' class='edit' >Edit</a><a class='payment' href='payment.php?user=<?=$row["id"]?>'>Payment</a></td>

			</tr>
<?php
			}
 }
 

?>
		</tbody>
	</table>
</div>
</section>
</body>

</html>