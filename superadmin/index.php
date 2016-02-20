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
			<br>
			
				<div id='content'>
				<div id='menu'>
				<?php include('template/menu.php'); ?>
			</div>
				<form action='' method='post'>
					<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Branch</h1>
					<div style='float:right;margin-right:35px;'>
						<select name="search" >
							<option value="">Search Branch</option>
							<?php
								$query = mysql_query("select * from branch order by branch_id asc");
									while($row = mysql_fetch_array($query)){
									echo '<option value="'.$row['branch_id'].'"';
										if(isset($_POST['search']) && trim($_POST['search']) == $row['branch_id']){
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
					<button><a href='add_branch.php' type='text' rel='facebox'>Add Branch</a></button>
					
							<table id='resultTable'>
									<thead>
										<tr>
											<th style="border-left: 1px solid #C1DAD7" width="20%" > Branch Name </th>
											<th width="40%" > Address </th>
											<th width="20%" > Capital </th>
											<th width="30%%"> ACTION </th>
										</tr>
									</thead>
									<?php
										$where = '';
										if(isset($_POST['search']) && trim($_POST['search']) != ''){
											$where = 'WHERE branch_id = "'.trim($_POST['search']).'" ';
										}
											$query = mysql_query("select * from branch ".$where."order by branch_id asc");
											while($row = mysql_fetch_array($query)){
												$id = $row['branch_id'];
												$branch = $row['branch_name'];
									?>	
									<tr align='center'>
										<td><?php echo $row['branch_name']; ?></td>										
										<td><?php echo $row['address']; ?></td>	
										<td><?php echo $row['capital']; ?></td>
										 <td>
											<a href="add_capital.php?update=<?php echo $id; ?>" rel='facebox'>Add</a>&nbsp;&nbsp;
										   <a href="edit_branch.php?update=<?php echo $id; ?>" rel='facebox'>Edit</a>&nbsp;&nbsp;
										   <a href='?del=<?php echo $id; ?>&branch=<?php echo $branch; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'> Delete</a>		  
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
						mysql_query("DELETE FROM branch WHERE branch_id = '$_GET[del]'") or die(mysql_error());
						mysql_query("DELETE FROM admin_profile WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM cashier_profile WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM inventory WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM recycled_item WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM sales WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM sales_recycle WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						mysql_query("DELETE FROM sell_recycled_item WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
							echo"<script> alert('Branch has been deleted.');window.location.href='index.php'</script>";
						}
				?>
		</body>
	</html>	
<?php
	if(isset($_POST['save'])){
		$branch_name = strtolower($_POST['branch_name']);
		$address = $_POST['address'];
		$capital = $_POST['capital'];
		$branch_name1 = $branch_name;
	$query = mysql_query("select * from branch where branch_name = '$branch_name1'");
		if(mysql_num_rows($query) > 0){
			echo"<script> alert('File already exist!.');window.location.href=''</script>";
			exit;
		}
		else{
	$query = mysql_query("INSERT INTO branch VALUES('','$branch_name','$address','$capital')") or die(mysql_error());
				echo"<script> alert('Branch has been added.');window.location.href=''</script>";
		}
	}
?>