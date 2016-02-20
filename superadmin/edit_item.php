<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	include('proccesses/update_item_proccess.php');

	$edit_item_page = true;
	$active_menu = "item";
	
	$edit_item_info = false;
	
	if(isset($_GET["item_id"]) && item_exists($_GET["item_id"])){
		$edit_item_info = get_item_info($_GET["item_id"]);
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
				Update item
			</h1>
			<div id="content-submenu" style="text-align:right;">
				<a class="custom-link-danger"  style="background-color:white;" href='items.php' rel=''> 
						<small> Back </small> 
					</a>
			</div>
			<div id="content-container" style="min-height:120px;">
					<?php include("forms/edit_item_form.php") ?>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>