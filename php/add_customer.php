<?PHP 
	$charss = "00112233445566778899";
	srand((double)microtime()*1000000);
	$j = 0;
	$payment_id = 'AMS01' ;
	while ($j <= 5) {

		$num1 = rand() % 33;

		$tmp1 = substr($charss, $num1, 1);

		$payment_id = $payment_id . $tmp1;

		$j++;

	}

?>

<?php
session_start();
include '../connect.php';
if(isset($_POST['submit'])){

	$photo=$_FILES['photo']['name'];

	$size=$_FILES['photo']['size'];

	$type=$_FILES['photo']['type'];

	$temp=$_FILES['photo']['tmp_name'];

	move_uploaded_file($temp,"files/".$photo);

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$oname = $_POST['oname'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$fname = $_POST['fname'];

	// $customer_id =uniqid("MS01");
	
	// $md5a = md5($customer_id);
     
     $sql = "INSERT INTO customer_table (firstname, lastname, othername, phone, gender, payment_id, photo) VALUES('$fname', '$lname', '$oname', '$phone', '$gender', '$payment_id', '$photo')";

     if ($conn->query($sql) === TRUE) {
     header("Location: ../add_customer.php");
     exit();

     }
     else{
     	echo  "error with query: ". $sql . '<br>' . $conn->error;
     }

}
else{
	header("Location: ../home.php");
	exit();
}


?>