<?php
  $show_form = true;
  $srcurl = false;
   if(isset($_GET["srcurl"]) && $_GET["srcurl"]){
      $srcurl = $_GET["srcurl"];
    }
    if(isset($edit_category_page) && $edit_category_page){

    }else{
        if(isset($_GET["facebox"]) && $_GET["facebox"]){
            include('../includes/connect.php');
            include('../../includes/helper_functions.php');
        }else{
          $show_form = false;
        }
     }
  if($show_form){
      $category_id = isset($_GET["update_c"])?$_GET["update_c"]:false;
      $category_info = get_category_info($category_id);
    ?>
<div class="center-block" style="width:400px;">
  <fieldset>
    <legend> Edit item category </legend>
      <form action="edit_category.php?update_c=<?php echo (($category_info)?$category_info["id"]:""); ?>" method="post" >
      <input type="hidden" name="cat_id" value="<?php echo (($category_info)?$category_info["id"]:""); ?>" />
      <div class="form-style-2">
        <div class="form-style-2-heading">
          Category name
          </div>
          <label for="item_category">
            <center>
              <input type="text" name="item_category_name" class="input-field" value="<?php echo (isset($_POST["update_category"])?trim($_POST["item_category_name"]):(($category_info)?$category_info["name"]:"")); ?>" required />
            </center>
          </label>
        </div>
      <div class="form-style-2">
        <label>
        <center>
          <input type="submit" name="update_category" value="Save Changes" id="button1" required/>
        </center>
        </label>
      </div>
    </form>
  </fieldset>
  </div>
<?php 
	}
	?>