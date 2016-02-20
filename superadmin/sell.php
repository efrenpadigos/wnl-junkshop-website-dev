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
					<?php
							if(isset($_POST['save'])){
							if($_POST['cash'] < $_POST['total']){
								echo"<script>alert('Hey your payment is not enough.');window.location.href=''</script>";
								exit;
							}
							elseif(!is_numeric($_POST['cash']) ){
								echo"<script>alert('You are not allowed to pay letters.');window.location.href=''</script>";
								
								exit;
							}
							else
							{
								mysql_query("delete from temp_sales_recycle");
							}
							}
						?>
				<br>
					<div id='content' style='height:500px;'>
					<div id='menu'>
					<?php include('template/menu.php'); ?>
					</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sell Item</h1>
						<?php include('head1.php'); ?>
						<div class='left'>
							<table id='table' align='center'>
						
							<th >Name</th>
							<th>qty</th>
							<th>Original Price</th>
							<th>New Price</th>
							<th>Unit of Measure</th>
							<th>Total</th>
							<th></th>
							<?php
									include('includes/connect.php');
									$query = mysql_query("select * from temp_sales_recycle ");
										while($row = mysql_fetch_array($query)){
										$id = $row['sales_recycle_id'];
										$qty = $row['quantity'];
										$item_category = $row['item_category'];
										$unit_of_measure = $row['unit_of_measure'];
										$branch = $row['branch_name'];
										$total = $row['total'];
										$temp = $row['temp'];
						
								?>	
								<tr align='center'>
									<td><?php echo $row['item_category']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['original_price']; ?></td>
									<td><?php echo $row['new_price']; ?></td>
									<td><?php echo $row['unit_of_measure']; ?></td>
									<td><?php echo $row['total']; ?></td>
									<td><a href="delete_sales_recycle.php?del=<?php echo $id; ?>&item_category=<?php echo $item_category; ?>&branch=<?php echo $branch; ?>&qty=<?php echo $qty; ?>&totalprice=<?php echo $total; ?>&unit_of_measure=<?php echo $unit_of_measure;  ?>" ><image src="images/delete.png" /></a></td>
								</tr>
							<?php
								}
							?>
						</table><br />
						
								<center><button><a href="compute_change.php?id=<?php echo $temp; ?>&temp=<?php echo $temp; ?>" style='text-decoration:none;' rel='facebox'>SAVE</a></button></center><br/>
						</div>
						<div class='right' align='center'>
								<h2>Transaction</h1>
								<form action='' method='POSt'>
							<select name="name" required='true' onchange='this.form.submit()' >
									<option value=''>Select Item Name</option>
									<?php
										$query = mysql_query("select * from inventory where branch_name = '$branch'");
											while($row = mysql_fetch_array($query)){
											echo '<option value="'.$row['item_category'].'"';
													if(isset($_POST['name']) && trim($_POST['name']) == $row['item_category']){
											$unit_of_measure = $row['unit_of_measure'];
											$balance = $row['quantity'];
											$org_price = $row['price'];
											$org_price = $row['price'];
												echo ' SELECTED="SELECTED" ';
											}
											echo '>';
											echo $row['item_category'];
											echo '</option>';
										}
									?>
							</select><br />
								<h3>Original Price</h3>
								<input type='text'  onchange='this.form.submit();' value='<?php if(isset($_POST['name'])){ echo $org_price; }?>'  readonly />
								<h3>Weight or Quantity	:</h3>
								<input type='text' name='quantity' onchange='this.form.submit();' value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity']; }?>'  required /><br />
								<h3>New Price</h3>
								<input type='text' name='price' onchange='this.form.submit();' value='<?php if(isset($_POST['price'])){ echo $_POST['price']; }?>'   required/>
								<?php 
								if(isset($_POST['price'])){
								$price=$_POST['price'];
									$sum = $_POST['quantity'] * $price;
									}
								?>
							</form>
								<form action='' method='post'>
									<h3>Total:</h3>
									<input type='text' name='total' value='<?php if(isset($_POST['price'])){ echo $sum ; } ?>'  readonly style='margin-top:-10px;' required/><br />
									<input type='submit' name='submit' value='ADD' /><br />
									<input type='hidden' name='temp'  value='<?php  echo  $temp ;  ?>' readonly /><br />
									<input type='hidden' name='name'  value='<?php if(isset($_POST['name'])){ echo $_POST['name'] ;  }?>'  /><br />
									<input type='hidden' name='quantity'  value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity'] ; }   ?>'  /><br />
									<input type='hidden' name='price'  value='<?php if(isset($_POST['price'])){ echo $_POST['price'] ; }  ?>'  /><br />
									<input type='hidden' name='org_price'  value='<?php if(isset($_POST['name'])){ echo $org_price; }  ?>'  /><br />
								</form>
						</div>
						<br />
						<br />
						<br />
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM price WHERE price_id = '$_GET[del]'") or die(mysql_error());
							}
					?>
					
			</body>
		</html>	
<?php
	if(isset($_POST['submit'])){
		$item_category = $_POST['name'];
		$total = $_POST['total'];
		$temp = $_POST['temp'];
		$quantity = $_POST['quantity'];
		$org_price = $_POST['org_price'];
		date_default_timezone_set("Asia/Singapore");
		$date = date("y:m:d h:i",strtotime("now"));
		$query2 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
			while($row2 = mysql_fetch_array($query2)){
				$quantity2= $row2['quantity'];
			}
		if($quantity2 < $quantity and is_numeric($quantity)){
				echo"<script>alert('insufficient balance. Remaining balance ".$balance."');window.location.href=''</script>";
			exit;
		}
		if( $_POST['quantity'] == '' ||  $_POST['price'] == '' ){
			echo"<script>alert('Please input all the datas that are not yet inputted');window.location.href=''</script>";
			exit;
		}
		if($_POST['name'] == '' ){
			echo"<script>alert('please choose an item name');window.location.href=''</script>";
			exit;
		}
		if( !is_numeric($_POST['quantity'])	){
			echo"<script>alert('please input a number to your weight or quantity');window.location.href=''</script>";
			exit;
		}
		if( !is_numeric($_POST['price'])	){
			echo"<script>alert('please input a number to your price');window.location.href=''</script>";
			exit;
		}
		if($_POST['price']==$org_price){
		echo"<script>alert('please don't because you will not earn much.');window.location.href=''</script>";
			exit;
			}
		if($_POST['price'] < $org_price){
			echo"<script>alert('You will not earn much from your products because it's very cheap.');window.location.href=''</script>";
			exit;
		}
		
		if($row['sum(total)']>$_POST['cash'])
		{
		echo "<script>alert('deli pwde')</script>";
		}
		
		
		
		$query = mysql_query("INSERT INTO sales_recycle VALUES('','$item_category','$quantity','$org_price','$price','$date','$unit_of_measure','$total','$temp','$branch')") or die(mysql_error());
		$query3 = mysql_query("select * from sales_recycle where temp = '$temp'") or die(mysql_error());
			while($row = mysql_fetch_array($query3)){
			$id = $row['sales_recycle_id'];
			}
		$query2 = mysql_query("INSERT INTO temp_sales_recycle VALUES('$id','$item_category','$quantity','$org_price','$price','$date','$unit_of_measure','$total','$temp','$branch')") or die(mysql_error());
			
			$query1 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
			while($row1 = mysql_fetch_array($query1)){
				$quantity1 = $row1['quantity'];
				$total1 = $row1['total'];
				$price = $row1['price'];
			}
				if(mysql_num_rows($query1) > 0){
						$qty =  $quantity1 - $quantity;
						$grandtotal =  $total1 - ($quantity * $price);
					$query = mysql_query("UPDATE inventory set quantity = '$qty',total='$grandtotal' where item_category = '$item_category' and branch_name='$branch' ");
						$query2 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'");
									while($row2=mysql_fetch_array($query2)){
										if($row2['quantity']==0){
											mysql_query("DELETE FROM inventory WHERE item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
										}
									}
				}
				else{
					$query = mysql_query("INSERT INTO inventory VALUES('','$item_category','$quantity','$unit_of_measure','$total','$branch')") or die(mysql_error());
				}
				echo"<script>;window.location.href=''</script>";

	}
?>