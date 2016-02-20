<?php
	//Start session
	session_start();
	
	
	$is_logged_in = false;
	$superadmin_id = false;
	$superadmin_logged_in = false;
	
	if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])){
		// echo "logged in is true";
		$is_logged_in = true;
		if(isset($_SESSION['superadmin_logged_in']) && (trim($_SESSION['superadmin_logged_in']))) {
		
			$superadmin_logged_in = $_SESSION['superadmin_logged_in'];
			if($superadmin_logged_in){
				 // echo "logged in user position is superadmin";
				if(isset($_SESSION['superadmin_id']) || (trim($_SESSION['superadmin_id']))) {
					$superadmin_id = $_SESSION['superadmin_id'];
				}
			}
		}
	}
	if($is_logged_in && ($superadmin_logged_in) && $superadmin_id && (int)$superadmin_id > 0){
		
	}else{
		// print_r($_SESSION);
		// exit("not ok");
		$random_error_id = generate_random_id();
		$_SESSION[$random_error_id] = "Attention! You are not logged in. Please log in first.";
		$_SESSION["junk_error"] = $random_error_id;
		header("location:login.php");
		exit();
	}
	//Check whether the session variable SESS_MEMBER_ID is present or not
?>