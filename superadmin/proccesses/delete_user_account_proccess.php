<?php
	
	if(isset($_POST["deleteuseraccount"])){
		$user_account_id = $_POST["del_user_id"];
		if($user_account_id && user_account_exists($user_account_id)){
				$delete_user_query_string = "DELETE 
											FROM  
												user_accounts
											 WHERE 
											 	user_id = '".$user_account_id."'
											 	";
				$delete_user_query = mysql_query($delete_user_query_string) or die(mysql_error()." ".$delete_user_query_string);
				if($delete_user_query && !user_account_exists($user_account_id)){
					?>
						<script type="text/javascript">
							alert("User account was successfully deleted!");
							window.location.href="users.php";
						</script>
					<?php
					exit();
				}else{
					?>
						<script type="text/javascript">
							alert("Deleting user account failed! Pleas try again this action and if this error will still occur please report this bug to the programmer! Thank you.");
							window.location.href="users.php";
						</script>
					<?php
				}
		}else{
			?>
				<script type="text/javascript">
					alert("Deleting user account failed! This account cannot be deleted or it was already deleted. Pleas try again this action and if this error will still occur please report this bug to the programmer! Thank you.");
					window.location.href="users.php";
				</script>
			<?php
		}
	}

?>