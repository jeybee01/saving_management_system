<?php
session_start();
include '../connect.php';
if (isset($_POST['save'])) {	

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$oname = $_POST['oname'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$user_id = $_POST['user_id'];
	$photo=$_POST['file'];
	// print_r($user_id);


	$sql = "UPDATE customer_table SET firstname='$fname', lastname='$lname', othername='$oname', phone='$phone', gender='$gender', photo='$photo' WHERE id = '$user_id' ";
	if ($conn->query($sql) === TRUE) {
		# code...
	
	echo "user record Updated Succesfully";
	header('Location: edit_customer.php');
	exit();

}
else{

	echo "error with query". $conn->error;
}
}
?>