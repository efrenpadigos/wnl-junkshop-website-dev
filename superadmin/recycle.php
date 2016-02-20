<?php
	include('session.php');
?>
<?php
	include('includes/connect.php');
	$superadmin = $_SESSION['superadmin_id'];
?>
<!doctype html>
<html lang='en-us'>
	<?php
	include('template/header.php');	
	?>
			<body>
				<?php include('template/head.php'); ?>
				<br />
					<div id='content'>
					<div id='menu'>
					<?php include('template/menu.php'); ?>
				</div>
						<h1 style='color:maroon;border-bottom:1px solid #ccc;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reusable Item</h1>
						<div class="portlet-header fixed" style='float:right'>
							<img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" style='margin-left:30px;' /> 
							<input type="text" name="filter" value="" id="filter" placeholder='Filter' /><br /><br />
						</div>		
						<button><a href='add_recycle.php' type='text' rel='facebox' class='a'>Add Item</a></button>
						<table id='resultTable'>
							<thead>
								<tr>
									<th style='width:14%'>Image</th>
									<th style='width:14%'>Item Category</th>
									<th style='width:14%'>Item Description</th>
									<th style='width:14%'>Weight in Kg</th>
									<th style='width:14%'>Date Uploaded</th>
									<th style='width:14%'>Price</th>
									<th style='width:16%'>Action</th>
								</tr>
							</thead>					
							 <?php
								$branch = "";
								$query = mysql_query("select * from recycled_item");
									while($row = mysql_fetch_array($query)){
									$id = $row['item_id'];
							  ?>
							 <tr align='center'>
							<?php echo '<td><a href="view_image.php?view='.$id.'" rel="facebox"><img src="images/'.$row['file_name'].'" width="50" height="30" ></a></td>'; ?>

								  <td><?php echo $row['item_category']; ?></td>
								  <td><?php echo $row['name']; ?></td>
								  <td><?php echo $row['weight']; ?></td>
								  <td><?php echo $row['date_uploaded']; ?></td>
								  <td><?php echo $row['price']; ?></td>
									 <td>
									   <a href="edit_recycle.php?update=<?php echo $id; ?>" rel='facebox'> Edit</a> |&nbsp;
									   <a href='?del=<?php echo $id; ?>' onclick='return confirm("Are you sure you want it to delete?")'> Delete</a> |&nbsp;
									   <a href="edit_image.php?edit=<?php echo $id; ?>" rel='facebox'> Edit image</a>
									</td>
								</tr>
								
								<?php
								}
								?>
						</table>
					</div>
							<?php include('template/footer.php'); ?>
					<?php
						if(isset($_GET['del'])){
								$id = $_GET['del'];
								$sql = mysql_query("select * from recycled_item where item_id='$id'");
									while($row=mysql_fetch_array($sql)){
										$weight = $row['weight'];
										$item_category = $row['item_category'];
										$branch = $row['branch_name'];
									}
								$sql1 = mysql_query("select * from inventory where item_category='$item_category' and branch_name='$branch'");
									while($row1=mysql_fetch_array($sql1)){
										$quantity = $row1['quantity'];
									}
									$weight1 = $weight + $quantity;
								
								$query = mysql_query("update inventory set quantity ='$weight1' where item_category = '$item_category' and branch_name ='$branch'");
							mysql_query("DELETE FROM recycled_item WHERE item_id = '$_GET[del]'") or die(mysql_error());
							}
					?>
			</body>
		</html>	
<?php
	if(isset($_POST['save'])){
		$file_names = $_POST['file_name'];
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		
		$expensions= array("jpg","png"); 		
		if(in_array($file_ext,$expensions)== false){
			echo"<script> alert('Extension not allowed, please choose a JPG or PNG file.');window.location.href=''</script>";
		}
		else{
		// if($file_size> 2097152){
		// $errors[]='File size must be excately 2 MB';
		// }				
		if(empty($errors)==true){
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);

			
			move_uploaded_file($file_tmp,"images/".$file_name);
			
			$file = $_FILES["image"]["name"];
			
			$sql = mysql_query("SELECT * FROM recycled_item WHERE file_name = '$file' and branch_name='$branch' ") or die(mysql_error());
				$count = mysql_num_rows($sql);
				if($count > 0){
					echo"<script> alert('File already exist.');window.location.href=''</script>";
				}
				else{
			date_default_timezone_set("Asia/Singapore");
			$date = date("Y-m-d h:i:s",strtotime("now"));
			
			$item_category = $_POST['item_category'];
			$price = $_POST['price'];
			$weight = $_POST['weight'];
			$name = $_POST['name'];
			
			$sql = mysql_query("select * from inventory where item_category='$item_category' and branch_name ='$branch'");
				while($row=mysql_fetch_array($sql)){
					$quantity = $row['quantity'];
					
				$ans = $price*$quantity;
				
				}
				if($quantity == 0){
					echo"<script> alert('hey your inventory is empty!.');window.location.href=''</script>";
					exit;
				}
				if(!is_numeric($price)){
					echo"<script> alert('hey your price should not be written in letter.');window.location.href=''</script>";
					exit;
				}
				if(!is_numeric($weight)){
					echo"<script> alert('hey your weight should not be written in letter.');window.location.href=''</script>";
					exit;
				}
				if($quantity < $weight){
					echo"<script> alert('The weight inside your inventory should not exceed from the maximum weighing.');window.location.href=''</script>";
					exit;
				}
				else{
			$weight1 = $quantity - $weight;
			
			$sql1 = mysql_query ("update inventory set quantity = '$weight1' where branch_name ='$branch' and item_category='$item_category'");
			
			$query =mysql_query("INSERT INTO recycled_item VALUES('','$item_category','$name','$weight','$file','$date','$price','$branch')") or die(mysql_error());
			
			echo"<script> alert('Reusable item has been added!.');window.location.href=''</script>";
				}
			}
			
		}else{
			print_r($errors);
		}
		}
	}
?>
