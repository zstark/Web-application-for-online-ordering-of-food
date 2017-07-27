<link rel="stylesheet" type="text/css" href="style/sidebar.css">
<sidebar>
	<?php //if($ns != 1){ ?>
	<div class="sidebar-top">
		
		<span class="fa fa-cutlery mouse-clickable left" title="for restaurants" style="margin-left: 7px;" onclick="window.open('rest.php','_self');"></span>
		<span class="fa fa-user mouse-clickable left" title="sign in" style="margin-left: 7px;" onclick="window.open('user.php','_self');"></span>
		<span class="fa fa-shopping-cart mouse-clickable" title="cart" style="margin-right: 7px;" onclick="window.open('cart.php','_self');"></span>

		<?php 
			if(isset($_SESSION['uid']) || isset($_SESSION['rid'])){
				?>
					<span class="fa fa-sign-out mouse-clickable" title="signout" style="margin-right: 7px;" onclick="window.open('logout.php','_self');"></span>
				<?
			}
		?>
		
	</div>
	<?php //} ?>
	<div class="sidebar-content">
		<div class="roughcopy-logo sidebar-logo mouse-clickable" onclick="window.open('index.php','_self');">
			ROTI <span class="fa fa-coffee"></span>
		</div>
	</div>
</sidebar>