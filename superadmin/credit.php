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
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLECTOR'S CREDIT FILE</h1>
						<form action='' method='post'>
					<td><input type="text" name="search" value="" placeholder=""></td>
					<input type='submit' name='' value='SEARCH' style='height : 25px;' />
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
								<table id='resultTable'>
									<thead>
									   <th>Fullname</th>
									   <th>Balance</th>
									   <th>New Credit</th>
									   <th>Date of Credit</th>
									   <th>Total Credit</th>
									   <th>Branch</th>									   
									  <th>Action</th>
									</thead>
									 <?php
											$where = '';
											if(isset($_POST['search']) && trim($_POST['search']) != ''){
												$where = 'WHERE branch_name = "'.trim($_POST['search']).'" ';
											}
												$query = mysql_query("select * from collectors_credit ".$where."");
												while($row = mysql_fetch_array($query)){
												$id = $row['credit_id'];
										?>	
									<tr align='center'>
									 <td><?php echo $row['fullname']; ?></td>
									  <td><?php echo $row['balance']; ?></td>
									  <td><?php echo $row['New_credit']; ?></td>
									  <td><?php echo $row['Date_of_credit ']; ?></td>
									  <td><?php echo $row['total_credit']; ?></td>	
									  <td><?php echo $row['branch']; ?></td>
										 <td>
										   <a href="edit_collector.php?update=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
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
							mysql_query("DELETE FROM collector_profile WHERE collector_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('collector Profile has been deleted.');window.location.href='collector.php'</script>";
							}
					?>
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		
			$fullname = $_POST['fullname'];
			$balance = $_POST['balance'];
			$new_credit = $_POST['new_credit'];
			$date_of_credit = $_POST['date_of_credit'];
			$total_credit = $_POST['total_credit'];	
			$branch = $_POST['branch'];
			
			$query1=mysql_query("select * from collectors_credit") or die(mysql_error());
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
			$query = mysql_query("INSERT INTO collectors_credit VALUES('','$fullname','$balance','$new_credit','$date_of_credit','$total_credit')") or die(mysql_error());
					echo"<script> alert('collectors credit has been added.');window.location.href=''</script>";
			}
	}
?>
		