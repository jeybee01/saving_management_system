<?php
session_start();
include '../connect.php';

if (isset($_POST['deposit'])) {
	# code...
	$user_id = $_POST['user_id'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$dates = date('y-m-d');
	$transaction_type = 'Deposit';
	if ($balance == null or $balance == 0) {
		$balance = 0;
	}
	$new_balance = $balance + $amount;
	
	
		$sql2 = "SELECT * FROM balance WHERE id = '$user_id'";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
		$sql1 ="UPDATE history SET amount='$new_balance' WHERE user_id='$user_id'";
		$result1 = $conn->query($sql1);
		$sql ="UPDATE balance SET amount='$new_balance' WHERE user_id='$user_id'";
		$result = $conn->query($sql);
		if ($result) {
$_SESSION['success'] = "<center>Deposited Succesfully!</center>";
		header('Location: ../payment.php?user='.$user_id);
		exit();
	}
		}
		else{

		$sql1 = "INSERT INTO history (user_id, amount, dates, transaction_type)
 	    VALUES ('$user_id','$amount','$dates','$transaction_type')";
 				if ($conn->query($sql1) == TRUE) {
			$sql3 = "INSERT INTO balance (user_id, amount) VALUES ('$user_id', '$amount')";
			if ($conn->query($sql3)== TRUE) {
		header('Location: ../payment.php?user='.$user_id);
				exit();
			}
			else{
		echo "error with sql3 query". $conn->error;
	}

		}
		else{
		echo "error with sql1 query". $conn->error;
	}
		}
	}



	if (isset($_POST['withdraw'])) {
	# code...
	$user_id = $_POST['user_id'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$dates = date('y-m-d');
	$transaction_type = 'Withdraw';
	if ($balance == null or $balance == 0) {
		$balance = 0;
	}
	$new_balance = $balance - $amount;
	
	
		$sql2 = "SELECT * FROM balance WHERE id = '$user_id'";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
		$sql1 ="UPDATE history SET amount='$new_balance' WHERE user_id='$user_id'";
		$result1 = $conn->query($sql1);
		$sql ="UPDATE balance SET amount='$new_balance' WHERE user_id='$user_id'";
		$result = $conn->query($sql);
		if ($result) {
		header('Location: ../payment.php?user='.$user_id);
		exit();
	}
		}
		else{

		$sql1 = "INSERT INTO history (user_id, amount, dates, transaction_type)
 	    VALUES ('$user_id','$amount','$dates','$transaction_type')";
 				if ($conn->query($sql1) == TRUE) {
			$sql3 = "INSERT INTO balance (user_id, amount) VALUES ('$user_id', '$amount')";
			if ($conn->query($sql3)== TRUE) {
		header('Location: ../payment.php?user='.$user_id);
				exit();
			}
			else{
		echo "error with sql3 query". $conn->error;
	}

		}
		else{
		echo "error with sql1 query". $conn->error;
	}
		}
	}

// if (isset($_POST['withdraw'])) {
// 	$user_id = $_POST['user_id'];
// 	$amount = $_POST['amount'];
// 	$balance = $_POST['balance'];
// 	$dates = date('y-m-d');
// 	$transaction_type = 'Withdraw';
// 	$new_balance = $balance - $amount;

// 	$sql1 = "INSERT INTO history (user_id, amount, dates, transaction_type)
//    VALUES ('$user_id','$amount','$dates','$transaction_type')";
// 	if ($conn->query($sql1) == TRUE) {
// 	$sql ="UPDATE balance SET amount='$new_balance' WHERE user_id='$user_id'";
// 		$result = $conn->query($sql);
// 		if ($result) {
// 		header('Location: ../payment.php?user='.$user_id);
// 		exit();
// 	}
// 	else{
// 		echo "error with query in sql". $conn->error;
// 	}
// 		}
		
// 	else{
// 		echo "error with sql1 query". $conn->error;
// 	}
// }
?>