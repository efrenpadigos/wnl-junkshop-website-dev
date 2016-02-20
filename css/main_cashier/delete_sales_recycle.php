<?php
						include('includes/connect.php');
						if(isset($_GET['del'])){
						$item_category = $_GET['item_category'];
						$unit_of_measure = $_GET['unit_of_measure'];
						$branch = $_GET['branch'];
						$total = $_GET['totalprice'];
						$qty = $_GET['qty'];
						$query1 = mysql_query("select * from inventory where item_category = '$item_category' and branch_name = '$branch'");
							if(mysql_num_rows($query1) > 0){
								$query = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'");
									while($row=mysql_fetch_array($query)){
										$price = $row['price'];
										$totalqty = $row['quantity'] + $qty;
										$totalprice = $row['total'] + ($price*$qty);
									}
									$query1 = mysql_query("UPDATE inventory SET quantity ='$totalqty',total='$totalprice' where item_category='$item_category' and branch_name='$branch'");
										$query2 = mysql_query("SELECT * from inventory where item_category = '$item_category' and branch_name='$branch'");
											while($row2=mysql_fetch_array($query2)){
												if($row2['quantity']==0){
													mysql_query("DELETE FROM inventory WHERE item_category = '$item_category' and branch_name='$branch'") or die(mysql_error());
												}
											}
								}
								else{
								$query4= mysql_query ("select * from sales_recycle where item_category = '$item_category' and branch_name='$branch'");
									while($bb=mysql_fetch_array($query4)){
										$price = $bb['original_price'];
									}
									$query3 = mysql_query ("insert into inventory values('','$item_category','$qty','$price','$unit_of_measure','$total','$branch')");
								}
									mysql_query("DELETE FROM temp_sales_recycle WHERE sales_recycle_id = '$_GET[del]'") or die(mysql_error());
									mysql_query("DELETE FROM sales_recycle WHERE sales_recycle_id = '$_GET[del]'") or die(mysql_error());
										header("location: sales_recycle.php");
					}
					?>