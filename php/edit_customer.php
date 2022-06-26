<?php
session_start();
include '../connect.php';
if (isset($_POST['edit'])) {	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$oname = $_POST['oname'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$user_id = $_POST['user_id'];

	$sql = "UPDATE customer_table SET firstname='$fname', lastname='$lname', othername='$oname', phone='$phone', gender='$gender' WHERE id = '$user_id' ";
	if ($conn->query($sql) === TRUE) {
			$_SESSION['success'] = 'Customer Record Updated Successfully';
	header('Location: ../home.php');
	exit();

}
else{

	$_SESSION['error'] = 'Something Went Wrong In Updating Student Record';
}
}
?>