<?php

	if(isset($_POST['update_user_account'])){

		$update_user_account_id = isset($_POST['user_account_id'])?$_POST['user_account_id']:false;
		if($update_user_account_id && user_account_exists($update_user_account_id)){

			$update_user_account_info = get_user_account_info($update_user_account_id);
			$update_user_profile_info = get_user_profile_info($update_user_account_info["user_id"]);

			$error = false;
			
			$branch = $_POST['branch'];	
			$position = $_POST['position'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$gender = $_POST['gender'];
			$birthdate = $_POST['birthdate']; 
			$address = $_POST['address'];
			$contactnumber = $_POST['phonenumber'];
			$username = $_POST['newusername'];
			$password = $_POST['newpassword'];
		
			/* check if all fields are filled! */
			$is_filled = true;
			if(!$branch && trim($branch)){
				$is_filled = false;
			}
			if(!$position && trim($position)){
				$is_filled = false;
			}
			if(!$firstname && trim($firstname)){
				$is_filled = false;
			}
			if(!$middlename && trim($middlename)){
				$is_filled = false;
			}
			if(!$lastname && trim($lastname)){
				$is_filled = false;
			}
			if(!$gender && trim($gender)){
				$is_filled = false;
			}
			if(!$birthdate && trim($birthdate)){
				$is_filled = false;
			}
			if(!$address && trim($address)){
				$is_filled = false;
			}
			if(!$contactnumber && trim($contactnumber)){
				$is_filled = false;
			}
			if(!$username && trim($username)){
				$is_filled = false;
			}
			/* check if all fields are valid */
			if($is_filled){
				$valid_values = true;
				$firstname = trim($firstname);
				$middlename = trim($middlename);
				$lastname = trim($lastname);
				if(!branch_exists($branch)){
					$error = "Invalid branch selected!";
					$valid_values = false;
				}
				if($valid_values && !position_exists($position)){
					$error = "Invalid position selected!";
					$valid_values = false;
				}
				if($valid_values && strlen($firstname)<3){
					$error = "Invalid value for first name!";
					$valid_values = false;
				}
				if($valid_values && strlen($middlename)<3){
					$error = "Invalid value for middle name!";
					$valid_values = false;
				}
				if($valid_values && strlen($lastname)<3){
					$error = "Invalid value for last name!";
					$valid_values = false;
				}
				if(name_exists($firstname,$lastname,$middlename,(($update_user_profile_info)?$update_user_profile_info["profile_id"]:false))){
					$error = "Profile name already exists!";
					$valid_values = false;
				}
				if($valid_values && !(strtolower($gender)=="male"||strtolower($gender)=="female")){
					$error = "Invalid gender!";
					$valid_values = false;
				}
				if($valid_values){
					if(preg_match("/^(0[1-9]|[1-9]|1[0-2])\/(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])\/([1-9][0-9]{3})$/", $birthdate)) {
						list($m, $d, $y) = explode("/", $birthdate);
					}else if(preg_match("/^([1-9][0-9]{3})-(0[1-9]|[1-9]|1[0-2])-(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])$/", $birthdate)){
						list($y, $m, $d) = explode("-", $birthdate);
					}else{
						$error = "Invalid birth date!";
						$valid_values = false;
					}
					if($valid_values){
						if(checkdate($m, $d, $y)) {
						   // $error = "OK Date";
						    //$valid_values = false;
						}else {
						    $error = "Invalid birth date!";
							$valid_values = false;
						}
					}

				}
				if($valid_values && strlen($address)<3){

					$error = "Invalid address!";
					$valid_values = false;
				}
				if($valid_values){
					if(preg_match("/^(09[0-9]{9}|639[0-9]{9}|\+639[0-9]{9})$/", $contactnumber)) {
						//$error = "Contact number is ok!";
						//$valid_values = false;
					}else{
						$error = "Invalid contact number!";
						$valid_values = false;
					}
				}
				if($valid_values && username_exists($username,$update_user_account_id) && strlen($username)<5){
					$error = "Invalid username!";
					$valid_values = false;
				}
				if(($password && trim($password)!="") && $valid_values && !(strlen($password)>5)){
					$error = "Invalid password!";
					$valid_values = false;
				}
				if($valid_values){
					if($update_user_account_info){
						$update_status = false;
						if(user_has_profile_info_exists($update_user_account_info["user_id"])){
							/* update user profile */ 
							if(
								($update_user_profile_info) 
								&&	
								(
									($update_user_profile_info["firstname"] != $firstname) ||
									($update_user_profile_info["lastname"] != $lastname) ||
									($update_user_profile_info["middlename"] != $middlename) ||
									($update_user_profile_info["gender"] != $gender) ||
									($update_user_profile_info["birthdate"] != $birthdate) ||
									($update_user_profile_info["address"] != $address) ||
									($update_user_profile_info["phonenumber"] != $contactnumber)
								)
							){
								$update_profile_query_string = "
												UPDATE 
													user_profiles
												SET
													firstname='".$firstname."',
													lastname='".$lastname."',
													middlename='".$middlename."',
													gender='".$gender."',
													birthdate='".$birthdate."',
													address='".$address."',
													phonenumber='".$contactnumber."'
												WHERE
													profile_id = '".$update_user_profile_info["profile_id"]."'
													";
								$update_profile_query = mysql_query($update_profile_query_string) or die(mysql_error());
								if(mysql_affected_rows() > 0){
									$update_status = true;
								}
							}
						}else{
							/* create new profile for user */
							$new_profile_query_string = "
										INSERT 
										INTO 
											user_profiles(
												firstname,
												lastname,
												middlename,
												gender,
												birthdate,
												address,
												phonenumber,
												user_id
												) 
											values(
												'".$firstname."',
												'".$lastname."',
												'".$middlename."',
												'".$gender."',
												'".$birthdate."',
												'".$address."',
												'".$contactnumber."',
												'".$update_user_account_info["user_id"]."'
											)";
							$new_profile_query = mysql_query($new_profile_query_string) or die(mysql_error()." ".$new_profile_query_string);
							$new_profile_id = mysql_insert_id();
							if($new_profile_query && $new_profile_id && (int)$new_profile_id > 0){
								$update_status = true;
							}
						}
						/*Update Username*/
						if($update_user_account_info["username"] != $username){
								$update_username_query_string = "
												UPDATE 
													user_accounts
												SET
													username='".$username."'
												WHERE
													user_id = '".$update_user_account_info["user_id"]."'
													";
								$update_username_query = mysql_query($update_username_query_string) or die(mysql_error());
								if(mysql_affected_rows() > 0){
									$update_status = true;
								}
							}
						/*Update Password*/
						if(($password && trim($password)!="") && $update_user_account_info["password"] != $password){
								$update_password_query_string = "
												UPDATE 
													user_accounts
												SET
													password='".$password."'
												WHERE
													user_id = '".$update_user_account_info["user_id"]."'
													";
								$update_password_query = mysql_query($update_password_query_string) or die(mysql_error());
								if(mysql_affected_rows() > 0){
									$update_status = true;
								}
							}
						/*Update Position*/
						if($update_user_account_info["position"] != $position){
								$update_position_query_string = "
												UPDATE 
													user_accounts
												SET
													position='".$position."'
												WHERE
													user_id = '".$update_user_account_info["user_id"]."'
													";
								$update_position_query = mysql_query($update_position_query_string) or die(mysql_error());
								if(mysql_affected_rows() > 0){
									$update_status = true;
								}
							}
						/*Update Branch*/
						if($update_user_account_info["branch_id"] != $branch){
								$update_branch_query_string = "
												UPDATE 
													user_accounts
												SET
													branch='".$branch."'
												WHERE
													user_id = '".$update_user_account_info["user_id"]."'
													";
								$update_user_query = mysql_query($update_profile_query_string) or die(mysql_error());
								if(mysql_affected_rows() > 0){
									$update_status = true;
								}
							}
							if($update_status){
								echo"<script> alert('User account was successfully updated.');window.location.href='users.php'</script>";
								exit();
							}else{
								echo"<script> alert('Updating user account failed! No changes has been made.');</script>";
							}
					}
					
				}else{
					if($error && trim($error)!=''){
						echo"<script> alert('".$error."');</script>";
					}else{
						echo"<script> alert('Some input were invalid.'); </script>";
					}
				}
			}else{
				if($error && trim($error) != '' ){
					echo"<script> alert('".$error."'); </script>";
				}else{
					echo"<script> alert('Some field were empty.'); </script>";
				}
			}
		}
	}
?>