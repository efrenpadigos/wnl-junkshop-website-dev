<div class="center-block" style="width:500px;">
<?php
$show_form = true;
	if(isset($delete_user_account_page) && $delete_user_account_page){

	}else{
		if(isset($_GET["facebox"]) && $_GET["facebox"]){
			include('../includes/connect.php');
			include('../../includes/helper_functions.php');
		}else{
			$show_form = false;
		}
		
	}
	if($show_form){
		$user_account_id = isset($_GET["del_user"])?$_GET["del_user"]:false;
		if($user_account_id && user_account_exists($_GET["del_user"])){
			?>
			<form action="delete_user_account.php?del_user=<?php echo $user_account_id; ?>" method="POST">
				<input type="hidden" name="del_user_id" value="<?php echo $user_account_id; ?>" />
				<p>
					Are You Sure that you want to continue deleting this user account?
					<center>
						<input type="submit" name="deleteuseraccount" value="Yes" />
						<input type="submit" name="canceldeleteuseraccount" value="No" onclick="window.location.href='users.php'; return false;" />
					</center>
				</p>
			</form>

			<?php

		}else{
			?>
			<p>
				Invalid action! Account cannot be deleted or maybe this account doesn't exists anymore? Please try to <a class="custom-link" href="" > reload </a> this page and try again this action.
			</p>

			<?php
		}
	}

?>

	
</div>