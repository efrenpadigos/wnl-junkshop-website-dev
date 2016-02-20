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
	<script>
		function showHide()
		{
			if(document.getElementById("receipt").checked==true)
			{
				$("#receiver").show(5000);
				$("#address").show(5000);
				
			}
			else
			{
				$("#receiver").hide("slow");
				$("#receiver").hide("slow");
			}
		}
	</script>
				<?php include('template/head.php'); ?>
				<br>
					<div id='content'>
				<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STOCK IN</h1>
						
					</form>
					<div>
					<form action='' method='post'>
						<input type='checkbox' name='walkin' colspan='2' onclick='this.form.submit();'>WalkIn
						<input type='checkbox' name='byahedor' colspan='2' id='receipt' onclick='this.form.submit();'>Collector
						
						<?php
						if(isset($_POST['byahedor']) or isset($_POST['walkin'])){
						echo "<input type='submit' name='submit' value='view'>";
						}
						?>
						<br>
						<br/>
							CATEGORY:
							<select name= 'category'/>
								<option>	iron<br/>	</option>
								<option>	thin<br/>	</option>
								<option>	light material<br/>	</option>
								<option>	non ferrous<br/>	</option>
								<option>	plastic<br/>	</option>
								<option>	mono plastic<br/>	</option>
								<option>	</option>
							</select>
						<br/>
						<br/>
							DESCRIPTION:
							<select name= 'description'/>
								<option>	plastic			</option>
								<option>				</option>
								<option>	light material	</option>
								<option>	non ferrous		</option>
								<option>	plastic			</option>
								<option>	mono plastic	</option>
								<option>	</option>
							</select>
						<br/>
						<br/>
							PRICE:
							<input type='text' name='walkin'>
						<br/>
						<br>
							WEIGHT:
							<input type='text' name='walkin'>
						<br/>
						<br/>
							UNIT OF MEASURE:
							<select name= 'unit of measure'/>
								<option>	pcs.		</option>
								<option>	kl.			</option>
								<option>	</option>
							</select>
						<br/>
						<br>
							<input type='submit' name='walkin' value='ADD'>
						<br/>
						<br>
						TOTAL WEIGHT:
							<input type= 'total weight'/>
						<br/>		
						<br>
						TOTAL PRICE:
							<input type= 'total price'/>
						<br/>
						<br>
							<input type='submit' name='walkin' value='SAVE'>
						<br/>
							
								
					</form>
					</div>

									
			</body>
		</html>	

