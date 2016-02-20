<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	$active_menu = "item_categories";
	$item_categories_page = true;
	
	if(isset($_GET['del'])){
		$item_cat_id = $_GET['del'];
		$alert = false;
		if(item_category_exists($item_cat_id)){

			mysql_query("DELETE FROM item_categories WHERE id = '".$item_cat_id."'") or die(mysql_error());
			if(!item_category_exists($item_cat_id)){
				$alert = "Category has been successfully deleted.";
			}
			
		}else{
			$alert = "Item category not found! Either it was already deleted or it wasn't exits.";
		}
		echo"<script> alert('".$alert."'); window.location.href='item_categories.php'</script>";
		exit();
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
				ITEM CATEGORIES
			</h1>
			<div id="content-submenu" style="">
				<a class="button"  href='forms/add_category_form.php?facebox=1' type='text' rel='facebox'><img class="button-icon"src='images/add.png' height='18' width='18'>  New Category </a>
			</div>
			<div id="content-container" style="min-height:120px; padding-left:20px; padding-right:10px;">
				<table id='resultTable'>
						<thead>
							<tr>
								<th width="20%" > ITEM CATEGORY </th>							
								<th width="20%" > Action </th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$res = mysql_query("SELECT * FROM item_categories") or die(mysql_error());
							if($res)
								while($row = mysql_fetch_array($res))
								{
									$id = $row['id'];
								?> <tr align="center">
										<td align="center"> <?php echo $row['name'];?></td>																																																						
										<td>
											<a href="forms/edit_category_form.php?update_c=<?php echo $id; ?>&facebox=1" rel='facebox'> <img src='images/edit.png' height='18' width='18'></a></a> <span style="margin-left:5px; margin-right:5px;">|</span>
											<a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete? There is NO undo!")'><i class="icon-trash"></i> <img src='images/delete.jpg' height='18' width='18'></a>	  
										</td>
									<tr/>
								<?php 
								}											
							?>	
						</tbody>
										
																		
				</table>
			</div>
		</div>
		<?php include('template/footer.php'); ?>	

	</body>
</html>