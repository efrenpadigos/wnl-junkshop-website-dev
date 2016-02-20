<div id='head'>
				<div class='left' align='center'>
				<?php
					$query1 =  mysql_query("SELECT * FROM cashier_profile WHERE cashier_id='$cashier'");
					while($row1 = mysql_fetch_array($query1))
					  { 
						$branch=  $row1['branch_name']; 
					  }
				  ?>
				<h1 style='color:white;font:45px arial;'><?php echo $branch; ?></h1>
				</div>
				 <?php
				 include('includes/connect.php');
				  $result = mysql_query("SELECT sum(total) FROM sales WHERE temp='$temp'");
					while($row5 = mysql_fetch_array($result))
					  { 
						$sum1=  $row5['sum(total)']; 
					  }
				  ?>
				<div class='right'>
					<h1>SubTotal:</h1><input type='text' placeholder='00.00' readonly value='<?php echo $sum1; ?>'/><br/>
				</div>
			</div>