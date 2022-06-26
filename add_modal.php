<html>
<head>
</head>
<body>
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Customer</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/add_customer.php" enctype="multipart/form-data">
	
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">First Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Last Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname"  placeholder="Enter Last Name" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Other Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="oname"  placeholder="Enter Other Name" required>
					</div>
				</div>
			
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Phone:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
					</div>
				</div>

				
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Gender:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="sex" required>
							<option value="Select Gender">Select Gender</option>
							<option value="Female">Female</option>
							<option value="Male">Male</option>
						</select>
					</div>
				</div>

	
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Passports:</label>
					</div>
					<div class="col-sm-10">
						<img id="profileDisplay" src="files/avatar.jpg" alt="Select an image"  onclick="triggerClick()" border="0" style="height:160px; width:120px;">
		               <input type="file" name="photo" class="file_upload" id="profileImage" onClick="imageDown();" onChange="displayImage(this);" style="display: none;" />
		           </div>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/photo.js"></script> 

</body>
</html>
