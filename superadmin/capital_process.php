<?php
	include('includes/connect.php');
	if(isset($_POST['save'])){
	$branch_id= $_POST['branch_id'];
	$capital= $_POST['capital'];
	
	$query = mysql_query("select * from branch where branch_id = '$branch_id'");
	while($row = mysql_fetch_array($query))
	{
		$cap = $row['capital'];
		$total = $cap + $capital;
		$name="
			UPDATE 
				branch 
			SET 
				capital='".$total."'
			WHERE 
				branch_id='".$branch_id."'
			";
		$query = mysql_query($name) or die("error");
		echo"<script> alert('Capital has been added successfully!');window.location.href='branches.php'</script>";
	}
	}
	
	
?>