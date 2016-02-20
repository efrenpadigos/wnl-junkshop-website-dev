<?php
	
	if(isset($_SESSION["junk_error"]) && trim($_SESSION["junk_error"]) != "" && isset($_SESSION[$_SESSION["junk_error"]])){
		$jun_error = $_SESSION[$_SESSION["junk_error"]];
		?>
			<script type="text/javascript" language="javascript">
				alert("<?php echo $jun_error; ?>");
			</script>
		<?php
		unset($_SESSION[$_SESSION["junk_error"]]);
		unset($_SESSION["junk_error"]);
	
	}

?>