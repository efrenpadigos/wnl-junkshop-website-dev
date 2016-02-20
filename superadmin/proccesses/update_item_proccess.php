<?php
if(isset($_POST['save_update_item'])){
	
	$item_id = trim($_POST["item_id"]);
	$description = trim($_POST['idescription']);
	$item_category = trim($_POST['icategory']);
	$price = ($_POST['iprice']);
	$unit_of_measure = trim($_POST['unitofmeasure']);
	
	$error = false;
	$redirect_link = false;
	if($item_id == '' && !item_exists($item_id)){
		$error = "Invalid item selected or item does not exists.";
		$redirect_link = "items.php";
	}
	if($description == ''){
		$error = "Invalid item description.";
	}
	if(!$error && ($item_category==""|| ! item_category_exists(false,$item_category))) {
		$error = "Invalid item category.";
	}
	if(!$error && (float)$price <= 0){
		$error = "Invalid item price.";
	}else{
		$price= (float)$price;
		//$error = "Valid item price.".((float)$price);
	}
	if(!$error && ($unit_of_measure == ""|| ! unit_of_measurement_exists($unit_of_measure))) {
		$error = "Invalid unit of measure.";
	}
	if(!$error &&  item_exists($item_id,$description,$item_category,true)){
		$error = 'Item already exists.';
	}
	if($error){
		echo '<script type="text/javascript"> alert("Update item failed. '.$error.'"); '.(($redirect_link)?"window.location.href='".$redirect_link."'":"").'</script>';
	}else{
		$query1 = mysql_query("UPDATE items SET item_description='".$description."' ,item_category = '".$item_category."' ,price_per_unit = '".$price."' ,unit_of_measure = '".$unit_of_measure."' WHERE item_id = '".$item_id."'") or die(mysql_error());
		echo"<script> alert('Item has been successfully updated.'); window.location.href='items.php'</script>";
		exit();
	}
}
?>