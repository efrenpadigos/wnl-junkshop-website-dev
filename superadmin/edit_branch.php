
<script type="text/javascript">
function validateForm()
{
var a=document.forms["addroom"]["type"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the room type");
  return false;
  }
var b=document.forms["addroom"]["rate"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter the room rate");
  return false;
  }

</script>

<style type="text/css">
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 190px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif, monotype corsiva;
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
		$sql = mysql_query("SELECT * FROM branch WHERE branch_id = '$_GET[update]'") or die(mysql_error());
		$fetch = mysql_fetch_array($sql);
?>

<form action="edit_branch_process.php" method="post">
	<input type='hidden' name='branch_id' value='<?php echo $fetch['branch_id'];?>' />
	<input type='hidden' name='branch' value='<?php echo $fetch['branch_name'];?>' />
 Branch Name<br />
  <input name="branch_name" value='<?php echo $fetch['branch_name']; ?>' type="text" class="ed" /><br />
 Address<br />
    <input name="address" type="text" value='<?php echo $fetch['address']; ?>' class="ed" /><br />
  
    <input type="submit" name="edit" value="Save Changes" id="button1" />
<?php
	}
?>
</form>

