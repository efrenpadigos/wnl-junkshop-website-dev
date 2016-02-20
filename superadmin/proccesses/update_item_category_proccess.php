<?php
	if(isset($_POST['update_category'])){
		$item_category_new_name = $_POST['item_category_name'];
		$item_category_new_name = trim($item_category_new_name);
		$error = false;
		if($item_category_new_name)
		{
			$item_category_id = $_POST['cat_id'];
			if($item_category_id && (int)$item_category_id > 0 && item_category_exists($item_category_id)){
				$item_vategory_info = get_category_info($item_category_id);
				if($item_vategory_info && ($item_vategory_info["name"] != $item_category_new_name)){
					$query_string = "UPDATE item_categories SET name='".$item_category_new_name."' WHERE id = '".$item_category_id."'";
					$query = mysql_query($query_string) or die(mysql_error());
					if($query && ((int) mysql_affected_rows() > 0)){
						echo"<script> alert('Category has been updated.'); window.location.href='item_categories.php'</script>";
						exit();
					}else{
						$error = "Server error.";
					}
				}else{
					$error = "No changes has been made.";
				}
			}else{
				$error = "Invalid category selected.";
			}
		}else{
			$error = "Category name is required.";
		}
		echo"<script> alert('Update Category failed! \\n".$error."');</script>";
	}
?>