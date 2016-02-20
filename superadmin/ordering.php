<!doctype html>
<?php
	include('includes/connect.php');
	
?>
<html lang='en-us'>
	<head>
			<title>WNL's Junk Shop</title>
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="src/argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
		<script src="src/application.js" type="text/javascript" charset="utf-8"></script>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<script src="src/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		  $('a[rel*=facebox]').facebox({
			loadingImage : 'src/loading.gif',
			closeImage   : 'src/closelabel.png'
		  })
		})
	</script>
	</head>
			<body>
				<?php include('template/head.php'); ?>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
				<br>
					<div id='content'>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ordering</h1>
						
								<table id='resultTable'>
									<h1 align='center'>WARNING!!</h1>
									<h1  align='center'>THIS PAGE IS UNDER CONSTRUCTION!</h1>
								</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
							mysql_query("DELETE FROM cashier_profile WHERE cashier_id = '$_GET[del]'") or die(mysql_error());
								echo"<script> alert('Cashier has been deleted.');window.location.href='cashier.php'</script>";
							}
					?>
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate']; 
		$contact = $_POST['contact'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$query = mysql_query("INSERT INTO cashier_profile VALUES('','$firstname','$middlename','$lastname','$gender','$birthdate','$contact','$address','$email','$username','$password')") or die(mysql_error());
				echo"<script> alert('Cashier profile has been added.');window.location.href=''</script>";
	}
?>