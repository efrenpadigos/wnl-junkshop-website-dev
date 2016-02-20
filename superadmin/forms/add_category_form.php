<?php
  $show_form = true;
  $srcurl = false;
   if(isset($_GET["srcurl"]) && $_GET["srcurl"]){
          $srcurl = $_GET["srcurl"];
        }
  if(isset($add_item_category_page) && $add_item_category_page){

    }else{
      if(isset($_GET["facebox"]) && $_GET["facebox"]){
       
      }else{
        $show_form = false;
      }
   }
  if($show_form){
    ?>
    <div class="center-block" style="width:500px;">
      <fieldset>
        <legend><strong> Add new item category </strong></legend>
        <form action="add_item_category.php<?php echo ($srcurl)?"?srcurl=".$srcurl:""; ?>" method="post" >
        <div class="form-style-2">
             <div class="form-style-2-heading">Category name</div>
            <label for="firstname">
              <center>
                <input value="<?php echo (isset($_POST["item_category"]))?trim($_POST["item_category"]):""; ?>" name="item_category" type="text" class="input-field" required />
              </center>
            </label>
            </div>
            <div class="form-style-2">
            <label>
            <center>
              <input name="save_new_category" type="submit" value="Save" />
              <input name="cancel" type="reset" value="Reset" onclick="<?php echo (isset($_POST["save_new_category"])?"window.location.href=''; return false;":"return true;"); ?>" />
              </center>
            </label>
          </div>
        </form>
      </fieldset>
    </div>
    <?php
  }
?>
