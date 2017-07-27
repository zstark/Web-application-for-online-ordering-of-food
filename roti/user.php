<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php $ns = 1; ?>
<?php include_once 'inc/sidebar.php' ?>


<content>

<?php
$err = 0;
$lerr = 0;
$reg = 0;
if(isset($_POST['op'])){
	if($_POST['op'] === "login"){
		if(isset($_POST['uname']) && isset($_POST['pwd'])){

			$p = getRecord('SELECT * FROM `user` WHERE `phone` = "'.$_POST['uname'].'" AND `password` = "'.$_POST['pwd'].'"' );
			if($p != NULL && isset($p['user.id'])){
				$_SESSION['uid'] = $p['user.id'];
				unset($p['user.password']);
				unset($p['user.id']);
				$_SESSION['user'] = $p;
				if(isset($_GET['redir'])) header("LOCATION: cart.php");
			}else{
				$lerr = 1;
			}
		}
	}else if($_POST['op'] === "register"){
		if(isset($_POST['address']) && isset($_POST['pwd']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['email'])){
			if($_POST['pwd'] == ''){
				$err = 1;
			}
			if($_POST['phone'] == ''){
				$err = 1;
			}
			if($_POST['email'] == ''){
				$err = 1;
			}
			if($_POST['name'] == ''){
				$err = 1;
			}
			if($err == 0){
				if(getRecord('INSERT INTO user (name, phone, password, address, email) values ("'.$_POST['name'].'","'.$_POST['phone'].'","'.$_POST['pwd'].'","'.$_POST['address'].'","'.$_POST['email'].'")')){
					$reg = 1;
				}else{
					$err = 2;
				}
			}
		}
	}

}


if(isset($_SESSION['uid']) && isset($_SESSION['user'])){
	createThumbnail("User Panel", $_SESSION['user']['user.name'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);
	createThumbnail('View Orders','manage orders','mouse mouse-clickable','','','','','','ViewOrders.php');
	createThumbnail('Favourates','vie favourates','mouse mouse-clickable','','','','','','index.php?fav');
}else{
	createThumbnail("User Panel", "not Logged In", " heading cover", "alt static", "images/navigation-bg.png", "","","",NULL);
?>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
		<?php
			createThumbnail("Log In", "", "ltr cover sub-heading border border-none", "static transparent", "", "margin-top:40px;","","",NULL); 
		?>
		<?php if($reg === 1) echo '<div style="text-align:center;">Registered successfully! Log in to continue.</div>' ?>
		<input type="text" placeholder="phone" name="uname">
		<input type="password" placeholder="password" name="pwd">
		<input type="submit" value="login" name="op">
		<?php if($lerr === 1) echo '<div style="text-align:center;">Invalid Credentials</div>' ?>
	</form>

	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
		<?php
			createThumbnail("Register", "", "ltr cover sub-heading border border-none", "static transparent", "", "margin-top:40px;","","",NULL); 
		?>
		<input type="text" placeholder="phone" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"> <?php if($err >= 1 && $_POST['phone'] == ''){ echo '<font color="red">*</font>'; } ?>
		<br><input type="password" placeholder="password" name="pwd" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>"> <?php if($err >= 1 && $_POST['pwd'] == ''){ echo '<font color="red">*</font>'; } ?>
		<br><input type="text" placeholder="address" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
		<br><input type="text" placeholder="name" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"> <?php if($err >= 1 && $_POST['name'] == ''){ echo '<font color="red">*</font>'; } ?>
		<br><input type="text" placeholder="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> <?php if($err >= 1 && $_POST['email'] == ''){ echo '<font color="red">*</font>'; } ?>
		<?php if($err === 2) echo '<div style="text-align:center;">Error in registering! Phone number already exists.</div>' ?>
		<br><input type="submit" value="register" name="op">

	</form>
	<?php
}

?>

</content>


<?php include_once 'inc/footer.php' ?>
