

<style type="text/css">
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 190px;
}
select{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 200px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif, monotype corvisa;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
width : 200px;
}

</style>


<SCRIPT language=Javascript>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
   </SCRIPT>
<?php
	include('includes/connect.php');
	if(isset($_GET['update'])){
		$_SESSION['update'] = $_GET['update'];
		$sql = mysql_query("SELECT * FROM admin_profile WHERE admin_id = '$_GET[update]'") or die(mysql_error());
		$fetch = mysql_fetch_array($sql);
?>

<form action="edit_admin_process.php" method="post" >
	<input type='hidden' name='admin_id' value='<?php echo $fetch['admin_id'];?>' />
 First Name<br />
  <input name="firstname" type="text" class="ed" value='<?php echo $fetch['firstname']; ?>' required /><br />
 Middle Name<br />
  <input name="middlename" type="text" class="ed" value='<?php echo $fetch['middlename']; ?>' required /><br />
 Last Name<br />
  <input name="lastname" type="text" class="ed" value='<?php echo $fetch['lastname']; ?>' required /><br />
 Gender<br />
	<select  required name='gender'  value='<?php echo $row['gender']; ?>'>
		<option <?php if($fetch['gender'] == 'male'){ echo"SELECTED"; } ?> value='male'>MALE</option>
		<option <?php if($fetch['gender'] == 'female'){ echo"SELECTED"; } ?> value='female'>FEMALE</option>
	</select><br />	
 Address<br />
  <input name="address" type="text" class="ed" value='<?php echo $fetch['address']; ?>' required /><br />
 Birthdate<br />
  <input name="birthdate" type="date" class="ed" value='<?php echo $fetch['birthdate']; ?>' required /><br />
 Contact Number<br />
  <input name="contact" type="text" class="ed" value='<?php echo $fetch['contact_no']; ?>' required /><br />
   Username<br />
  <input name="username" type="text" class="ed" value='<?php echo $fetch['username']; ?>' required /><br />
 Password<br />
  <input name="password" type="passowrd" class="ed" value='<?php echo $fetch['password']; ?>' required /><br />
  Branch<br />
  <select required name='branch' class="ed1" required>
		<option value=''>Select Branch</option>
			<?php
			include('includes/connect.php');
				$query = mysql_query("select * from branch");
					while($row = mysql_fetch_array($query)){
					echo '<option value="'.$row['branch_name'].'"';
					echo '>';
					echo $row['branch_name'];
					echo '</option>';
					}
			?>
	</select><br />
  <input type="submit" name="update" value="Save changes" id="button1" required/>
<?php
	}
?>
</form>

