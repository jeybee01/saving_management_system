<nav class="navbar navbar-default">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display --> 
    <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">SAVING MANAGEMENT SYSTEM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
		<?php 
		if(isset($_SESSION['adminEmail'], $_SESSION['adminPassword'])) {
 
		
			$query = "SELECT * FROM admin WHERE email = '".$_SESSION['adminEmail']."' AND password = '".$_SESSION['adminPassword']."'";;

		?>

			<form class="navbar-form navbar-right" action="searchresults.php" method="GET">
			
				<div class="welcome"><?php echo "Welcome Admin: <a href='profile.php'>".$_SESSION['adminEmail']."</a>!";?></div>

				<a href="logout.php">Log Out<span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>

			</form>

		<?php 
		} else {
			echo "<span class='not-logged'>Admin Only.</span>";
        }
		?>
    </div>
</div>
</nav>