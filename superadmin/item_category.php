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
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Item Category </h1>
						<button><a href='add_category.php' type='text' rel='facebox'> Add New Category </a></button>
					</form>
								<table id='resultTable'>
										<thead>
											<tr>
												<th width="20%" > ITEM CATEGORY </th>							
												<th width="20%" > Action </th>
											</tr>
										</thead>
											
											<?php 
											$res = mysql_query("SELECT * FROM item_category");
											if($res)
												while($row = mysql_fetch_array($res))
												{
													$id = $row['id'];
												?> <tr align="center">
														<td align="center"> <?php echo $row['name'];?></td>																																																						
														<td>
															<a href="edit_category.php?update=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
															<a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'><i class="icon-trash"></i> Delete</a>	  
														</td>
													<tr/>
												<?php 
												}											
											?>												
								</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM item_category WHERE id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Category has been deleted.');window.location.href='item_category.php'</script>";
							}
					?>
					
			</body>
		</html>	
<?php
	if(isset($_POST['save']))
	{
		include('includes/connect.php');
	
		$item_category = $_POST['item_category'];
		
	
		$query= mysql_query ("INSERT INTO item_category values('','$item_category')");
		
				echo"<script> alert('add sucess.');window.location.href=''</script>";
				exit;
		
		}
		