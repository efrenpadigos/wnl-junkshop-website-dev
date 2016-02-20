<?php
	include('../session.php');
	include('includes/connect.php');
	$query = mysql_query("select * from temp_recycled_item") or die(mysql_error());
	$count = mysql_num_rows($query);
	if($count <= 0){
			echo"<script>alert('please pay later before buying.');window.location.href='sell_recycled_item.php'</script>";
	}
	else
	{
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
			$query = mysql_query("select sum(price) from temp_recycled_item") or die(mysql_error());
				while($row = mysql_fetch_array($query)){
					$total = $row['sum(price)'];
					}					
		?>
		<form action="sell_recycled_item.php" method="post" >
		  <input name="id" type="hidden" class="ed"  value='<?php echo $_GET['id']; ?>'  /><br />
		 Total Payment:<br />
			<input name="total" type="text"  class="ed" value='<?php echo $total; ?>'  readonly /><br />
		 Cash:<br />
			<input name="cash" type="text"  class="ed"  required /><br />
			
			
			
			<input type="submit" name="save" value="Compute" id="button1" required/>
		</form>
	<?php
	}
	?>
