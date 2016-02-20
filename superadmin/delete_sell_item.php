<?php
	include('includes/connect.php');
	$id = $_GET['id'];

	$query = mysql_query("select * from temp_recycled_item where item_id = '$id'") or die(mysql_error());
		while($row= mysql_fetch_array($query)){
			$item_id = $row['item_id'];
			$item_category = $row['item_category'];
			$weight = $row['weight'];
			$file_name = $row['file_name'];
			$date_uploaded = $row['date_uploaded'];
			$price = $row['price'];
			$branch = $row['branch_name'];
		}
		$query3 = mysql_query ("insert into recycled_item values('','$item_category','$weight','$file_name','$date_uploaded','$price','$branch')");
		
		mysql_query("DELETE from temp_recycled_item WHERE item_id ='$id'");
		header('Location:sell_recycled_item.php');



?>