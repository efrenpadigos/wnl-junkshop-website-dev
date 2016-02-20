<?php
	include('includes/connect.php');
	if(isset($_POST['updateitem'])){
		$item_id= $_POST['item_id'];
	$item_category= $_POST['item_category'];
	$desc= $_POST['item_description'];
	$price= $_POST['price_per_unit'];
	$unit_of_measure= $_POST['unit_of_measure'];
	$name=mysql_query("UPDATE items SET item_category='$item_category',item_description='$desc',price_per_unit='$price',unit_of_measure='$unit_of_measure'
		WHERE item_id='$item_id'") or die (mysql_error());
	echo"<script> alert('Item has been updated.');window.location.href='items.php'</script>";
	}
	
	
?>

