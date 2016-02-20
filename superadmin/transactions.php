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
				Transactions
			</h1>
			<div id="content-container" style="padding:5px 10px; min-height:120px;">
				<table id="resultTable">
					<thead>
						<tr>
							<th>branch name</th>
							<th>Employee info</th>
							<th>Type</th>
							<th>Reciept no.</th>
							<th>Total price</th>
							<th>Status</th>
							<th>Date</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Wml kapatagan</td>
							<td>Efren Padigos - Admin</td>
							<td>Purchase</td>
							<td>12345</td>
							<td>P 150.00 </td>
							<td>Ok</td>
							<td>01-01-2016</td>
							<td><a href="#"> <strong> View Details </strong> </a></td>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php include('template/footer.php'); ?>

	</body>
</html>