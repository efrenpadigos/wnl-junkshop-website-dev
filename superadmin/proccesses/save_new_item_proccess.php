<?php
if(isset($_POST['save_new_item'])){
	
	$description = trim($_POST['idescription']);
	$item_category = trim($_POST['icategory']);
	$price = ($_POST['iprice']);
	$unit_of_measure = trim($_POST['unitofmeasure']);
	
	$error = false;
	if($description == ''){
		$error = "Invalid item description.";
	}
	if(!$error && ($item_category==""|| ! item_category_exists(false,$item_category))) {
		$error = "Invalid item price.";
	}
	if(!$error && (float)$price <= 0){
		$error = "Invalid item price.".$price." ".$_POST['iprice1']." ".$_POST['iprice2'];
	}else{
		$price= (float)$price;
	}
	if(!$error && ($unit_of_measure==""|| ! unit_of_measurement_exists($unit_of_measure))) {
		$error = "Invalid unit of measure.".$unit_of_measure;
	}
	if(!$error &&  item_exists($description,$item_category)){
		$error = 'Item already exists.';
	}
	if($error){
		echo '<script type="text/javascript"> alert("Save new item failed. '.$error.'"); </script>';
	}else{
		$query1 = mysql_query("INSERT INTO items(item_description,item_category,price_per_unit,unit_of_measure) VALUES ('".$description."','".$item_category."','".$price."','".$unit_of_measure."')") or die(mysql_error());
		echo"<script> alert('Item has been successfully saved.'); window.location.href='items.php'</script>";
		exit();
	}
}
?>