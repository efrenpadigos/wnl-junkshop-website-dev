<!doctype html>
<?php
	include('includes/connect.php');
?>
<html lang='en-us'>
	<head>
		<title>WNL's Junk Shop</title>
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="src/argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
		<script src="src/application.js" type="text/javascript" charset="utf-8"></script>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<script src="src/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		  $('a[rel*=facebox]').facebox({
			loadingImage : 'src/loading.gif',
			closeImage   : 'src/closelabel.png'
		  })
		})
	</script>
	</head>
			<body>
				<?php include('template/head.php'); ?>
				<br>
					<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interest in every item</h1>
						<button><a href='add_item.php' type='text' rel='facebox'>Add Item</a></button>
					</form>
								<table id='resultTable'>
										<thead>
											<tr>
												<th width="25%" > ITEM CATEGORY </th>
												<th width="25%" > PRICE </th>
												<th width="25%" > Unit of Measure </th>
												<th width="25%" > Action </th>
											</tr>
										</thead>
									 <?php
												$query = mysql_query("select * from price");
												while($row = mysql_fetch_array($query)){
													$id = $row['price_id'];
										?>	
											<tr align='center'>
												<td><?php echo $row['item_category']; ?></td>
												<td><?php echo $row['price']; ?></td>
												<td><?php echo $row['unit_of_measure']; ?></td>
												 <td>
												   <a href="edit_item.php?update=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
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
		if(!is_numeric($price)){
			echo"<script> alert('Price not valid.');window.location.href=''</script>";
		}
		else{
		$query = mysql_query("INSERT INTO price VALUES('','$item_category','$price','$unit_of_measure')") or die(mysql_error());
				echo"<script> alert('Item has been added.');window.location.href=''</script>";
			}
	}
?>