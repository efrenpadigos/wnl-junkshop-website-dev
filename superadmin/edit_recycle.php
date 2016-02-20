
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
.ed1{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
width : 200px;
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
		$sql = mysql_query("SELECT * FROM recycled_item WHERE item_id = '$_GET[update]'") or die(mysql_error());
		$fetch = mysql_fetch_array($sql);
?>

<form action="edit_recycle_process.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
	<input type='hidden' name='item_id' value='<?php echo $fetch['item_id'];?>' />
 Item Category<br />
 <select name="item_category" class='ed1'>
								<option value=""></option>
								<?php
									$query = mysql_query("select * from  price");
										while($row = mysql_fetch_array($query)){
										echo '<option value="'.$row['item_category'].'"';
											if(isset($_POST['item_category']) && trim($_POST['item_category']) == $row['price_id']){
											echo ' SELECTED="SELECTED" ';
										}
										echo '>';
										echo $row['item_category'];
										echo '</option>';
									}
								?>
							</select><br />
	 Name<br />
  <input name="name" value='<?php echo $fetch['name']; ?>' type="text" class="ed" /><br />
 Weight<br />
  <input name="weight" value='<?php echo $fetch['weight']; ?>' type="text" class="ed" /><br />
 Price<br />
    <input name="price" type="text" value='<?php echo $fetch['price']; ?>' class="ed" onkeypress="return isNumberKey(event)" /><br />
  
    <input type="submit" name="edit" value="Update Price" id="button1" />
<?php
	}
?>
</form>

