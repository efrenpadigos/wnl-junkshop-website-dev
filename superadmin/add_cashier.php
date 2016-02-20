
<style type="text/css">
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 220px;
}
.ed1{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 230px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif, monotype corvisa;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 30px;
width : 230px;
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

<form action="cashier.php" method="post" >
  <input name="position" type="hidden" value='admin' class="ed" required /><br />
 First Name<br />
  <input name="firstname" type="text" class="ed" required /><br />
 Middle Name<br />
  <input name="middlename" type="text" class="ed" required /><br />
 Last Name<br />
  <input name="lastname" type="text" class="ed" required /><br />
 Gender<br />
	<select required name='gender' class="ed1" required>
		<option value=''>Select Gender</option>
		<option value='male'>MALE</option>
		<option value='female'>FEMALE</option>
	</select><br />
 Address<br />
  <input name="address" type="text" class="ed" required /><br />
 Birthdate<br />
  <input name="birthdate" type="date" class="ed" required /><br />
 Contact Number<br />
  <input name="contact" type="text" class="ed" required /><br />
 Username<br />
  <input name="username" type="text" class="ed" required /><br />
 Password<br />
  <input name="password" type="passowrd" class="ed" required /><br />
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
  <input type="submit" name="save" value="Add Cashier" id="button1" required/>
</form>
