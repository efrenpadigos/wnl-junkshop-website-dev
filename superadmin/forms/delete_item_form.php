<?php
	$show_form = true;
	if(isset($delete_item_page) && $delete_item_page){

	}else{
		if(isset($_GET["facebox"]) && $_GET["facebox"]){
			include('../includes/connect.php');
			include('../../includes/helper_functions.php');
		}else{
			$show_form = false;
		}
	}
if($show_form ){	
	$edit_item_info = false;
	
	if(isset($_GET["item_id"]) && item_exists($_GET["item_id"])){
		$edit_item_info = get_item_info($_GET["item_id"]);
	}
?>
<div class="center-block" style="width:450px;">
	<form name="deleteitemform" action="delete_item.php" method="post" >
		 <div class="form-style-2">
			<div class="form-style-2-heading">
				Are You sure that you want to delete this item? There's no undo.
			</div>
			<label for="field1">
				<input type="hidden" class="input-field" name="delete_item_id" value="<?php echo ($edit_item_info)?$edit_item_info["item_id"]:false; ?>" />
			</label>
			<label>
				<center><input name="delete_item" type="submit" value="Yes" /> <a class="button" href="items.php">No</a> </center>
			</label>
		 </div>
	</form>
</div>
<?php
}
?>