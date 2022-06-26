<?php
	 $customer_id = $row['id'];
	$date = date("d-m-y");
	$sql1 = "SELECT * FROM balance WHERE user_id = '$customer_id'";
	$result1 =$conn->query($sql1);
	$getBalance = $result1->fetch_assoc();
	
?>


<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Customer's Record</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/edit_customer.php">
				<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">First Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" value="<?php echo $row['firstname']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Last Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname" value="<?php echo $row['lastname']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Other Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="oname" value="<?php echo $row['othername']; ?>" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Gender:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?php echo $row['gender']; ?>" disabled>
						<select class="form-control" name="gender" required>
							<option value="Female">Female</option>
							<option value="Male">Male</option>
						</select>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Phone:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required>
					</div>
				</div>
<!-- 				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
					</div>
				</div> -->
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Payment -->
<div class="modal fade" id="payment_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><strong>Date:</strong><?=$date?></h4></center>
            </div>
            <div class="modal-body">
            <center>
            	<div id="imgDisplayPhoto" align='center'  style="border:1px solid red; display: block; height:160px; width:120px;">
		      <?php echo "<img src='files/".$row['photo']."' alt='select an image' border='0' style='height:160px; width:120px;'> ";  ?>
		</div>
            </center>	
            	<p class="text-center"> <?php echo $row['firstname'].' '.$row['lastname']; ?></p>
            	<?php
		  $query_balance="SELECT SUM(amount) AS 'count_balance' FROM balance";
		  $balance_result = $conn->query($query_balance);
		  while ($balance_row=$balance_result->fetch_assoc()) {
		?>
				<h3 class="text-center"><strong>Total Balance= </strong>&#8358;<?php echo $balance_row['count_balance'] ?></h3>
				<?php
			} ?>
		<hr>
				  <form method="POST" action="php/payment.php">
				<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['id']; ?>">
		
		        <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Balance:</label>
					</div>
					<div class="col-sm-10">
						<input type="text"  class="form-control" name="balance" value="&#8358;<?php echo $getBalance['amount']; ?>" readonly="">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Amount:</label>
					</div>
					<div class="col-sm-10">
						<input type="text"  class="form-control" name="amount"  autofocus="" required="">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
					<button type="submit" name="deposit" class="btn btn-info btnLeft"><span class="glyphicon glyphicon-plus"></span>Deposit</button>
					
					</div>
					<div class="col-sm-6">
					<button type="submit" name="withdraw" class="btn btn-danger"><span class="glyphicon glyphicon-minus"></span>Withdraw</button>
					</div>
				</div>
              
			</form>
			</div>			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                
            </div>

        </div>
    </div>
</div>