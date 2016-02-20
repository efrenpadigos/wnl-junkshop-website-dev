<?php
	$branch = 0;
	include('../session.php');
?>
<?php
	include('includes/connect.php');
	$admin = $_SESSION['user_id'];
?>
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
height: 30px;
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
		$query = mysql_query("select * from admin_profile where admin_id = '$admin'");
			while($row = mysql_fetch_array($query)){
			$id = $row['admin_id'];
			$branch = $row['branch_name'];
			}
	?>
<form action="recycle.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
 Upload image<br />
  <input name="image" type="file" class="ed" required /><br />
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
  <input name="name" type="text" class="ed" required /><br />
 Weight or Quantity<br />
  <input name="weight" type="text" class="ed" required /><br />
 Price<br />
    <input name="price" type="text"  class="ed"  required /><br />
	
    <input name="branch" type="hidden"  value='<?php echo $branch; ?>' class="ed"  required /><br />
  
    <input type="submit" name="save" value="Add Price" id="button1" required/>
 
</form>