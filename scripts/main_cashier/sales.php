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

			<?php include('menu.php'); ?>		
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
			<div id='content' align='center' >
				<h1>Buy List</h1>
				<table class='table'>
					<th style='width:15%'>Item Category</th>
					<th style='width:15%'>Quantity</th>
					<th style='width:15%'>Price</th>
					<th style='width:15%'>Date </th>
					<th style='width:15%'>Unit of Measure</th>
					<th style='width:15%'>Total</th>
					<?php
									include('includes/connect.php');
									$query = mysql_query("select * from sales where branch_name = '$branch'  ");
										while($row = mysql_fetch_array($query)){
										$id = $row['sales_id'];
								?>	
								<tr align='center'>
									<td><?php echo $row['item_category']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['total']/$row['quantity']; ?></td>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['unit_of_measure']; ?></td>
									<td><?php echo $row['total']; ?></td>
								</tr>
							<?php
								}
							?>
				</table>
			</div>
			<br />
		</div>	
	</body>
</html>