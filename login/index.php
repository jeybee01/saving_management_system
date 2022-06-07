<?php
session_start();
include '../connect.php';


$email = $_POST['email'];
$password = $_POST['pass'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$sql = "SELECT * FROM admin WHERE email= '$email' AND password = '$password'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0){
$_SESSION['success'] = "<center>Login Succesfully!</center>";
	  while($row = $result->fetch_assoc()) {
        header('Location: ../home.php');
        exit();
	} 
}
	else {
         header('Location: ../index.php');
        exit();
}
}
else{
	echo "error some where!!!";
}

?>