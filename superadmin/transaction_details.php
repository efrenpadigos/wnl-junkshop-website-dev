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
		<?php include('template/head.php'); ?>
		<br>
		<div id='content' style='min-height:250px;'>
			<div id='menu'>
				<?php include('template/menu.php'); ?>
			</div>
			<h1 id="content-title" style='color:maroon;border-bottom:1px solid #ccc; padding-left:20px;'>
				Transaction details
			</h1>
			<div id="content-container" style="padding:5px 10px; min-height:120px;">
				<p> Transaction Type: Purchased</p>
				<p> Employee Name: Efren Padigos</p>
				<p> Type: Superadmin</p>
				<p> Date:01-01-2016</p>
				<p> Time:09:59 AM</p>
				<p> Reciept No :123456</p>
				<label style="padding-left:25px"> List of iems </label>
				<table id="resultTable">
					<thead>
						<tr>
							<th>Item description</th>
							<th>Price per Unit</th>
							<th>Unit of measure</th>
							<th>Total Units</th>
							<th>Total Price.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Puthaw</td>
							<td>P 15.00 </td>
							<td>Kilo (kgs) </td>
							<td>10 kgs </td>
							<td>P 150.00 </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>