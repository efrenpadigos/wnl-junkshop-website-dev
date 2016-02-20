<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "home";
	$add_item_category_page =true;
	$srcurl = false;
	if(isset($_GET["srcurl"]) && $_GET["srcurl"]){
		$srcurl = $_GET["srcurl"];
	}
	if(isset($_POST['save_new_category']))
	{

			$item_category = $_POST['item_category'];
			$item_category = trim($item_category);
			if(!$item_category){
				echo"<script> alert('Category name is required.');</script>";
			}else if(item_category_exists(false,$item_category)){
				echo"<script> alert('Category name already exists.');</script>";
			}else{
				$query= mysql_query ("INSERT INTO item_categories values('','$item_category')");
				
				echo"<script> alert('New Category has been successfully added.');window.location.href='".(($srcurl)?$srcurl:"item_categories.php")."'</script>";
				exit();
			}
			
	
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
				New Item Category
			</h1>
			<div id="content-submenu" style="text-align:right;">
			<a class="custom-link-danger"  style="background-color:white; margin-right:10px;  " href='<?php echo (($srcurl)?$srcurl:"item_categories.php"); ?>' rel=''> 
					<small> Back </small> 
				</a>
			</div>
			<div id="content-container" style="min-height:120px;">
					<?php include("forms/add_category_form.php"); ?>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>