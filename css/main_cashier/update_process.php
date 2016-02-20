<?php
	include('includes/connect.php');
	if(isset($_POST['update'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact_no'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cashier_id = $_POST['cashier_id'];
		
		$query = mysql_query("UPDATE cashier_profile SET firstname = '$firstname', middlename = '$middlename',  lastname = '$lastname', gender = '$gender',  address = '$address', birthdate = '$birthdate',  contact_no = '$contact', username = '$username', password = '$password' WHERE cashier_id = '$cashier_id'") or die(mysql_error());
				echo"<script> alert('Your Profile has been updated.');window.location.href='myaccount.php'</script>";
	}
?>