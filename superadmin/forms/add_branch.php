
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

<form action="branches.php" method="post">
 Branch Name<br />
  <input name="branch_name" type="text" class="ed" required /><br />
 Address<br />
    <input name="address" type="text"  class="ed"  required /><br />
 Capital<br />
    <input name="capital" type="text"  class="ed"  required /><br />
  
    <input type="submit" name="save" value="Add Branch" id="button1" required/>
 
</form>
