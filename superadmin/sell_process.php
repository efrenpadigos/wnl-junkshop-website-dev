<?php 
	include('includes/connect.php');
	$item_id = $_GET['sell'];
	
	$query = mysql_query("SELECT * from recycled_item where item_id ='$item_id'");
		while($row=mysql_fetch_array($query)){
			$item_id = $row['item_id'];
			$item_category = $row['item_category'];
			$weight = $row['weight'];
			$file_name = $row['file_name'];
			$date = $row['date_uploaded'];
			$price = $row['price'];
			$branch = $row['branch_name'];
			$date = $row['date_uploaded'];
			
			$query1 = mysql_query("insert into sell_recycled_item VALUES('','item_category','weight','$file_name','$date','$branch')");
			$query2 = mysql_query("insert into temp_sell_recycle_item VALUES('','item_category','weight','$file_name','$date','$branch')");
			$query3 = mysql_query("insert into temp_recycled_item VALUES('$item_id','$item_category','$weight','$file_name','$date','$price','$branch')");
			mysql_query("DELETE FROM recycled_item WHERE item_id = '$item_id'") or die(mysql_error());
			header('Location:sell_recycled_item.php');
		}

?>