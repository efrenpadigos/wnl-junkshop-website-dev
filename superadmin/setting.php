<?php
	include('../session.php');
?>
<?php
	include('includes/connect.php');
	$admin = $_SESSION['user_id'];
?>
<!doctype html>
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
		<style>
			#content{
				height:300px;
			}
		</style>
	</head>
			<body>
				<?php include('template/head.php'); ?>
				<br>
					<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SETTING</h1>
						
					</form>
								<table id=''>
										</div>
										<div style='width:100%;'>
											<div style='width:98%;margin:auto;text-align:center;border:0px solid red;'>
												<div style='float:left;background:lightblue;border:1px solid black;width:15%;'>Image</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:6%;'>Item Description</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:6%;'>Category</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:20%;'>Weight</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:15%;'>Branch</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:5%;'>Price</div>
												<div style='float:left;background:lightblue;border:1px solid black;width:15%;'>Action</div>
											</div>
				
													<a href='edit_byahedor.php'>EDIT</a>/
													<a href='edit_byahedor.php'>DEL</a>/
													<a href='view_byahedor_profile.php'>VIEW</a>
												</div>
											</div>
										</div>
									</thead>
									
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		$item_category = $_POST['item_category'];
		$price = $_POST['price'];
		$unit_of_measure = $_POST['unit_of_measure'];
		$item_category1 = $item_category;
		if(!is_numeric($price)){
			echo"<script> alert('Price not valid.');window.location.href=''</script>";
			exit;
		}
		$query= mysql_query ("select * from price where item_category = '$item_category1'");
		if(mysql_num_rows($query)>0){
				echo"<script> alert('file already exist.');window.location.href=''</script>";
					exit;
			}
		else{
		$query1 = mysql_query("INSERT INTO price VALUES('','$item_category','$price','$unit_of_measure')") or die(mysql_error());
				echo"<script> alert('Item has been added.');window.location.href=''</script>";
			}
	}
?>
