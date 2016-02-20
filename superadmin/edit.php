<?php
	include('../session.php');
?>
<?php
	include('includes/connect.php');
	$admin = $_SESSION['user_id'];
?>
<!doctype html>
<html lang='en-us'>
		<?php
			include('template/header.php');
		?>
			<body>
				<?php include('template/head.php'); ?>
				<br>
					<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIT PRICE</h1>
						
					</form>
								<table id=''>
									<thead>
										<div style='margin:auto;border:1px solid gray;width:50%;'>
											<div style='text-align:center;font-size:20px;'>EDIT PRICE</div>
											<br/>
											<div>New Price<b>:</b><input type='text' name='' value=''></div>
											</br>
											</select><button><a href='home.php'>UPDATE PRICE</a></button>
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


