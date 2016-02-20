<?php
if(!function_exists("createRandomPassword")){
		function createRandomPassword() {
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			srand((double)microtime()*1000000);
			$i = 0;
			$pass = '' ;
			while ($i <= 3) {
				$num = rand() % 33;
				$tmp = substr($chars, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}
			return $pass;
		}
	}
	if(!function_exists("numberletter")){
		function numberletter() {
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			srand((double)microtime()*1000000);
			$i = 0;
			$passii = '' ;
			while ($i <= 2) {
				$num = rand() % 33;
				$tmp = substr($chars, $num, 1);
				$passii = $passii . $tmp;
				$i++;
			}
			return $passii;
		}
	}
	if(!function_exists("generate_purchase_code")){
		function generate_purchase_code(){
			$letter = createRandomPassword();
			$ccnumbers = numberletter();
			$temp = $letter.'-'.$ccnumbers;
			$_SESSION['purchase_code'] = $temp;
			return $temp;
		}
	}
	
	if(!function_exists("generate_random_id")){
		function generate_random_id(){
			$letter = createRandomPassword();
			$ccnumbers = numberletter();
			$temp = sha1($letter.$ccnumbers);
			return $temp;
		}
	}
	if(!function_exists("get_category_info")){
		function get_category_info($category_id=false, $category_name=false){
			$category_info = false;
			$query = false;
			if($category_id){
				$query = mysql_query("select * from item_categories where id='".$category_id."'");
			}else if($category_name){
				$query = mysql_query("select * from item_categories where name='".$category_name."'");
			}
			if($query && mysql_num_rows($query)>0){
				$category_info = mysql_fetch_array($query);
			}
			return $category_info;
		}
	}
	if(!function_exists("item_category_exists")){
		function item_category_exists($category_id = false, $category_name=false){
			$category_exists = false;
			if($category_id){
				$query = mysql_query("select * from item_categories where id='".$category_id."'");
			}else if($category_name = trim($category_name)){
				$query = mysql_query("select * from item_categories where name='".$category_name."'");
			}
			if($query && mysql_num_rows($query)>0){
					$category_exists = true;
				}
			return $category_exists;
		}
	}
	if(!function_exists("get_item_info")){
		function get_item_info($item_id=false,$item_description=false){
			$item_info = false;
			$query = false;
			if($item_id){
				$query = mysql_query("select * from items where item_id='".$item_id."'");
			}else if($item_description){
				$query = mysql_query("select * from items where item_description='".$item_description."'");
			}
			
			if($query && mysql_num_rows($query)>0){
				$item_info = mysql_fetch_array($query);
			}
			return $item_info;
		}
	}
	if(!function_exists("get_user_account_info")){
		function get_user_account_info($user_account_id){
			$user_account_info = false;
			$query = mysql_query("select * from user_accounts where user_id='".$user_account_id."'");
			if($query && mysql_num_rows($query)>0){
				$user_account_info = mysql_fetch_array($query);
			}
			
			return $user_account_info;
		}
	}
	if(!function_exists("user_account_exists")){
		function user_account_exists($user_account_id){
			$user_account_exists = false;
			$query = mysql_query("select * from user_accounts where user_id='".$user_account_id."'");
			if($query && mysql_num_rows($query)>0){
				$user_account_exists = true;
			}
			return $user_account_exists;
		}
	}

	if(!function_exists("get_all_user_account_info")){
		function get_all_user_account_info(){
			$user_account_infos = false;
			$query = mysql_query("select * from user_accounts where position != 'superadmin'");
			if($query && mysql_num_rows($query)>0){
				$user_account_infos= array();
				while($row = mysql_fetch_array($query)){
					$user_account_infos[] = $row;
				}
			}
			
			return $user_account_infos;
		}
	}
	if(!function_exists("get_all_usertypes")){
		function get_all_usertypes(){
			$user_types = false;
			$query = mysql_query("select * from user_types where position != 'superadmin'");
			if($query && mysql_num_rows($query)>0){
				$user_types = array();
				while($row = mysql_fetch_array($query)){
					$user_types[] = $row;
				}
			}
			return $user_types;
		}
	}
	if(!function_exists("get_all_unit_of_measurements")){
		function get_all_unit_of_measurements(){
			$unit_of_measurements = false;
			$query = mysql_query("select * from unit_of_measurements");
			if($query && mysql_num_rows($query)>0){
				$unit_of_measurements = array();
				while($row = mysql_fetch_array($query)){
					$unit_of_measurements[] = $row;
				}
			}
			return $unit_of_measurements;
		}
	}
	if(!function_exists("unit_of_measurement_exists")){
		function unit_of_measurement_exists($unit_of_measurement_alias=false,$unit_of_measurement_name=false){
			$unit_of_measurement_exists = false;
			$query = false;
			if($unit_of_measurement_alias){
				$query = mysql_query("select * from unit_of_measurements where alias = '".$unit_of_measurement_alias."'");
			}else if($unit_of_measurement_name){
				$query = mysql_query("select * from unit_of_measurements where name = '".$unit_of_measurement_name."'");
			}
			if($query && mysql_num_rows($query)>0){
				$unit_of_measurement_exists = true;
			}
			return $unit_of_measurement_exists;
		}
	}
	if(!function_exists("get_all_branches")){
		function get_all_branches(){
			$branches = false;
			$query = mysql_query("select * from branch");
			if($query && mysql_num_rows($query)>0){
				$branches = array();
				while($row = mysql_fetch_array($query)){
					$branches[] = $row;
				}
			}
			return $branches;
		}
	}
	if(!function_exists("get_branch_info")){
		function get_branch_info($branch_id=false, $branch_name=false){
			$branch_info = false;
			$query =  false;
			if($branch_id || $branch_name){
				if($branch_id){
					$query = mysql_query("select * from branch where branch_id='".$branch_id."'");
				}else if($branch_name){
					$query = mysql_query("select * from branch where branch_name='".$branch_name."'");
				}
			}
			if($query && mysql_num_rows($query)>0){
				$branch_info = mysql_fetch_array($query);
			}
			return $branch_info;
		}
	}
	if(!function_exists("get_user_profile_info")){
		function get_user_profile_info($user_id){
			$profile_info = false;
			$query = mysql_query("select * from user_profiles where user_id='".$user_id."'");
			if($query && mysql_num_rows($query)>0){
				$profile_info = mysql_fetch_array($query);
			}
			
			return $profile_info;
		}
	}
	if(!function_exists("user_has_profile_info_exists")){
		function user_has_profile_info_exists($user_id){
			$user_has_profile_info_exists = false;
			$query = mysql_query("select * from user_profiles where user_id='".$user_id."'");
			if($query && mysql_num_rows($query)>0){
				$user_has_profile_info_exists = true;
			}
			
			return $user_has_profile_info_exists;
		}
	}
	if(!function_exists("user_profile_exists")){
		function user_profile_exists($profile_id){
			$profile_exists = false;
			$query = mysql_query("select * from user_profiles where profile_id='".$profile_id."'");
			if($query && mysql_num_rows($query)>0){
				$profile_exists = true;
			}
			
			return $profile_exists;
		}
	}
	if(!function_exists("branch_exists")){
		function branch_exists($branch_id=false,$branch_name=false){
			$branch_exists = false;
			$query = false;
			if($branch_id || $branch_name){
				if($branch_id){
					$branch_id = (int)$branch_id;
					if($branch_id > 0){
						$query = mysql_query("select * from branch where branch_id='".$branch_id."'");
					}

				}else if($branch_name){ 
					$branch_name = trim($branch_name);
					if($branch_name){
						$query = mysql_query("select * from branch where branch_name='".$branch_name."'");
					}
				}
			}
			
			if($query && mysql_num_rows($query) > 0){
				$branch_exists = true;
			}
			
			return $branch_exists;
		}
	}
	if(!function_exists("position_exists")){
		function position_exists($usertype=false){
			$position_exists = false;
			$query = false;
			if($usertype){
					$usertype = trim($usertype);
					if($usertype){
						$query = mysql_query("select * from user_types where position='".$usertype."'");
					}

			}
			
			if($query && mysql_num_rows($query) > 0){
				$position_exists = true;
			}
			
			return $position_exists;
		}
	}
	if(!function_exists("username_exists")){
		function username_exists($username=false,$except_user_account_id=false){
			$username_exists = false;
			$query = false;
			if($username){
				$username = trim($username);
				if($username){
					if($except_user_account_id && (int)$except_user_account_id > 0){
						$query = mysql_query("select * from user_accounts where username='".$username."' and user_id != '".$except_user_account_id."' ");
					}else{
						$query = mysql_query("select * from user_accounts where username='".$username."'");
					}

				}

			}
			
			if($query && mysql_num_rows($query) > 0){
				$username_exists = true;
			}
			return $username_exists;
		}
	}
	if(!function_exists("name_exists")){
		function name_exists($firstname=false,$lastname=false,$middlename=false,$except_user_profile_id=false){
			$name_exists = false;
			$query = false;
			if($firstname && $lastname){
					$firstname = trim($firstname);
					$lastname = trim($lastname);
					$middlename = trim($middlename);
					if($firstname && $lastname){
						if($except_user_profile_id && (int)$except_user_profile_id > 0){
							$query = mysql_query("
									SELECT
										* 
									FROM 
										user_profiles 
									WHERE 
										firstname='".$firstname."'
									AND
										lastname='".$lastname."'
									AND
										middlename='".$middlename."'
									AND 
										profile_id!='".$except_user_profile_id."'
									");
						}else{
							$query = mysql_query("
									SELECT
										* 
									FROM 
										user_profiles 
									WHERE 
										firstname='".$firstname."'
									AND
										lastname='".$lastname."'
									AND
										middlename='".$middlename."'
									");
						}
						
					}

			}
			
			if($query && mysql_num_rows($query) > 0){
				$name_exists = true;
			}
			return $name_exists;
		}
	}
	if(!function_exists("is_a_valid_date")){
		function is_a_valid_date($mydate){
			$return = false;
			$y = false;
			$d = false;
			$m = false;
			if($mydate){
				if(preg_match("/^(0[1-9]|[1-9]|1[0-2])\/(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])\/([1-9][0-9]{3})$/", $mydate)) {
					list($m, $d, $y) = explode("/", $mydate);
				}else if(preg_match("/^([1-9][0-9]{3})-(0[1-9]|[1-9]|1[0-2])-(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])$/", $mydate)){
					list($y, $m, $d) = explode("-", $mydate);
				}
				if($y && $d && $m){
					if(checkdate($m, $d, $y)) {
					   $return = true;
					}
				}
			}
			return $return;
		}
	}
	if(!function_exists("getDateYMD")){
		function getDateYMD($mydate){
			$return = false;
			$y = false;
			$d = false;
			$m = false;
			if($mydate){
				if(preg_match("/^(0[1-9]|[1-9]|1[0-2])\/(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])\/([1-9][0-9]{3})$/", $mydate)) {
					list($m, $d, $y) = explode("/", $mydate);
				}else if(preg_match("/^([1-9][0-9]{3})-(0[1-9]|[1-9]|1[0-2])-(0[1-9]|[1-9]|[1-2][0-9]|3[0-1])$/", $mydate)){
					list($y, $m, $d) = explode("-", $mydate);
				}
				if($y && $d && $m){
					if(checkdate($m, $d, $y)) {
						$return = array(
										"y"=>$y,
										"m"=>$m,
										"d"=>$d
										);
					}
				}
			}
			return $return;
		}
	}
	if(!function_exists("get_current_web_address")){
		function get_current_web_address(){
			$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			return $url;
		}
	}
	if(!function_exists("item_exists")){
		function item_exists($item_id = false, $item_description=false ,$item_category=false,$except_self=false){
			$item_exists =false;
			$query =false;
			if($item_id){
				
				if($except_self){
					if($item_description){
						if($item_category){
							$query= mysql_query ("select * from items where item_category = '$item_category' and item_description = '$item_description' and item_id != '$item_id' ");
						}else{
							$query= mysql_query ("select * from items where item_description = '$item_description'  and item_id != '$item_id' ");
						}
					}
				}else{
					$query= mysql_query ("select * from items where item_id = '$item_id'");
				}
			}else if($item_description){
				if($item_category){
					
					$query= mysql_query ("select * from items where item_category = '$item_category' and item_description = '$item_description'");
				}else{
					$query= mysql_query ("select * from items where item_description = '$item_description'");
				}
			}
			
			if($query && mysql_num_rows($query)>0){
				$item_exists = true;
			}
			return $item_exists;
		}
	}
	?>