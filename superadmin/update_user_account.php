<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "home";
	$edit_new_user_aaccount_page = true;
	include('proccesses/update_user_account_proccess.php');
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
				Update user account
			</h1>
			<div id="content-submenu" style="text-align:right; padding-left:10px; padding-right:10px;">
				<a class="custom-link-danger"  style="background-color:white;" href='users.php' rel=''> 
					<small> Back </small> 
				</a>
			</div>
			<div id="content-container" style="min-height:120px;">
				<?php
					include("forms/edit_user_account_form.php");
				?>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>