<?php
	$count = 0;
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
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cashier</h1>
						<form action='' method='post'>
						<div style='float:right;margin-right:35px;'>
							<select name="search" style='margin-bottom:10px;' >
							<option value=''>Search Branch</option>
								<?php
									$query = mysql_query("select * from branch");
										while($row = mysql_fetch_array($query)){
										echo '<option value="'.$row['branch_name'].'"';
											if(isset($_POST['search']) && trim($_POST['search']) == $row['branch_name']){
											echo ' SELECTED="SELECTED" ';
										}
										echo '>';
										echo $row['branch_name'];
										echo '</option>';
									}
								?>
							</select>
						</form>
							<input type='submit' name='' value='SEARCH' style='height : 25px;' />
						</div>	
						<button><a href='add_cashier.php' type='text' rel='facebox'>Add New Cashier</a></button>
								<table id='resultTable'>
									<thead>
									   <th>Firstname</th>
									   <th>Middlename</th>
									   <th>Lastname</th>
									   <th>Gender</th>
									   <th>Address</th>
									   <th>Birthdate</th>
									   <th>Contact</th>
									   <th>Username</th>
									   <th>Password</th>
									   <th>Branch</th>
									  <th>Action</th>
									</thead>
									 <?php
											$where = '';
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from cashier_profile ".$where."");
												while($row = mysql_fetch_array($query)){
												$id = $row['cashier_id'];
										?>	
									<tr align='center'>
									 <td><?php echo $row['firstname']; ?></td>
									  <td><?php echo $row['middlename']; ?></td>
									  <td><?php echo $row['lastname']; ?></td>
									  <td><?php echo $row['gender']; ?></td>
									  <td><?php echo $row['address']; ?></td>
									  <td><?php echo $row['birthdate']; ?></td>
									  <td><?php echo $row['contact_no']; ?></td>
									  <td><?php echo $row['username']; ?></td>
									  <td><?php echo $row['password']; ?></td>	
									  <td><?php echo $row['branch_name']; ?></td>	
										 <td>
										   <a href="edit_cashier.php?update=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
										   <a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'><i class="icon-trash"></i> Delete</a>		  
										</td>
									</tr>
									<?php
										}
									?>
								</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM cashier_profile WHERE cashier_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('cashier Profile has been deleted.');window.location.href='cashier.php'</script>";
							}
					?>
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$birthdate = $_POST['birthdate']; 
			$contact = $_POST['contact'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$position = $_POST['position'];
			$branch = $_POST['branch'];
			
			$query1=mysql_query("select * from cashier_profile") or die(mysql_error());
			while($row=mysql_fetch_array($query1)){
					if(strtolower($username) == strtolower($row['username'])){
						$count = $count + 1;
					}
					else{
						$count = $count;
					}
			}
			if($count >= 1){
					echo"<script> alert('Invalid Username or Password.');window.location.href=''</script>";
			}
			else{
			$query = mysql_query("INSERT INTO cashier_profile VALUES('','$firstname','$middlename','$lastname','$gender','$birthdate','$contact','$address','$username','$password', '$position', '$branch')") or die(mysql_error());
					echo"<script> alert('Cashier profile has been added.');window.location.href=''</script>";
			}
	}
?>
		