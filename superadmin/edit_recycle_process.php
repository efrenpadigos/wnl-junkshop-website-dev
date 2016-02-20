<?php
	include('includes/connect.php');
	$item_category = $_POST['item_category'];
	$price= $_POST['price'];
	$item_id= $_POST['item_id'];
	$weight= $_POST['weight'];
	$name= $_POST['name'];
	
	$query = mysql_query("UPDATE recycled_item SET name='$name', item_category='$item_category',weight='$weight', price='$price' WHERE item_id='$item_id'");
	echo"<script> alert('Recycled Item has been updated.');window.location.href='recycle.php'</script>";
?>