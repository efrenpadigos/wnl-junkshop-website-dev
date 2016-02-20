<?php 
	include('includes/connect.php');
	include('../session.php');
	$cashier = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang='en-us'>
	<head>
		<title>WNL's Junk Shop</title>
	</head>
		<link rel='stylesheet' type='text/css' href='style.css' />
	<body>
		<div id='wrapper'>	
		<?php
					$query1 =  mysql_query("SELECT * FROM cashier_profile WHERE cashier_id='$cashier'");
					while($row1 = mysql_fetch_array($query1))
					  { 
						$branch=  $row1['branch_name']; 
					  }
				  ?>
			<div id='head'>
			<h1 style='color:white;margin-left:20px;font:45px arial;'>WNL's Junk Shop | <?php echo $branch; ?></h1>
			</div>
			<?php include('menu.php'); ?>
			<div id='content' align='center'>
				<h1>Inventory</h1>
				<table class='table'>
					<th style='width:20%;'>Item Category</th>
					<th style='width:20%;'>Quantity</th>
					<th style='width:20%;'>Price</th>
					<th style='width:20%;'>Unit of Measure</th>
					<th style='width:20%;'>Total</th>
					<?php
									$query = mysql_query("select * from inventory where branch_name = '$branch'");
										while($row = mysql_fetch_array($query)){
										
							?>			
								<tr align='center'>
									<td><?php echo $row['item_category']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['unit_of_measure']; ?></td>
									<td><?php echo $row['total']; ?></td>
								</tr>
							<?php
										}
							?>
								<tr>
									<td  align='center' style='border:0px solid #ccc;'></td>
									<td  align='center' style='border:0px solid #ccc;'></td>
									<td  align='center' style='border:0px solid #ccc;'></td>
									<td  align='center' style='border:0px solid #ccc;'>Grand Total :</td>
									<td align='center' style='border:0px solid #ccc;'><?php
									
										$query1 = mysql_query("SELECT sum(total) from inventory where branch_name = '$branch'");
											while($row1 = mysql_fetch_array($query1)){
														$grandtotal = $row1['sum(total)'];
											}
											echo $grandtotal;
									?></td>
								</tr>
				</table>
			</div>
			<br />
		</div>	
	</body>
</html>