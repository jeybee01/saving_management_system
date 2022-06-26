<?php
session_start();
include '../connect.php';

if (isset($_POST['deposit'])) {
	// print_r("yes you hit deposit button");
	// exit();
	$user_id = $_POST['user_id'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$dates = date('y-m-d');
	// $ram_user_id = ($user_id + 23);
	$transaction_type = 'Deposit';
	if ($balance == null or $balance == 0) {
		$balance = 0;
	}
	$new_balance = $balance + $amount;
	
	
		$sql2 = "SELECT * FROM balance WHERE id = '$user_id'";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
		$update_balance ="UPDATE history SET amount='$new_balance' WHERE user_id='$user_id'";
		$result1 = $conn->query($update_balance);
		$sql ="UPDATE balance SET amount='$new_balance' WHERE user_id='$user_id'";
		$result = $conn->query($sql);
		if ($result) {
	  	// $_SESSION['deposit_msg']= "<center><strong>Deposited Succesfully</strong></center>";
		header('Location: ../home.php');
		exit();
	}
		}
		else{

		$sql1 = "INSERT INTO history (user_id, amount, dates, transaction_type)
 	    VALUES ('$user_id','$amount','$dates','$transaction_type')";
 				if ($conn->query($sql1) == TRUE) {
			$sql3 = "INSERT INTO balance (user_id, amount) VALUES ('$user_id', '$amount')";
			if ($conn->query($sql3)== TRUE) {
	  	// $_SESSION['deposit_msg']= "<center><strong>Deposited Succesfully</strong></center>";
		header('Location: ../home.php');
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
	$user_id = $_POST['user_id'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$dates = date('y-m-d');
	// $ram_user_id = ($user_id + 23);
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
	  	// $_SESSION['withdraw_msg']= "<center><strong>Withdraw Succesfully</strong></center>";
		header('Location: ../home.php');
		exit();
	}
		}
		else{

		$sql1 = "INSERT INTO history (user_id, amount, dates, transaction_type)
 	    VALUES ('$user_id','$amount','$dates','$transaction_type')";
 				if ($conn->query($sql1) == TRUE) {
			$sql3 = "INSERT INTO balance (user_id, amount) VALUES ('$user_id', '$amount')";
			if ($conn->query($sql3)== TRUE) {
	  	// $_SESSION['withdraw_msg']= "<center><strong>Withdraw Succesfully</strong></center>";
		header('Location: ../home.php');
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
?>