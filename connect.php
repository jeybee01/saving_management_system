<?php
$serverName = 'localhost';
$username = 'jeybee01';
$password = '';
$dbName = 'savingsdb';
$conn = new mysqli($serverName, $username, $password, $dbName);

if($conn->connect_error){
	die('Connection Failed:' . $conn->connect_error);
}
?>