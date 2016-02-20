<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "users";
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
			<h1 id="content-title" style='color:maroon; border-bottom:1px solid #ccc; padding-left:20px;'>
				USER ACCOUNTS
			</h1>
			<div id="content-submenu" style="">
				<a  class="button"  href='forms/new_user_account_form.php?facebox=1' type='text' rel='facebox'><img class="button-icon" src='images/add.png' height='18' width='18'>New User</a>
			</div>
			<div id="content-container" style="min-height:120px;">
				<table id='resultTable'>
					<thead>
					   <th>Name</th>
					   <th>Postion</th>
					   <th>Branch</th>
					   <th>Username</th>
					   <th>Password</th>
					   
					  <th>Action</th>
					</thead>
					 <?php
							
								$user_accounts_info = get_all_user_account_info();

								if($user_accounts_info && is_array($user_accounts_info) && count($user_accounts_info)>0){
								foreach($user_accounts_info as $user_accounts => $user_account){

									$id = $user_account['user_id'];
									$user_profile_info = get_user_profile_info($user_account['user_id']);
									$branch_info = get_branch_info($user_account['branch_id']);
								?>	
								<tr align='center'>
								 <td><a href="user_profile_info.php?facebox=1&user_id=<?php echo $id; ?>" rel="facebox" ><?php echo $user_profile_info['lastname'].", ".$user_profile_info['firstname']." ".$user_profile_info['middlename'][0]."."; ?></a></td>
								 <td><?php echo $user_account['position']; ?></td>
								 <td><?php echo ($branch_info)?$branch_info["branch_name"]:""; ?></td>
								  <td><?php echo $user_account['username']; ?></td>
								  <td><?php echo $user_account['password']; ?></td>	
							  	
								 <td>
								   <a href="forms/user_account_info.php?facebox=1&user_id=<?php echo $id; ?>" rel='facebox'> <img src='images/info.png' height='18' width='18'></a> |&nbsp;
								   <a href="forms/edit_user_account_form.php?facebox=1&update_user=<?php echo $id; ?>" rel='facebox'> <img src='images/edit.png' height='18' width='18'></a> |&nbsp;
								   <a href='delete_user_account_form.php?del_user=<?php echo $id; ?>&facebox=1' rel='facebox' ><i class="icon-trash"></i> <img src='images/delete.jpg' height='18' width='18'></a>		  
								</td>
							</tr>
							<?php
							}
						}
					?>
				</table>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>