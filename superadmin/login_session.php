<?php
	session_start();
	
	$is_logged_in = false;
	$superadmin_id = false;
	$superadmin_logged_in = false;
	
	if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])){
		$is_logged_in = true;
		if(isset($_SESSION['superadmin_logged_in']) && (trim($_SESSION['superadmin_logged_in']))) {
		
			$superadmin_logged_in = $_SESSION['superadmin_logged_in'];
			if($superadmin_logged_in){
				if(isset($_SESSION['superadmin_id']) || (trim($_SESSION['superadmin_id']))) {
					$superadmin_id = $_SESSION['superadmin_id'];
				}
			}
		}
	}
	if($is_logged_in && ($superadmin_logged_in) && $superadmin_id && (int)$superadmin_id > 0){
		//header("location:home.php");
	}else{
		
	}
?>