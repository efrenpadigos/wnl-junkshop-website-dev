<?php 
	include('includes/connect.php');
	include('../session.php');
	$temp = $_SESSION['SESS_MEMBER_ID'];
	$cashier = $_SESSION['user_id'];
	$unit_of_measure = '';
	$org_price = 0;
	$quantity2 = 0;

?>
<!DOCTYPE html>
<html lang='en-us'>
	<head>
		<title>WNL's Junk Shop</title>
	</head>
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
		<link rel='stylesheet' type='text/css' href='css/style.css' />
	<body>
	
			<?php include('menu.php'); ?>
			<?php include('head1.php'); ?>	
			<?php
							if(isset($_POST['save'])){
							if($_POST['cash'] < $_POST['total']){
								echo"<script>alert('Kulang imong bayad.');window.location.href=''</script>";
								exit;
							}
							else if(!is_numeric($_POST['cash']) ){
								echo"<script>alert('Dli man ka pwedi mu bayad ug letters dli me mo dawat ana ui.');window.location.href=''</script>";
								
								exit;
							}
							else
							{
								mysql_query("delete from temp_sales_recycle where temp = '$temp'");
							}
							}
						?>
			
				<div id='content'>
					<div class='left'>
					<br/>
					<h1 style='color:white;margin-top:-10px' align='center'>SALES</h1>
						<table id='table' align='center'>
						
							<th style='width:16%;'>Name</th>
							<th style='width:10%;'>qty</th>
							<th style='width:19%;'>Original Price</th>
							<th style='width:16%;'>New Price</th>
							<th style='width:20%;'>Unit of Measure</th>
							<th style='width:14%;'>Total</th>
							<th></th>
							<?php
									include('includes/connect.php');
									$query = mysql_query("select * from temp_sales_recycle where temp = '$temp' ");
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
						
								<center><div class='a'><li style='text-decoration:none;'><a href="compute_change.php?id=<?php echo $temp; ?>&temp=<?php echo $temp; ?>" style='text-decoration:none;' rel='facebox'>SAVE</a></li></div></center><br/>
					
					</div>
					<div class='right' align='center'>
					
						
						<h1>Transaction</h1>
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
						<h1 style='color:white;font:20px tahoma;margin-bottom:-10px;margin-top:0px;'>Original Price</h1>
							<input type='text' name='price' onchange='this.form.submit();' value='<?php if(isset($_POST['name'])){ echo $org_price; }?>'  required/>
							<h1 style='color:white;font:20px tahoma;margin-bottom:-10px;margin-top:2px;'>Weight or Quantity	:</h1>
							<input type='text' name='quantity' onchange='this.form.submit();' value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity']; }?>'  required /><br />
							<?php 
							if(isset($_POST['price'])){
							$price=$_POST['price'];
								$sum = $_POST['quantity'] * $price;
								}
							?>
					</form>
						<form action='' method='post'>
							<h1 style='color:white;font:20px tahoma;margin-top:0px;'>Total:</h1>
							<input type='text' name='total' value='<?php if(isset($_POST['price'])){ echo $sum ; } ?>'  readonly style='margin-top:-10px;' required/><br />
							<input type='submit' name='submit' value='ADD' /><br />
							<input type='hidden' name='temp'  value='<?php  echo  $temp ;  ?>' readonly /><br />
							<input type='hidden' name='name'  value='<?php if(isset($_POST['name'])){ echo $_POST['name'] ;  }?>'  /><br />
							<input type='hidden' name='quantity'  value='<?php if(isset($_POST['quantity'])){ echo $_POST['quantity'] ; }   ?>'  /><br />
							<input type='hidden' name='price'  value='<?php if(isset($_POST['price'])){ echo $_POST['price'] ; }  ?>'  /><br />
							<input type='hidden' name='org_price'  value='<?php if(isset($_POST['name'])){ echo $org_price; }  ?>'  /><br />
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
			echo"<script>alert('Please inpute sa ang wla na inputan');window.location.href=''</script>";
			exit;
		}
		if($_POST['name'] == '' ){
			echo"<script>alert('pamili sa ug item name');window.location.href=''</script>";
			exit;
		}
		if( !is_numeric($_POST['quantity'])	){
			echo"<script>alert('please input ug number sa weight or quantity');window.location.href=''</script>";
			exit;
		}
		if( !is_numeric($_POST['price'])	){
			echo"<script>alert('please input ug number sa price');window.location.href=''</script>";
			exit;
		}
		if($_POST['price']==$org_price){
		echo"<script>alert('ayaw kay wala kay genansya.!!!');window.location.href=''</script>";
			exit;
			}
		if($_POST['price'] < $org_price){
			echo"<script>alert('hoi ganse ka. barato ra kau imung baligya');window.location.href=''</script>";
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