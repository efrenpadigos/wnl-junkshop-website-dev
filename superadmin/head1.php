<div id='head1'>
	<div class='left' align='center'>
	<?php
	$branch = "";
		//$query1 =  mysql_query("SELECT * FROM admin_profile WHERE admin_id='$admin_id'");
		//while($row1 = mysql_fetch_array($query1))
		  //{ 
			//$branch=  $row1['branch_name']; 
		  //}
	  ?>
		<div class='a'>
			<h1>Cash:&nbsp;</h1><input type='text'  placeholder='00.00' 
			value='<?php if(isset($_POST['save'])){ 
			if(!is_numeric($_POST['cash'])){
				echo "00.00";
			}
			else{
			echo $_POST['cash'];  }} ?>' readonly value=''/><br/>
		</div>
		 <div class='b'>
			<h1>Change:&nbsp;</h1><input type='text' placeholder='00.00' readonly value='<?php if(isset($_POST['save'])){ 
			if(!is_numeric($_POST['cash'])){
				echo "00.00";
			}
			else
			{
			echo $_POST['cash']-$_POST['total'];

			}} ?>'/><br/>
		</div>
	</div>
	 <?php
	 $temp = "";
	 include('includes/connect.php');
	  $result = mysql_query("SELECT sum(total) FROM temp_sales_recycle WHERE temp='$temp'");
		while($row5 = mysql_fetch_array($result))
		  { 
			$sum1=  $row5['sum(total)']; 
		  }
	  ?>
	<div class='right'>
	<h1>Subtotal:</h1>
		<input type='text' style='width:220px;text-align:center' placeholder='00.00' readonly value='<?php echo $sum1; ?>'/><br/>
	</div>
</div>
<br />