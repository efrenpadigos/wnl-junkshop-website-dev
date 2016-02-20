
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
	if(isset($_GET['edit'])){
		$_SESSION['edit'] = $_GET['edit'];
		$sql = mysql_query("SELECT * FROM recycled_item WHERE item_id = '$_GET[edit]'") or die(mysql_error());
		$fetch = mysql_fetch_array($sql);
?>

<form action="edit_image_process.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
	<input type='hidden' name='item_id' value='<?php echo $fetch['item_id'];?>' />
 	<img src="images/<?php echo $fetch['file_name'];  ?>" width='250' height='200'><br />
 Edit Image<br />
  <input name="image"  type="file" class="ed" /><br />
 
    <input type="submit" name="edit" value="Update Image" id="button1" />
<?php
	}
?>
</form>

