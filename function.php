<?php
	function clean($data){
		$data = trim($data);
		$data = stripslashes($data);

		return $data;

	}

	function showSuccess(){
		echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
	}
	function showError(){
		echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
	}
?>