<?php 
	$display = true;
	if(!(isset($user_account_info_page) && $user_account_info_page)){

		if(!(isset($_GET["facebox"]) && $_GET["facebox"])){
			if(isset($_GET["user_id"])){
				?>
				<script>
					window.localtion.fref="view_user_account_info.php?user_id=<?php echo $_GET["user_id"]; ?>";
				</script>
				<?php
			}else{
				$display = false;
			}
		}else{
			include('../includes/connect.php');
			include('../../includes/helper_functions.php');
		}
		
	}
	if($display){
		$user_account_info =  false;
		$profile_info =  false;
		$branch_info =  false;
		if(isset($_GET['user_id'])){
			$user_account_id = $_GET['user_id'];
			//$_SESSION['update'] = $_GET['update'];
			if($user_account_id && (int)$user_account_id > 0){
				$user_account_id = (int)$user_account_id;
				$user_account_info =  get_user_account_info($user_account_id);
			}
			$profile_info = ($user_account_info)?get_user_profile_info($user_account_info["user_id"]):false;
			$branch_info = ($user_account_info)?get_branch_info($user_account_info["branch_id"]):false;
			
		}
		?>
		<div class="center-block" style="width:500px;">
			<fieldset>
				<legend><strong> User information </strong></legend>
				
				<div style="padding:10px;">
					
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($profile_info)?ucwords($profile_info["firstname"]." ".$profile_info["middlename"][0].". ".$profile_info["lastname"]):""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									 Name 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($profile_info)?ucfirst($profile_info["gender"]):""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									 Gender 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($profile_info && is_a_valid_date($profile_info["birthdate"]))?date("F j, Y ",strtotime($profile_info["birthdate"])):""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									 Birthday 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($profile_info)?ucfirst($profile_info["address"]):""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									 Address
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($profile_info)?ucfirst($profile_info["phonenumber"]):""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									 Contact/Phone Number 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($branch_info)?$branch_info['branch_name']:""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									Branch 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($user_account_info)?$user_account_info['position']:""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									Position 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							<?php echo ($user_account_info)?$user_account_info['username']:""; ?>
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									Username 
						 		</i>
						 	</small>
						 </center>
					</p>

					<p style="text-align:center; margin:0;">
						<span class="nowrap"> 
							*********
						</span>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									Password 
						 		</i>
						 	</small>
						 </center>
					</p>
					<p style="text-align:center; margin:0;">
						<div style="margin:5px;">
							<center>
								<a href="update_user_account.php?update_user=<?php echo ($user_account_info)?$user_account_info['user_id']:""; ?>" class="custom-link"> Update </a> |
								<a href="#" class="custom-link"> Delete </a>
							</center>
						</div>
						<hr style="margin:0;" />
						<center>
							<small>
								<i>
									Actions 
						 		</i>
						 	</small>
						 </center>
					</p>
				</div>
			</fieldset>
		</div>
		<?php
	}
?>