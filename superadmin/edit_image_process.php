<?php
	include('includes/connect.php');
	if(isset($_POST['edit'])){
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
			$item_id = $_POST['item_id'];
			
			$sql = mysql_query("SELECT * FROM recycled_item WHERE file_name = '$file' ");
				$count = mysql_num_rows($sql);
				if($count > 0){
					echo"<script> alert('File already exist.');window.location.href=''</script>";
				}
				else{
			
			$query =mysql_query("UPDATE recycled_item SET file_name= '$file' where item_id = '$item_id' ") or die(mysql_error());
			
			echo"<script> alert('Recycle item has been updated!.');window.location.href='recycle.php'</script>";
			}
			
		}else{
			print_r($errors);
		}
		}
	}
?>
