<?php
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
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feedbacks</h1>
						<div class="portlet-header fixed" style='float:right'>
							<img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" style='margin-left:30px;' /> 
							<input type="text" name="filter" value="" id="filter" placeholder='Filter' /></br></br>
						</div>		
								<table id='resultTable'>
										<thead>
										<tr>
										  <th>Name</th>
										   <th>Email</th>
										  <th>Comment</th>
										  <th>Action</th>
										</tr>
									</thead>
									  <?php
										$query = mysql_query("select * from message_form");
											while($row = mysql_fetch_array($query)){
											$id = $row['message_id'];
									  ?>
										<tr>
										  <td class='cap' style='width:150px'><?php echo $row['name']; ?></td>
										  <td class='cap'><?php echo $row['email']; ?></td>
										  <td class='cap'><?php echo $row['message']; ?></td>
										  <td align='center'>
												
											   <a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete?")'><i class="icon-trash"></i> Delete</a>  
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
							mysql_query("DELETE FROM message_form WHERE message_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Registered user has been deleted.');window.location.href='feedback.php'</script>";
							}
					?>
			</body>
		</html>	
