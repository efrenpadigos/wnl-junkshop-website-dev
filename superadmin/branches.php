<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "branches";
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
	if(isset($_GET['del'])){
						mysql_query("DELETE FROM branch WHERE branch_id = '$_GET[del]'") or die(mysql_error());
						//mysql_query("DELETE FROM admin_profile WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM cashier_profile WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM inventory WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM recycled_item WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM sales WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM sales_recycle WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
						//mysql_query("DELETE FROM sell_recycled_item WHERE branch_name = '$_GET[branch]'") or die(mysql_error());
							echo"<script> alert('Branch has been deleted.');window.location.href='branches.php'</script>";
						}
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
		<div id='content' style='min-height:250px;'>
			<div id='menu'>
				<?php include('template/menu.php'); ?>
			</div>
			<h1 id="content-title" style='color:maroon;border-bottom:1px solid #ccc; padding-left:20px;'>
				BRANCH
			</h1>
			<div id="content-submenu" style="">
				<a class="button" href='forms/add_branch.php?facebox=1' type='text' rel='facebox'><img src='images/add.png' height='18' width='18'> New Branch </a>
			</div>
			<div id="content-container" style="min-height:120px;">
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
								<a href="add_capital.php?update=<?php echo $id; ?>" rel='facebox'><img src='images/add1.png' height='18' width='18'></a>&nbsp;&nbsp;
							   <a href="edit_branch.php?update=<?php echo $id; ?>" rel='facebox'><img src='images/edit.png' height='18' width='18'></a>&nbsp;&nbsp;
							   <a href='?del=<?php echo $id; ?>&branch=<?php echo $branch; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'> <img src='images/delete.jpg' height='18' width='18'></a>		  
							</td>
						</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
	
		<?php include('template/footer.php'); ?>
</html>