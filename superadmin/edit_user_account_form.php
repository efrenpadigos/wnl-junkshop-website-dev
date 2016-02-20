
<?php
	
	if(!(isset($edit_new_user_aaccount_page) && $edit_new_user_aaccount_page)){
		include('includes/connect.php');
		include('../includes/helper_functions.php');
	}

	$edit_user_account_info =  false;
	if(isset($_GET['update_user'])){
		$user_account_id = $_GET['update_user'];
		//$_SESSION['update'] = $_GET['update'];
		if($user_account_id && (int)$user_account_id > 0){
			$user_account_id = (int)$user_account_id;
			$edit_user_account_info =  get_user_account_info($user_account_id);
		}
		$profile_info = ($edit_user_account_info)?get_user_profile_info($edit_user_account_info["user_id"]):false;
	}
	$submitted = (isset($_POST["update_user_account"]))?true:false;
	
?>
<SCRIPT language=Javascript>
      
		var formfielderror = false;
		var submitBtn;
		var formObject;
		var selectedbranch;
		var selectedposition;
		var selectfirstname;
		var selectlastname;
		var selectmiddlename;
		var selectgender;
		var selectbirthdate;
		var selectaddress;
		var selectcontactnumber;
		var selectusername;
		var selectpassword;
			
		$(document).ready(function(){
     		
			formfielderror = false;
			
			submitBtn = $("input#submitBtn[type='submit'][name='save']");

			formObject = $("form#addnewuseraccountform[name='addnewuseraccount']");
			selectedbranch = (formObject!=undefined)?formObject.find("select[name='branch']"):false;
			selectedposition = (formObject!=undefined)?formObject.find("select[name='position']"):false;

			selectfirstname = (formObject!=undefined)?formObject.find("input[name='firstname']"):false;
			selectlastname = (formObject!=undefined)?formObject.find("input[name='lastname']"):false;
			selectmiddlename = (formObject!=undefined)?formObject.find("input[name='middlename']"):false;
			selectgender = (formObject!=undefined)?formObject.find("select[name='gender']"):false;
			selectbirthdate = (formObject!=undefined)?formObject.find("input[name='birthdate']"):false;
			selectaddress = (formObject!=undefined)?formObject.find("input[name='address']"):false;
			selectcontactnumber = (formObject!=undefined)?formObject.find("input[name='contactnumber']"):false;

			selectusername = (formObject!=undefined)?formObject.find("input[type='text'][name='newusername']"):false;
			selectpassword = (formObject!=undefined)?formObject.find("input[type='text'][name='newpassword']"):false;
			
		    $("a#tryRandom").click(function(){
	    		if(selectusername!=undefined && selectpassword!=undefined){
	    			var randomUsername = randomString(5);
		        	var randomPassword = randomString(8);

	    			selectusername.val(randomUsername);
	    			selectpassword.val(randomPassword);
	    		}else{
	    			alert("Sorry for the inconvenience but the random password action is not available now.");
	    		}
	    		return false;
		    });
		});
   </SCRIPT>
   <div class="center-block"  style="width:500px;">
   <form id="addnewuseraccountform" name="addnewuseraccount" action="update_user_account.php?update_user=<?php echo ($edit_user_account_info)?$edit_user_account_info["user_id"]:""; ?>" method="post" onsubmit="">
		<div style="display:block;">
			<input type="hidden" name="user_account_id" value="<?php echo ($edit_user_account_info)?$edit_user_account_info["user_id"]:""; ?>" />
		</div>
		<fieldset>
			<legend> <strong> New uer account form </strong> </legend>
				<div class="form-style-2">
					<div class="form-style-2-heading">User type</div>
					<label for="branch">
						<span>
							Branch 
							<span class="required">*</span>
						</span>
						<select required name='branch' class="select-field" required onchange="updateFormfields('branch');">
							<option value=''></option>
							<?php
								$all_branches = get_all_branches();

								if($all_branches && is_array($all_branches) && count($all_branches)>0){
									foreach($all_branches as $branches => $branch){
										echo '<option value="'.$branch['branch_id'].'"';
										if($submitted){
											echo (isset($_POST["branch"]) && $_POST["branch"]==$branch['branch_id'])?'selected = "selected"':"";
										}else{
											echo ($edit_user_account_info && $edit_user_account_info["branch_id"]==$branch['branch_id'])?'selected = "selected"':"";
										}
										echo '>';
										echo $branch['branch_name'];
										echo '</option>';
									}
								}
							?>
						</select>
					</label>
					<label for="branch">
						<span>
							Position 
							<span class="required">*</span>
						</span>
						<select name="position" class="select-field" required onchange="updateFormfields('position');">
							<option value=""></option>
							<?php
								$all_usertypes = get_all_usertypes();
								if($all_usertypes && is_array($all_usertypes) && count($all_usertypes)>0){
									foreach($all_usertypes as $usertypes => $usertype){
										echo '<option value="'.$usertype['position'].'"';
										if($submitted){
											echo (isset($_POST["position"]) && $_POST["position"]==$usertype['position'])?'selected = "selected"':"";
										}else{
											echo ($edit_user_account_info && $edit_user_account_info["position"]==$usertype['position'])?'selected = "selected"':"";
										}
										echo '>';
										echo $usertype['position'];
										echo '</option>';
									}
								}
							?>
						</select>
					</label>
				</div>
				
				<div class="form-style-2">
					<div class="form-style-2-heading">User profile information</div>
						<label for="firstname">
							<span>
								First Name
								<span class="required">*</span>
							</span>
							<input value="<?php echo ($submitted)?((isset($_POST["firstname"]))?trim($_POST["firstname"]):""):(($profile_info)?$profile_info["firstname"]:""); ?>" name="firstname" type="text" class="input-field" required />
						</label>
						<label for="middlename">
							<span>
								Middle Name
								<span class="required">*</span>
							</span>
							<input value="<?php echo ($submitted)?((isset($_POST["middlename"]))?trim($_POST["middlename"]):""):(($profile_info)?$profile_info["middlename"]:""); ?>"  name="middlename" type="text" class="input-field" required />
						</label>
						<label for="lastname">
							<span>
								Last Name
								<span class="required">*</span>
							</span>
							<input value="<?php echo ($submitted)?((isset($_POST["lastname"]))?trim($_POST["lastname"]):""):(($profile_info)?$profile_info["lastname"]:""); ?>"  name="lastname" type="text" class="input-field" required />
						</label>
						<label for="gender">
							<span>
								Gender
								<span class="required">*</span>
							</span>
							<select name='gender' class="select-field" required onchange="" >
								<option value=''>Select Gender</option>
								<option  <?php echo ($submitted)?((isset($_POST["gender"]) && $_POST["gender"] == "male")?'selected = "selected"':""):(($profile_info && ($profile_info["gender"]=="male"))?'selected = "selected"':""); ?> value='male'>MALE</option>
								<option <?php echo ($submitted)?((isset($_POST["gender"]) && $_POST["gender"] == "female")?'selected = "selected"':""):(($profile_info && ($profile_info["gender"]=="female"))?'selected = "selected"':""); ?> value='female'>FEMALE</option>
							</select>
						</label>
						<label for="birthdate">
							<span>
								Birth date
								<span class="required">*</span>
							</span>
							<input  value="<?php echo ($submitted)?((isset($_POST["birthdate"]))?trim($_POST["birthdate"]):""):(($profile_info)?$profile_info["birthdate"]:""); ?>"  name="birthdate" type="date" class="input-field" required  onchange="" />
						</label>
						<label for="address">
							<span>
								Address 
								<span class="required">*</span>
							</span>
							<textarea name="address" class="textarea-field"><?php echo ($submitted)?((isset($_POST["address"]))?trim($_POST["address"]):""):(($profile_info)?$profile_info["address"]:""); ?></textarea>
						</label>
						<label for="phonenumber">
							<span>
								Phone
								<span class="required">*</span>
							</span>
							<input value="<?php echo ($submitted)?((isset($_POST["phonenumber"]))?trim($_POST["phonenumber"]):""):(($profile_info)?$profile_info["phonenumber"]:""); ?>"  name="phonenumber" type="text" class="input-field" required />
						</label>
					</div>
					<div class="form-style-2">
						<div class="form-style-2-heading">User account information <span style="float:right"> <a id="tryRandom" href="#" style="text-decoration: none; " ><small> Random </small> </a></span></div>
						<label for="newusername">
							<span>
								Username
								<span class="required">*</span>
							</span>
							<input value="<?php echo ($submitted)?((isset($_POST["newusername"]))?trim($_POST["newusername"]):""):(($edit_user_account_info)?$edit_user_account_info["username"]:""); ?>"  name="newusername" type="text" class="input-field" required />
						</label>
						<label for="newpassword">
							<span>
								Password
							</span>
							<input placeholder = " No changes " value="<?php echo (isset($_POST["newpassword"]))?trim($_POST["newpassword"]):""; ?>"  name="newpassword" type="text" class="input-field"  />
						</label>
					</div>
					<div class="form-style-2">
						<label>
							<span>&nbsp;</span>
							<input name="update_user_account" type="submit" value="Save" />
						</label>
					</div>
	 	 </fieldset>	
	</form>
	</div>

