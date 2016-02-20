<?php
	$branch = false;
	$id = $_SESSION['superadmin_id'];
	$user_account_info = get_user_account_info($id);
	if($user_account_info){
		$branch = get_branch_info($user_account_info['branch_id']);
	}
?>
<div id='head'><h1>&nbsp;&nbsp;&nbsp;<img src='images/logo.jpg' height='55' width='100'>WNL JUNK SHOP| <?php echo ($branch)?$branch["branch_name"]:""; ?></h1> 
	<div style='float:right;margin-top:-55px;font-size:25px;margin-right:30px;color:#fff;'>
		<?php
		
			$date = date("l, F d, Y",strtotime("now"));
			echo $date;
		?>
	</div>
</div >
<br>