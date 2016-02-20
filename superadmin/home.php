<?php
	include('includes/connect.php');
	include('../includes/helper_functions.php');
	include('session.php');
	
?>

<!doctype html>
<html lang='en-us'>
		<?php
			include('template/header.php');	
		?>
			<body>
			<?php
				include('includes/error_alert.php');
			?>
			<?php
				include('template/head.php');	?>
				<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ITEMS TO BE POST</h1>
					</form>
								<table id=''>
									<thead>
										<div style='margin:auto;border:0px solid gray;width:50%;'>
											<table>
												<tr>
													<th style='width:10%;background:lightblue;border:1px solid black;'>IMAGE</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>ITEM DESCRIPTION</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>CATEGORY</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>WEIGHT</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>BRANCH</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>PRICE</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>ACTION</th>
												</tr>
												<th style='width:10%;background:white;border:1px solid black;'>pic,jpg</th>
													<th style='width:10%;background:white;border:1px solid black;'>timba</th>
													<th style='width:10%;background:whitetblue;border:1px solid black;'>non ferous</th>
													<th style='width:10%;background:white;border:1px solid black;'>5kl</th>
													<th style='width:10%;background:white;border:1px solid black;'>WNL1</th>
													<th style='width:10%;background:white;border:1px solid black;'>250</th>
													<th style='width:10%;background:white;border:1px solid black;'>
													<a href='edit.php'>EDIT</a>/
													<a href='#.php'>DELETE</a>/
													<a href='#.php'>POST</a>
													<tr>
												<th style='width:10%;background:white;border:1px solid black;'>pic,jpg</th>
													<th style='width:10%;background:white;border:1px solid black;'>balde</th>
													<th style='width:10%;background:whitetblue;border:1px solid black;'>plastic</th>
													<th style='width:10%;background:white;border:1px solid black;'>5kl</th>
													<th style='width:10%;background:white;border:1px solid black;'>WNL2</th>
													<th style='width:10%;background:white;border:1px solid black;'>150</th>
													<th style='width:10%;background:white;border:1px solid black;'>
													<a href='edit.php'>EDIT</a>/
													<a href='#.php'>DELETE</a>/
													<a href='#.php'>POST</a>					
													
												<tr>
												</tr>			
											</table>   
												<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLECTORS TO BE APPROVE</h1>
												<table id=''>
									<thead>
										<div style='margin:auto;border:0px solid gray;width:50%;'>
											<table>
<tr>
													<th style='width:10%;background:lightblue;border:1px solid black;'>FULL NAME</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>AGE</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>GENDER</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>ADDRESS</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>CONTACT</th>						
													<th style='width:10%;background:lightblue;border:1px solid black;'>IMAGE</th>
													<th style='width:10%;background:lightblue;border:1px solid black;'>BRANCH</th>													
													<th style='width:10%;background:lightblue;border:1px solid black;'>ACTION</th>
												</tr>
													<th style='width:10%;background:white;border:1px solid black;'>juan manolo</th>
													<th style='width:10%;background:white;border:1px solid black;'>29</th>
													<th style='width:10%;background:whitetblue;border:1px solid black;'>male</th>
													<th style='width:10%;background:white;border:1px solid black;'>molave</th>
													<th style='width:10%;background:white;border:1px solid black;'>095489545847</th>
													<th style='width:10%;background:white;border:1px solid black;'>f.jpg</th>
													<th style='width:10%;background:white;border:1px solid black;'>WNL1</th>
													<th style='width:10%;background:white;border:1px solid black;'>
													<a href='#.php'>DELETE/</a>
													<a href='#.php'>APPROVE</a>
												</tr>
													<th style='width:10%;background:white;border:1px solid black;'>PEDRO SEGUNDO</th>
													<th style='width:10%;background:white;border:1px solid black;'>39</th>
													<th style='width:10%;background:whitetblue;border:1px solid black;'>male</th>
													<th style='width:10%;background:white;border:1px solid black;'>mahayag</th>
													<th style='width:10%;background:white;border:1px solid black;'>09548954667</th>
													<th style='width:10%;background:white;border:1px solid black;'>PIC.jpg</th>
													<th style='width:10%;background:white;border:1px solid black;'>WNL2</th>
													
													<th style='width:10%;background:white;border:1px solid black;'>
													<a href='#.php'>DELETE/</a>
													<a href='#.php'>APPROVE</a>
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




