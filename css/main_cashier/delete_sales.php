<?php
						include('includes/connect.php');
						if(isset($_GET['del'])){
						$item_category = $_GET['item_category'];
						$branch = $_GET['branch'];
						$total = $_GET['totalprice'];
						$qty = $_GET['qty'];
						
						$sql = mysql_query("select * from admin_profile where branch_name='$branch'");
							while($row1 = mysql_fetch_array($sql)){
								$capital = $row1['capital'];
							}
							$capital1 = $capital + $total;
						$sql1= mysql_query("update admin_profile set capital = '$capital1' where branch_name='$branch'");
					
						$query = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'");
							while($row=mysql_fetch_array($query)){
								$totalqty = $row['quantity'] - $qty;
								$totalprice = $row['total'] - $total;
							}
							$query1 = mysql_query("UPDATE inventory SET quantity ='$totalqty',total='$totalprice' where item_category='$item_category' and branch_name='$branch'");
								$query2 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'");
									while($row2=mysql_fetch_array($query2)){
										if($row2['quantity']==0){
											mysql_query("DELETE FROM inventory WHERE item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
										}
									}
							mysql_query("DELETE FROM sales WHERE sales_id = '$_GET[del]'") or die(mysql_error());
								header("location: index.php");
							}
					?>