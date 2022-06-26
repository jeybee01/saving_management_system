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
if(isset($_POST['add'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$oname = $_POST['oname'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
//for db
	$photoName=time() .'-'.$_FILES['photo']['name'];
	//for image upload
	$target_dir = "../files/";
	$target_file= $target_dir . basename($photoName);
	//validation
	if ($_FILES['photo']['size'] > 2000000) {
		echo "image size should not be greater then 2kb";
	}
	//check if file exist
	if (file_exists($target_file)) {
		# code...
		echo "file already exists";
		exit();
	}
	//upload image only if no error
	if (empty($error)) {
		if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
     
     $sql = "INSERT INTO customer_table (firstname, lastname, othername, phone, gender, payment_id, photo) VALUES('$fname', '$lname', '$oname', '$phone', '$gender', '$payment_id', '$photoName')";

     if ($conn->query($sql) === TRUE) {
	$_SESSION['success'] = 'New Customer Added successfully';
     header("Location: ../home.php");
     exit();
     }
     else{
     	$_SESSION['error'] = 'Something Went Wrong While Adding';
     }
     	}
	}

}
else{
	header("Location: ../home.php");
	exit();
}


?>