
<?php
	$show_form = true;
	if(isset($edit_item_page) && $edit_item_page){

	}else{
		if(isset($_GET["facebox"]) && $_GET["facebox"]){
			include('../includes/connect.php');
			include('../../includes/helper_functions.php');
		}else{
			$show_form = false;
		}
	}
if($show_form ){	
	$edit_item_info = false;
	
	if(isset($_GET["item_id"]) && item_exists($_GET["item_id"])){
		$edit_item_info = get_item_info($_GET["item_id"]);
	}
?>
<div class="center-block" style="width:450px;">
	<form name="edititemform" id="edititemform" action="edit_item.php?item_id=<?php echo ($edit_item_info)?$edit_item_info["item_id"]:""; ?>" method="post" >
		<div style="display:none;">
			<input type="hidden" name="item_id" value="<?php echo ($edit_item_info)?$edit_item_info["item_id"]:""; ?>" />
		</div>
		<fieldset>
		<legend> Edit item </legend>
			 
			     <div class="form-style-2">
				   <label for="idescription">
						<span>
							Description 
							<span class="required">*</span>
						</span>
						<input value="<?php echo (isset($_POST["save_update_item"])?((isset($_POST["idescription"]))?trim($_POST["idescription"]):""):(($edit_item_info)?$edit_item_info["item_description"]:"gyytyt")); ?>"  name="idescription" type="text" class="input-field" required />
					</label>
					<label for="icategory">
						<span>
							Category 
							<span class="required">*</span>
						</span>
						<select name="icategory" class='select-field' required>
							<option value=""> </option>
							<?php
								$query = mysql_query("select * from  item_categories");
									while($row = mysql_fetch_array($query)){
										echo '<option value="'.$row['name'].'"';
										if(isset($_POST["save_update_item"])){
											if(isset($_POST['icategory']) && trim($_POST['icategory']) == $row['name']){
												echo ' SELECTED="SELECTED" ';
												
											}
										}else{
											if($edit_item_info && $edit_item_info['item_category'] == $row['name']){
												echo ' SELECTED="SELECTED" ';
											}
										}
											
										echo' > ';
										echo $row['name'];
										echo '</option>';
								}
							?>
						</select>
					</label>
					<label for="unitofmeasure">
						<span>
							Unit of Measure
							<span class="required">*</span>
						</span>
						<select name="unitofmeasure" class='select-field' required>
							<option value="">  </option>
							<?php
							$unit_of_measurements = get_all_unit_of_measurements();
							if($unit_of_measurements && is_array($unit_of_measurements) && count($unit_of_measurements)>0){
								foreach($unit_of_measurements as $unit_of_measurement => $unit_of_measure){
									?>
										<option value="<?php echo $unit_of_measure["alias"]; ?>" 
										<?php
											
											if(isset($_POST["save_update_item"])){
												if(isset($_POST["unitofmeasure"]) && ($_POST["unitofmeasure"]==$unit_of_measure["alias"])){
													echo ' selected =" selected "';
												}
											}else{
												if($edit_item_info && $edit_item_info['unit_of_measure'] == $unit_of_measure['alias']){
													echo ' SELECTED="SELECTED" ';
												}
											}
										?>
										> <?php echo $unit_of_measure["name"]." ( ".$unit_of_measure["alias"]." )"; ?> </option>
									<?php
								}
							}
							?>
							</select>
					</label>
					<label for="iprice">
							<span>
								Price 
								<span class="required">*</span>
								(<strong><span> &#8369;</span></strong>)
							</span>
							<?php
								$iprice = ((isset($_POST["save_update_item"]))?$_POST["iprice"]:(($edit_item_info)?$edit_item_info["price_per_unit"]:"0"));
							?>
							<input type="hidden" id="iprice" name="iprice" value="<?php echo $iprice; ?>" />
						
						  <input onkeyup = "updateIprice();" id="iprice1input"  value="<?php echo (($iprice)?round((int)$iprice):"0"); ?>" onkeypress="if(numeralsOnly(event)){  return true; }else{ if(isAdot(event)){ document.getElementById('iprice2input').select(); } return false;}" name="iprice1" type="text" size="5" class="input-field" style="text-align:right; width:70px;" />
							<strong><span style="padding-left:1px; padding-right:1px;">.</span></strong>
						  <input  onkeyup = "updateIprice();"  onkeypress="if(numeralsOnly(event)){ return true; }else{ return false; }" id="iprice2input" name="iprice2" type="text" class="input-field" value="<?php echo (($iprice)?(substr((string)$iprice,strrpos((string)$iprice,".")+1)):"0"); ?>" size="2" style="width:50px;" />
							<strong> / <span id="unit-of-measure-alias"> Unit </span></strong>
					</label>
					<script type="text/javascript" language="javascript">
						
							function updateIprice(){
								
								var iprice1 = document.edititemform.iprice1input.value;
								var iprice2 = document.edititemform.iprice2input.value;
								
								var irealprice = 0;
								var irealprice1 = 0;
								var irealprice2 = 0;
								
								if(parseInt(iprice1)){
									irealprice1 += parseInt(iprice1);
									irealprice1 = parseFloat(irealprice1);
								}
								
								if( parseInt(iprice2) > 0 ){
									irealprice2 = "0."+iprice2;
									irealprice2 = parseFloat(irealprice2);
								}
								
								irealprice = parseFloat(irealprice1+irealprice2);
								document.getElementById("iprice").value = irealprice;
							}
						
					</script>
			    </div>
			    <div class="form-style-2">
				    <label for="save_new_item">
		  				<center>
							<input type="submit" name="save_update_item" value="Save" />
							<input type="reset" name="cancel_update_item" value="Reset" />
						</center>
					</label>
			    </div>
		</fieldset>
	</form>
</div>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("select[name='unitofmeasure']").on("change",function(){
			if($(this).val() != ''){
				$("#unit-of-measure-alias").html($(this).val());
			}else{
				$("#unit-of-measure-alias").html("Unit");
			}
		});
		$("select[name='unitofmeasure']").change();
		
		$("input[type='reset']").on("click",function(){
			document.edititemform.reset();
			$("select[name='unitofmeasure']").change();
			return false;
		});
	});
	
</script>
<?php
}
?>