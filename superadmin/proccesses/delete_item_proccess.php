<?php
if(isset($_POST['delete_item'])){
	$delete_item_id = isset($_POST["delete_item_id"])?$_POST["delete_item_id"]:false;
	if(($delete_item_id && item_exists($delete_item_id))){
		
		$query1 = mysql_query("DELETE FROM items WHERE item_id = '".$delete_item_id."'") or die(mysql_error());
		echo "<script> alert('Item has been successfully deleted.'); window.location.href='items.php'; </script>";
		exit();
	
	}else{
		echo '<script type="text/javascript"> alert("Deleting item failed. Item not found or does not exists."'.$delete_item_id.'); '." window.location.href='items.php'; ".'</script>';
	}
}

?>