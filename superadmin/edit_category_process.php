<?php
	include('includes/connect.php');
	if(isset($_POST['save'])){
		$item_category = $_POST['item_category'];
		$item_id = $_POST['item_id'];
		
		$query = mysql_query("UPDATE item_categories SET name='$item_category' WHERE id = '$item_id'") or die(mysql_error());
				echo"<script> alert('Category has been updated.');window.location.href='item_categories.php'</script>";
	}
?>