<!doctype html>
<?php
	include('includes/connect.php');
	
?>
<html lang='en-us'>
	<head>
			<title>WNL's Junk Shop</title>
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
	</head>
			<body>
				<?php include('template/head.php'); ?>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
				<br>
					<div id='content'>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registered Users</h1>
						<div class="portlet-header fixed" style='float:right'>
							<img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" style='margin-left:30px;' /> 
							<input type="text" name="filter" value="" id="filter" placeholder='Filter' /></br></br>
						</div>		
								<table id='resultTable'>
										<thead>
										  <th>Firstname</th>
										   <th>Lastname</th>
										   <th>Gender</th>
										   <th>Birthdate</th>
										   <th>Age</th>
										   <th>E-mail</th>
										   <th>Address</th>
										   <th>Contact</th>
										   <th>Username</th>
										   <th>Password</th>
											<th>Action</th>
										</thead>
									  <?php
										$query = mysql_query("select * from user_profile");
											while($row = mysql_fetch_array($query)){
											$id = $row['user_id'];
									  ?>
									<tr class='del'>
									  <td><?php echo $row['fname']; ?></td>
									  <td><?php echo $row['lname']; ?></td>
									  <td><?php echo $row['gender']; ?></td>
									  <td><?php echo $row['birthdate']; ?></td>
									  <td><?php echo $row['age']; ?></td>
									  <td><?php echo $row['email']; ?></td>
									  <td><?php echo $row['address']; ?></td>
									  <td><?php echo $row['contact_no']; ?></td>
									  <td><?php echo $row['username']; ?></td>
									  <td><?php echo $row['password']; ?></td>
									  <td align='center'>
										   <a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete?")'>Delete</a>
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
							mysql_query("DELETE FROM user_profile WHERE user_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Registered user has been deleted.');window.location.href='user.php'</script>";
							}
					?>
			</body>
		</html>	
