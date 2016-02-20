<?php
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
					<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report</h1>
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
					<br>
					<center><h1><?php echo $row ['branch_name']; ?></h1></center>
					
					<center><h1>SAles recycled item</h1></center>
								<table id='resultTable'>
										<thead>
										  <th style='width:20%;'>Item Category</th>
										   <th style='width:20%;'>weight</th>
										   <th style='width:20%;'>file name</th>
										  <th style='width:20%;'>date sold</th>
										  <th style='width:20%;'>branch</th>
									</thead>
									  <?php
											$where = '';
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from sell_recycled_item ".$where."");
												while($row = mysql_fetch_array($query)){
										?>	
												<tr align='center'>
												  <td><?php echo $row['item_category'] ?></td>
												  <td><?php echo $row['weight'] ?></td>
												  <td><?php echo $row['file_name'] ?></td>
												  <td><?php echo $row['date_sold'] ?></td>
												  <td><?php echo $row['branch_name'] ?></td>
												</tr>
												
											<?php
											}
											?>
											<tr>
												<td colspan='2'>&nbsp;</td>
												<td align='center'>Grand Total:</td>
												<td align='center'>
												<?php 
											$query1 = mysql_query("SELECT sum(total) from sales_recycle $where") or die(mysql_error());
												while($row1 = mysql_fetch_array($query1)){
													$total = $row1['sum(total)'];
												}
												echo $total;
										?>
										</td>
										</tr>
								</table>
						<center><h1>Sales</h1></center>
								<table id='resultTable'>
										<thead>
										  <th style='width:25%;'>Item Category</th>
										   <th style='width:25%;'>Quantity</th>
										   <th style='width:25%;'>Unit of Measure</th>
										   	<th style='width:15%;'>Net</th>
										  <th style='width:25%;'>Total</th>
									</thead>
									  <?php
											$where = '';
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from sales_recycle ".$where."");
												while($row = mysql_fetch_array($query)){
										?>	
												<tr align='center'>
												  <td><?php echo $row['item_category'] ?></td>
												  <td><?php echo $row['quantity'] ?></td>
												  <td><?php echo $row['unit_of_measure'] ?></td>
												  <td><?php echo $row['net'] ?></td>
												  <td><?php echo $row['total'] ?></td>
												</tr>
												
											<?php
											}
											?>
											<tr>
												<td colspan='2'>&nbsp;</td>
												<td align='center'>Grand Total:</td>
												<td align='center'>
												<?php 
											$query1 = mysql_query("SELECT sum(total) from sales_recycle $where") or die(mysql_error());
												while($row1 = mysql_fetch_array($query1)){
													$total = $row1['sum(total)'];
												}
												echo $total;
										?>
										</td>
										</tr>
								</table>
								<center><h1>Buy</h1></center>
								<table id='resultTable'>
										<thead>
										  <th style='width:25%;'>Item Category</th>
										   <th style='width:25%;'>Quantity</th>
										   <th style='width:25%;'>Unit of Measure</th>
										  <th style='width:25%;'>Total</th>
									</thead>
									  <?php
											$where = '';
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from sales ".$where."");
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
										<tr>
												<td colspan='2'>&nbsp;</td>
												<td align='center'>Grand Total:</td>
												<td align='center'>
												<?php 
											$query1 = mysql_query("SELECT sum(total) from sales $where") or die(mysql_error());
												while($row1 = mysql_fetch_array($query1)){
													$total = $row1['sum(total)'];
												}
												echo $total;
										?>
										</td>
										</tr>
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
