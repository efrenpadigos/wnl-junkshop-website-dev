<?php 
	include('includes/connect.php');
	include('../session.php');
	$temp = $_SESSION['SESS_MEMBER_ID'];
	$cashier = $_SESSION['user_id'];
	$price = 0;
	$unit_of_measure = '';
?>
<!DOCTYPE html>
<html lang='en-us'>
	<head>
		<title>WNL's Junk Shop</title>
	</head>
		<link rel='stylesheet' type='text/css' href='css/style.css' />
	<body>
	
			<?php include('menu.php'); ?>
			<?php include('head.php'); ?>		
				<div id='content'>
					<div class='left'>
					<br/>
						<h1 style='color:white;margin-top:-10px' align='center'>BUY</h1>
						<table id='table' align='center'>
						
							<th style='width:19%;'>Name</th>
							<th style='width:15%;'>Quantity</th>
							<th style='width:19%;'>Price</th>
							<th style='width:23%;'>Unit of Measure</th>
							<th style='width:19%;'>Total</th>
							<th></th>
							<?php
									include('includes/connect.php');
									$query = mysql_query("select * from sales where temp = '$temp' ");
										while($row = mysql_fetch_array($query)){
										$id = $row['sales_id'];
										$qty = $row['quantity'];
										$item_category = $row['item_category'];
										$total = $row['total'];
								?>	
								<tr align='center'>
									<td><?php echo $row['item_category']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['unit_of_measure']; ?></td>
									<td><?php echo $row['total']; ?></td>
									<td><a href="delete_sales.php?del=<?php echo $id; ?>&item_category=<?php echo $item_category; ?>&branch=<?php echo $branch; ?>&qty=<?php echo $qty; ?>&totalprice=<?php echo $total; ?>" ><image src="images/delete.png" /></a></td>
								</tr>
							<?php
								}
							?>
						</table><br />
								<center><div class='a'><li style='text-decoration:none;'><a href='../cashier/generatetrans.php' style='text-decoration:none;'>SAVE</a></li></div></center><br/>
					</div>
					<div class='right' align='center'>
					
						
						<h1>Transaction</h1>
						<form action='' method='POSt'>
						<select name="name" onchange='this.form.submit()' required>
								<option>Select Item Name</option>
								<?php
									$query = mysql_query("select * from price");
										while($row = mysql_fetch_array($query)){
										echo '<option value="'.$row['item_category'].'"';
												if(isset($_POST['name']) && trim($_POST['name']) == $row['item_category']){
										$price = $row['price'];
										$unit_of_measure = $row['unit_of_measure'];
											echo ' SELECTED="SELECTED" ';
										}
										echo '>';
										echo $row['item_category'];
										echo '</option>';
									}
								?>
						</select><br />
							<h1 style='color:white;font:20px tahoma;margin-top:2px;margin-bottom:-15px;'>Weight or Quantity:</h1>
							<input type='text' name='quantity' placeholder='Quantity'  onchange='this.form.submit();' value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity']; }?>'  required='true' /><br />
					
							<?php 
							if(isset($_POST['quantity']) ){
								$sum = $_POST['quantity'] * $price;
								}
							?>
					</form>
						<form action='' method='post'>
						<h1 style='color:white;font:20px tahoma;margin-bottom:-15px;margin-top:5px;'>Price per <?php echo $unit_of_measure;  ?>:</h1>
							<input type='text' name='total' placeholder='Price' value='<?php if(isset($_POST['name'])){ echo  $price ; }  ?>'  readonly required=/>
							<h1 style='color:white;font:20px tahoma;margin-top:2px;margin-bottom:10px;'>Total:</h1>
							<input type='text' name='total' value='<?php if(isset($_POST['quantity'])){ echo $sum ; } ?>'  readonly style='margin-top:-10px;' required/><br />
							<input type='submit' name='submit' value='ADD' /><br />
							<input type='hidden' name='temp'  value='<?php  echo  $temp ;  ?>' readonly /><br />
							<input type='hidden' name='name'  value='<?php if(isset($_POST['name'])){ echo $_POST['name'] ;  }?>' readonly /><br />
							<input type='hidden' name='quantity'  value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity'] ; }  ?>' readonly /><br />
						</form>
						
					</div>
				</div>
				<?php include('footer.php'); ?>
					
	</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$item_category = $_POST['name'];
		$total = $_POST['total'];
		$temp = $_POST['temp'];
		$quantity = $_POST['quantity'];
		$status = 'pending';
		date_default_timezone_set("Asia/Singapore");
		$date = date("y:m:d h:i",strtotime("now"));
		$sql = mysql_query("select * from admin_profile where branch_name = '$branch' ");
			while($row2 = mysql_fetch_array($sql)){
				$capital = $row2['capital'];
			}
		if($capital < $total){
			echo"<script>alert('wla nay budget horut na imung pohonan.');window.location.href=''</script>";
			exit;
		}
		else{
			$capital1 = $capital - $total;
			$sql1 = mysql_query("update admin_profile set capital='$capital1' where branch_name='$branch'");
		}
			
		if($_POST['name'] == '' || $_POST['quantity'] == '' || !is_numeric($_POST['quantity'])	){
			echo"<script>alert('Please taronga ug input');window.location.href=''</script>";
		}
		else{
			$query = mysql_query("INSERT INTO sales VALUES('','$item_category','$quantity','$price','$unit_of_measure','$total','$temp','$date','$branch','$status')") or die(mysql_error());
			$query1 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
			while($row1 = mysql_fetch_array($query1)){
				$quantity1 = $row1['quantity'];
				$total1 = $row1['total'];
			}
				if(mysql_num_rows($query1) > 0){
						$qty =  $quantity1 + $quantity;
						$total2 =  $total + $total1;
					$query = mysql_query("UPDATE inventory set quantity = '$qty', total='$total2' where item_category = '$item_category' and branch_name='$branch' ");
				}
				else{
					$query = mysql_query("INSERT INTO inventory VALUES('','$item_category','$quantity','$price','$unit_of_measure','$total','$branch','$status')") or die(mysql_error());
				}
				echo"<script>;window.location.href=''</script>";
	}
	}
?>