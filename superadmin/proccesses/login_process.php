<?php
	if(isset($_POST['login'])){
	
		$user = $_POST['username'];
		$pass = $_POST['password'];		
		$loginerror = false;
		if(!$user || trim($user) == ''){
			$loginerror = 'Username is Required.';		
		}else if(!$pass || trim($pass) == ''){
			$loginerror = 'Password is Required.';
		}else{
			$encrypted_pass = sha1($pass);
			$login_query = "
						select *
						from 
							user_accounts
						where 
								username = '".$user."' 
							and 
								password = '".$encrypted_pass."'
					";
			$query = mysql_query($login_query) or die(mysql_error());
			if($query && mysql_num_rows($query) >= 1){
				$row = mysql_fetch_array($query);
					
				$_SESSION['superadmin_id']=$row['user_id'];
				$_SESSION['superadmin_logged_in']=true;
				$_SESSION['logged_in'] = true;
				
			}else{
				$loginerror= 'Invalid username and password.';
			}
		}
		if($loginerror){
			$random_error_id = generate_random_id();
			$_SESSION[$random_error_id] = "Login failed! ".$loginerror;
			$_SESSION["junk_error"] = $random_error_id;
		}else{
			$random_error_id = generate_random_id();
			$_SESSION[$random_error_id] = "Congrats! You have successfully logged in.";
			$_SESSION["junk_error"] = $random_error_id;
			
			header("location:home.php");
			exit();
		}
	}
?>