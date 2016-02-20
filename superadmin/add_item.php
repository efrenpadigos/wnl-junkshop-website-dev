<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	include('proccesses/save_new_item_proccess.php');

	$add_item_page = true;
	$active_menu = "item";
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
				Add new item
			</h1>
			<div id="content-submenu" style="text-align:right;">
				<a class="custom-link-danger"  style="background-color:white;" href='items.php' rel=''> 
					<small> Back </small> 
				</a>
			</div>
			<div id="content-container" style="min-height:120px;">
					<?php include("forms/add_item_form.php") ?>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>