<?php
	
	$active_menu = isset($active_menu)?trim(strtolower($active_menu)):false;

?>
<div id='cssmenu'>
	<ul>
		<li class="<?php echo ($active_menu && ($active_menu=="home"))?" active ":""; ?>">
			<a href='#'><img src='images/512px-Home_Icon.svg.png' height='19' width='19'>Home</a>
		</li>
		<li class=' <?php echo ($active_menu && ($active_menu=="item_categories"))?" active ":""; ?> has-sub'>
			<a href='#'><img src='images/settings.svg' height='19' width='19'>SETTINGS</a>
			<ul>
				<li class="<?php echo ($active_menu && ($active_menu=="item_categories"))?" active ":""; ?>" ><a href='item_categories.php'><img src='images/item.jpg' height='19' width='19'>CATEGORIES</a></li>
				<li class="<?php echo ($active_menu && ($active_menu=="items"))?" active ":""; ?>" ><a href='items.php'><img src='images/t.png' height='19' width='19'>ITEMS</a></li>
				<li class="<?php echo ($active_menu && ($active_menu=="branches"))?" active ":""; ?>" ><a href='branches.php'><img src='images/branch.png' height='19' width='19'>BRANCHES</a></li>
			</ul>
		</li>
		<li class='<?php echo ($active_menu && ($active_menu=="users"))?" active ":""; ?>'>
			<a href='users.php'><img src='images/AccountsIconX.png' height='19' width='19'>USER ACCOUNTS</a>
		</li>
			<li class="<?php echo ($active_menu && ($active_menu=="collectors_credit"))?" active ":""; ?>">
			<a href='credit.php'><img src='images/4055.png' height='19' width='19'>Collectors Credit</a>
		</li>
		<li class=' has-sub'><a href='#'><img src='images/18423.png' height='19' width='19'>RECYCLED ITEMS</a>
			<ul>
				<li><a href='recycle.php'>RECYCLED ITEM</a></li>	
				<li><a href='sell_recycled_item.php'>SELL RECYCLED</a></li>	
			</ul>
		</li>
		<li><a href='stockin.php' ><img src='images/11.png' height='19' width='19'>STOCK IN</a></li>
		<li><a href='sell.php' ><img src='images/aa.png' height='19' width='19'>TRANSACTION</a></li>
		<li><a href='inventory.php'><img src='images/ii.png' height='19' width='19'>INVENTORY</a></li>
		<li class=' has-sub'><a href='#'><img src='images/rr.png' height='19' width='19'>WNL</a>
			<ul>
				<li><a href='report.php' ><img src='images/rr.png' height='19' width='19'>REPORTS</a></li>
				<li><a href='feedback.php' ><img src='images/comment.svg' height='19' width='19'>FEEDBACKS</a></li>	
				<li><a href='logout.php'><img src='images/ll.jpg' height='19' width='19'>LOGOUT</a></li>
			</ul>		
	</ul>
</div>