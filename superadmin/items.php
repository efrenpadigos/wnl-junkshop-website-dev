
<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "items";

	if(isset($_POST['save'])){
		$item_category = $_POST['item_category'];
		$price_whole_part = (int)$_POST['price_per_unit_whole'];
		$price_decimal_part = (double)("0.".($_POST['price_per_unit_decimal']));
		$price = round(($price_whole_part+$price_decimal_part),2);
		$unit_of_measure = $_POST['unit_of_measure'];
		$item_category1 = $item_category;
		$desc = $_POST['desc'];
		
		if(!is_numeric($price)){
			echo"<script> alert('Price not valid.');window.location.href=''</script>";
			exit;
		}
		$query= mysql_query ("select * from items where item_category = '$item_category1' and description = '$desc'");
		if($query && mysql_num_rows($query)>0){
				echo"<script> alert('Item already exists.');window.location.href=''</script>";
					exit;
		
		}
		else{
		$query1 = mysql_query("INSERT INTO items VALUES ('','".$desc."','".$item_category."','".$price."','".$unit_of_measure."','','')") or die(mysql_error());
				echo"<script> alert('Item has been added.');window.location.href=''</script>";
			}
	}
	if(isset($_GET['del'])){
		mysql_query("DELETE FROM items WHERE item_id = '$_GET[del]'") or die(mysql_error());
			echo"<script> alert('Item has been deleted.');window.location.href='items.php'</script>";
	}
?>
<!doctype html>
<html lang='en-us'>
	<?php
		include('template/header.php');	
	?>
	<body>
		<?php
			include('includes/error_alert.php');
		?>
		<?php include('template/head.php'); ?>
		<br>
		<div id='content' style='min-height:250px;'>
			<div id='menu'>
				<?php include('template/menu.php'); ?>
			</div>
			<h1 id="content-title" style='color:maroon;border-bottom:1px solid #ccc; padding-left:20px;'>
				ITEMS
			</h1>
			<div id="content-submenu" style="">
				<a class="button" href='forms/add_item_form.php?facebox=1' type='text' rel='facebox'><img class="button-icon" src='images/add.png' height='18' width='18'> New Item </a>
				
			</div>

			<div id="content-container" style="min-height:120px;">
				<table id='resultTable'>
					<thead>
						<tr>	
							<th width="20%" > DESCRIPTION </th>
							<th width="20%" > CATEGORY </th>												
							<th width="20%" > PRICE PER UNIT </th>
							<th width="20%" > Unit of Measure </th>
							<th width="20%" > Action </th>
						</tr>
					</thead>
				 <?php
							$query = mysql_query("select * from items");
							while($row = mysql_fetch_array($query)){
								$id = $row['item_id'];
					?>	
						<tr align='center'>
							<td><?php echo $row['item_description']; ?></td>
							<td><?php echo $row['item_category']; ?></td>
							<td><?php echo "&#8369;" .$row['price_per_unit']. "/".$row['unit_of_measure']; ?></td>	
							<td><?php echo $row['unit_of_measure']; ?></td>
							 <td>
							   <a href="forms/edit_item_form.php?item_id=<?php echo $id; ?>&facebox=1" rel='facebox'> <img src='images/edit.png' height='18' width='18'></a> |&nbsp;
							   <a href='forms/delete_item_form.php?item_id=<?php echo $id; ?>&facebox=1' rel='facebox' ><i class="icon-trash"></i> <img src='images/delete.jpg' height='18' width='18'></a>		  
							</td>
						</tr>
				<?php
					}
				?>
			</table>
			</div>
		</div>
			<?php include('template/footer.php'); ?>
	</body>
</html>