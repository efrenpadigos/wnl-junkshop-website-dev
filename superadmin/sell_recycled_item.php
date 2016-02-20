<?php
	$temp = 0;
	include('session.php');
?>
<?php
	include('includes/connect.php');
	$admin = $_SESSION['superadmin_id'];
?>

<!doctype html>
<html lang='en-us'>
		<?php
			include('template/header.php');	
		?>
			<body>
				<?php include('template/head.php'); ?>
				<br>
				<?php
							if(isset($_POST['save'])){
							if($_POST['cash'] < $_POST['total']){
								echo"<script>alert('hey your payment is lacking.');window.location.href=''</script>";
								exit;
							}
							else if(!is_numeric($_POST['cash']) ){
								echo"<script>alert('You cannot pay your obligation in letter. They will not accept you.');window.location.href=''</script>";
								exit;
							}
							else
							{
								mysql_query("delete from temp_recycled_item");
							}
							}
				?>
					<div id='content' style='height:500px;'>
					<div id='menu'>
					<?php include('template/menu.php'); ?>
					</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sell Recycled Item</h1>
						<?php include('head2.php'); ?>
						<div class='left1'>
							<h1 style='margin-top:-10px;font-size:20px;' align='center'>CHART</h1>
							<table align='center'>
						
							<th>Image</th>
							<th>Item Category</th>
							<th>Weight</th>
							<th>Price</th>
							<th></th>
							<?php
									include('includes/connect.php');
									$query = mysql_query("select * from temp_recycled_item where branch_name = '$branch' ") or die(mysql_error());
										while($row = mysql_fetch_array($query)){
											$id = $row['item_id'];
						
								?>	
								<tr align='center'>
									<?php echo '<td><a href="view_image.php?view='.$id.'" rel="facebox"><img src="images/'.$row['file_name'].'" width="50" height="30" ></a></td>'; ?>
									<td><?php echo $row['item_category']; ?></td>
									<td><?php echo $row['weight']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><a href="delete_sell_item.php?id=<?php echo $id; ?>" ><image src="images/delete.png" /></a></td>
								</tr>
							<?php
								}
							?>
						</table><br />
						
								<center><button><a href="compute_change1.php?id=<?php echo $temp; ?>&temp=<?php echo $temp; ?>" style='text-decoration:none;' rel='facebox'>SAVE</a></button></center><br/>
						</div>
						<div class='right1' align='center'>
						<h1 style='margin-top:-10px;font-size:20px;' align='center'>Recycled Item</h1>
							<table align='center'>
								<th>Image</th>
								<th>Price</th>
								<th>Action</th>
								<?php
									$query = mysql_query("select * from recycled_item where branch_name = '$branch'");
										while($row = mysql_fetch_array($query)){
											$id = $row['item_id'];
								?>
								<tr align='center'>
									<?php echo '<td><a href="view_image.php?view='.$id.'" rel="facebox"><img src="images/'.$row['file_name'].'" width="50" height="30" ></a></td>'; ?>
									<td><?php echo $row['price']; ?></td>
									<td>
										    <a href='sell_process.php?sell=<?php echo $id; ?>' onclick='return confirm("Are you sure you want to sell it?")'> SELL</a>&nbsp;
										</td>
								</tr>
								<?php
										}
									?>
							</table>
						</div>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM price WHERE price_id = '$_GET[del]'") or die(mysql_error());
							}
					?>
					
			</body>
		</html>	