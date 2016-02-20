<?php

	if(isset($_POST['save_new_user_account'])){
			
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
			if(!$password || trim($password) == ''){
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
				if($valid_values && strlen($middlename)<2){
					$error = "Invalid value for middle name!";
					$valid_values = false;
				}
				if($valid_values && strlen($lastname)<2){
					$error = "Invalid value for last name!";
					$valid_values = false;
				}
				if(name_exists($firstname,$lastname,$middlename)){
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
						$error = "Invalid birthdate! ".$birthdate;
						$valid_values = false;
					}
					if($valid_values){
						if(checkdate($m, $d, $y)) {
						   // $error = "OK Date";
						    //$valid_values = false;
						}else {
						    $error = "Why Invalid birthdate! ".$birthdate." y = ".$y." m = ".$m." d = ".$d;
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
				if($valid_values && ( username_exists($username) || strlen($username) < 4)){
					$error = "Invalid username!";
					$valid_values = false;
				}
				if($valid_values && !(strlen($password)>5)){
					$error = "Invalid password!";
					$valid_values = false;
				}
				if($valid_values){
						$new_user_query_string = "
												INSERT 
												INTO
													user_accounts(
														username,
														password,
														position,
														branch_id
														) 
													values(
														'".$username."',
														'".$password."',
														'".$position."',
														'".$branch."'
														)
												";
						$new_user_query = mysql_query($new_user_query_string) or DIE(mysql_error());
						$new_account_id = mysql_insert_id();
					if($new_user_query && ($new_account_id && (int)$new_account_id > 0)){
					
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
												'".$new_account_id."'
											)";
						$new_profile_query = mysql_query($new_profile_query_string) or die(mysql_error()." ====> ".$new_profile_query_string);
						$new_profile_id = mysql_insert_id();

						if($new_profile_query && $new_profile_id && (int)$new_profile_id > 0){

								echo"<script> alert('New user account has been successfully added.');window.location.href='users.php'</script>";
								exit();
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
?>