<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	
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
			<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item</h1>
						<button><a href='add_item.php' type='text' rel='facebox'>Add New Item </a></button>
					</form>
								<table id='resultTable'>
										<thead>
											<tr>
												<th width="20%" > ITEM CATEGORY </th>	
												<th width="20%" > DESCRIPTION </th>												
												<th width="20%" > PRICE </th>
												<th width="20%" > Unit of Measure </th>
												<th width="20%" > Action </th>
											</tr>
										</thead>
									 <?php
												$query = mysql_query("select * from price");
												while($row = mysql_fetch_array($query)){
													$id = $row['price_id'];
										?>	
											<tr align='center'>
												<td><?php echo $row['item_category']; ?></td>
												<td><?php echo $row['description']; ?></td>
												<td><?php echo "&#8369;" .$row['price']. "/".$row['unit_of_measure']; ?></td>	
												<td><?php echo $row['unit_of_measure']; ?></td>
												 <td>
												   <a href="edit_item.php?item_id=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
												   <a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'><i class="icon-trash"></i> Delete</a>		  
												</td>
											</tr>
									<?php
										}
									?>
								</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM price WHERE price_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Item has been deleted.');window.location.href='Price.php'</script>";
							}
					?>
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		$item_category = $_POST['item_category'];
		$price = $_POST['price'];
		$unit_of_measure = $_POST['unit_of_measure'];
		$item_category1 = $item_category;
		$desc = $_POST['desc'];
		
		if(!is_numeric($price)){
			echo"<script> alert('Price not valid.');window.location.href=''</script>";
			exit;
		}
		$query= mysql_query ("select * from price where item_category = '$item_category1' and description = '$desc'");
		if($query && mysql_num_rows($query)>0){
				echo"<script> alert('file already exist.');window.location.href=''</script>";
					exit;
		
		}
		else{
		$query1 = mysql_query("INSERT INTO price VALUES('','$item_category','$desc','$price','$unit_of_measure')") or die(mysql_error());
				echo"<script> alert('Item has been added.');window.location.href=''</script>";
			}
	}
?>