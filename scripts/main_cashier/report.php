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
			<div style='border-bottom:1px solid #ccc;'>
				<h1> Report</h1>
				</div>
					<?php
									$query = mysql_query("select sum(total) from sales where branch_name='$branch'");
										while($row = mysql_fetch_array($query)){
											$total = $row['sum(total)'];
										}
							?>		
							<div style='border-bottom:1px solid #ccc;'>
								<h1>Total Buy Item</h1>
								<h1><?php echo $total; ?></h1>
							</div>
					
					<?php
									$query = mysql_query("select sum(total) from sales_recycle where branch_name='$branch'");
										while($row = mysql_fetch_array($query)){
											$total1 = $row['sum(total)'];
										}
							?>		
							<div>
								<h1>Total Sales Item</h1>
								<h1><?php echo $total1; ?></h1>
							</div>
				</table>
			</div>
			<br />
		</div>	
	</body>
</html>