<?php
session_start();
include '../connect.php';
include '../function.php';

if (isset($_POST['login'])) {
	$email = clean($_POST['email']);
$password = clean($_POST['password']);
	$sql = "SELECT * FROM admin WHERE email= '$email' AND password = '$password'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$_SESSION['adminId']=$row['id'];
		$_SESSION['adminEmail'] = $row['email'];
	  	$_SESSION['adminPassword']= $row['password'];
        header('Location: ../home.php');
        exit();

}
	else {
		$_SESSION['error']="Wrong Email or Password";
         header('Location: ../index.php');
}
}


?>