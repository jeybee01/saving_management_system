<?php
session_start();

require 'connect.php';
  require 'function.php';

  if(isset($_SESSION['adminEmail'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="vieport" content="width=device-width, initial-scale=1.0">
	<title>Savings Records System</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

</head>
<body>
	<?php
	include 'header.php';
	?>
<section>
	
<div class="container">
	<strong class="title">Admin Home Page</strong>
</div>

	<div class="profile-box box-left">
		<div class="container customers"> 
		<h1 >List Of All Customers</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
				<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
				?>
			</div>
			<div class="row">
				<a href="#addnew" class="btn btn-primary new" data-toggle="modal"><span class="glyphicon glyphicon-plus">NEW</span></a>
				<!-- <a href="#print" class="btn btn-primary print" data-toggle="modal"><span class="glyphicon glyphicon-print">PRINT</span></a> -->
				<?php
			include_once('add_modal.php');

				?>
			</div>
			
			<div class="row">
				<table class="table table-bordered table-striped" id="myTable">
					<thead>
						<tr>
							<th>SN</th>
							<th>FIRSTNAME</th>
							<th>LASTNAME</th>
							<th>CUSTOMER ID</th>
							<th>GENDER</th>
							<th>PHONE</th>
							<th>ACTION</th>

						</tr>
					</thead>
					<tbody>
								<?php

 include 'connect.php';
 $ramd = 23;

 $sql = "SELECT * FROM customer_table";
 $result = $conn->query($sql);
 	while ($row=$result->fetch_assoc()) {
 	echo "			
             <tr>
				<td>".$row['id']."</td>
				<td>".ucwords($row['firstname'])."</td>
				<td>".ucwords($row['lastname'])." ".ucwords($row['othername'])."</td>
				<td>".$row['payment_id']."</td>
				<td>".ucwords($row['gender'])."</td>
				<td>".$row['phone']."</td>
				<td><a href='#edit_".$row['id']."' class='btn btn-primary btn-sm' data-toggle='modal'>Edit</a>
				<a class='btn btn-success btn-sm btn-left' href='#payment_".$row['id']."' data-toggle='modal'>Payment</a></td>

			</tr>";
			include('edit_payment.php');
			 $customer_id = $row['id'];
	
	$date = date("d-m-y");
		$sql1 = "SELECT * FROM balance WHERE user_id = '$customer_id'";
	$result1 =$conn->query($sql1);
	$getBalance = $result1->fetch_assoc();
	

 }
 

?>
		</tbody>
				</table>
			</div>
		</div>
		 </div>
	</div>
<!--for table extra functionality -->
	<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->

	<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</div>



</section>
<script  src="asset/js/jquery-3.1.1.min.js"></script>
<script  src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>
</body>

</html>
<?php
}
else{
	header('location:index.php');
	exit();
}
// unset($_SESSION['adminEmail']);

?>