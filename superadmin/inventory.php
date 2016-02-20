
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
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inventory</h1>
					<form action='' method='post'>
						<div style='float:right;margin-right:35px;'>
							<select name="search" style='margin-bottom:10px;'>
								<option value="">Search Branch</option>
								<?php
									$query = mysql_query("select * from branch order by branch_id asc");
										while($row = mysql_fetch_array($query)){
										echo '<option value="'.$row['branch_name'].'"';
											if(isset($_POST['search']) && trim($_POST['search']) == $row['branch_name']){
												$branch = $row['branch_name'];
											echo ' SELECTED="SELECTED" ';
										}
										echo '>';
										echo $row['branch_name'];
										echo '</option>';
									}
								?>
							</select>
					<input type='submit' name='' value='SEARCH' style='height : 25px;' />
						</div>
					</form>	
						<h1 align='center'><?php echo $row ['branch']; ?></h1>
								<table id='resultTable'>
										<thead>
										  <th style='width:25%;'>Item Category</th>
										   <th style='width:25%;'>Quantity</th>
										   <th style='width:25%;'>Unit of Measure</th>
										  <th style='width:25%;'>Total</th>
									</thead>
									  <?php
										
											$where = "where branch_name='$branch'";
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from inventory ".$where."");
												while($row = mysql_fetch_array($query)){
										?>	
												<tr align='center'>
												  <td><?php echo $row['item_category'] ?></td>
												  <td><?php echo $row['quantity'] ?></td>
												  <td><?php echo $row['unit_of_measure'] ?></td>
												  <td><?php echo $row['total'] ?></td>
												</tr>
											<?php
											}
											?>
								</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM sales_inventory WHERE sales_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Price has been deleted.');window.location.href='inventory.php'</script>";
							}
					?>
			</body>
		</html>	
