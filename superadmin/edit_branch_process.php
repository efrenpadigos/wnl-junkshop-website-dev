<?php
	include('includes/connect.php');
	$branch_name= $_POST['branch_name'];
	$branch= $_POST['branch'];
	$address= $_POST['address'];
	$branch_id= $_POST['branch_id'];
	
	$query = mysql_query("UPDATE branch SET branch_name='$branch_name', address='$address' WHERE branch_id='$branch_id'");
	//$query = mysql_query("UPDATE admin_profile SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE cashier_profile SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE inventory SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE recycled_item SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE sales SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE sales_recycle SET branch_name='$branch_name' WHERE branch_name='$branch'");
	//$query = mysql_query("UPDATE temp_sales_recycle SET branch_name='$branch_name' WHERE branch_name='$branch'");
	echo"<script> alert('Branch has been updated.');window.location.href='branches.php'</script>";
?>