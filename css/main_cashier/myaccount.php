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
			<h1 style='color:white;margin-left:20px;font:45px monotype corsiva;'>WNL's Junk Shop | <?php echo $branch; ?></h1>
			</div>
			
			<div id='content' align='center'>
				<h1>My Account</h1>
					<?php
						$query = mysql_query("SELECT * from cashier_profile where cashier_id = '$cashier'");
							while($row=mysql_fetch_array($query)){
					?>
					<form action='update_process.php' method='post'>
						<input type='hidden' name='cashier_id' value='<?php echo $row['cashier_id']; ?>' /><br />
						<input type='text' name='firstname' value='<?php echo $row['firstname']; ?>' /><br />
						<input type='text' name='middlename' value='<?php echo $row['middlename']; ?>' /><br />
						<input type='text' name='lastname' value='<?php echo $row['lastname']; ?>' /><br />
						<select  required name='gender'  value='<?php echo $row['gender']; ?>'>
							<option <?php if($row['gender'] == 'male'){ echo"SELECTED"; } ?> value='male'>MALE</option>
							<option <?php if($row['gender'] == 'female'){ echo"SELECTED"; } ?> value='female'>FEMALE</option>
						</select><br />	
						<input type='date' name='birthdate' value='<?php echo $row['birthdate']; ?>'/><br />
						<input type='text' name='contact_no' value='<?php echo $row['contact_no']; ?>' /><br />
						<input type='text' name='address' value='<?php echo $row['address']; ?>' /><br />
						<input type='text' name='username' value='<?php echo $row['username']; ?>' /><br />
						<input type='text' name='password' value='<?php echo $row['password']; ?>' /><br />
						<input type='submit' name='update' value='UPDATE' /><br />
					</form>
						<br/>

					<?php
							}
					?>
			</div>
			<br />
		</div>	
	</body>
</html>