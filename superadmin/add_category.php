
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
font-family:Arial, Helvetica, sans-serif, monotype corsiva;
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

<form action="item_categories.php" method="post" >
 Item Category<br />
  <input name="item_category" type="text" class="ed" required /><br />
  
  <input type="submit" name="save" value="Add Category" id="button1" required/>
</form>
