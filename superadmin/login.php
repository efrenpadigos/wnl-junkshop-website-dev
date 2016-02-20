<?php
	ob_start();
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('login_session.php');
	
?>
<?php
	include('proccesses/login_process.php');
?>
<!DOCTYPE html>
<html lang='en-us'>
	<head>
		<title>WNL's Junk Shop</title>
	</head>
	<style>
	body{
		background : #ccffcc;	
	}
	#wrapper{
		background : #66ffcc;
		width : 400px;
		height:280px;
		margin:150px auto;
		border-radius : 10px;
		-webkit-box-shadow: 0px 1px 1px 1px #1ca7c0 !important;
					-moz-box-shadow: 0px 1px 1px 1px #1ca7c0 !important;
					box-shadow: 0px 0px 90px !important;
}

	}
	h1{
		font : 40px monotype corsiva;
		border-bottom : 1px solid black;
		height : 50px;
		padding : 10px;
	}
	input[type=text],[type=password]{
		width : 200px;
		margin-top : 10px;
		height : 25px;
	}
	select{
		width : 200px;
		margin-top : 10px;
		height : 30px;
	}
	input[type=submit]{
		width : 200px;
		margin-top : 10px;
		height : 30px;
	}
	</style>
	<body>
		
		<?php
			include('includes/error_alert.php');
		?>
		<div id='wrapper' align='center'>
			<form action='' method='POST'>
					<h1>User Login</h1>
					<input type='text' name='username' placeholder='Username' /><br />
					<input type='password' name='password' placeholder='Password' /><br />			
					<input type='submit' name='login' value='LOGIN' />
			</form>
		</div>
	</body>
</html>
