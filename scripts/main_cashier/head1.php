<div id='head'>
				<div class='left' align='center'>
				<?php
					$query1 =  mysql_query("SELECT * FROM cashier_profile WHERE cashier_id='$cashier'");
					while($row1 = mysql_fetch_array($query1))
					  { 
						$branch=  $row1['branch_name']; 
					  }
				  ?>
					<div class='asdl'>
						<h1>Cash</h1><input type='text' placeholder='00.00' 
						value='<?php if(isset($_POST['save'])){ 
						if(!is_numeric($_POST['cash'])){
							echo "00.00";
						}
						else{
						echo $_POST['cash'];  }} ?>' readonly value=''/><br/>
					</div>
					 <div class='asdr'>
						<h1>Change:</h1><input type='text' placeholder='00.00' readonly value='<?php if(isset($_POST['save'])){ 
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
				 include('includes/connect.php');
				  $result = mysql_query("SELECT sum(total) FROM sales_recycle WHERE temp='$temp'");
					while($row5 = mysql_fetch_array($result))
					  { 
						$sum1=  $row5['sum(total)']; 
					  }
				  ?>
				<div class='right'>
					<h1>SubTotal:</h1><input type='text' placeholder='00.00' readonly value='<?php echo $sum1; ?>'/><br/>
				</div>
			</div>