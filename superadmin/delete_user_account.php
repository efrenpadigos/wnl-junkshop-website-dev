<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	include('proccesses/delete_user_account_proccess.php');

	$active_menu = "home";
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
				Deleting user account
			</h1>
			<div id="content-submenu" style="">
			</div>
			<div id="content-container" style="min-height:120px;">
				<?php
					include("delete_user_account_form.php");
				?>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>