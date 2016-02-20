<?php
	include('includes/connect.php');
	if(isset($_POST['update'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$admin_id = $_POST['admin_id'];
		$branch = $_POST['branch'];
		
		$query = mysql_query("UPDATE admin_profile SET branch_name='$branch', firstname = '$firstname', middlename = '$middlename',  lastname = '$lastname', gender = '$gender',  address = '$address', birthdate = '$birthdate',  contact_no = '$contact', username = '$username', password = '$password' WHERE admin_id = '$admin_id'") or die(mysql_error());
				echo"<script> alert('Admin Profile has been updated.');window.location.href='admin.php'</script>";
	}
?>