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

			$p = getRecord('SELECT * FROM `admin` WHERE `username` = "'.$_POST['uname'].'" AND `password` = "'.$_POST['pwd'].'"' );
			if($p != NULL && isset($p['admin.id'])){
				$_SESSION['aid'] = $p['admin.id'];
				unset($p['admin.password']);
				unset($p['admin.id']);
				$_SESSION['admin'] = $p;
				if(isset($_GET['redir'])) header("LOCATION: cart.php");
			}else{
				$lerr = 1;
			}
		}
	}

}


if(isset($_SESSION['aid']) && isset($_SESSION['admin'])){
	createThumbnail("Admin Panel", $_SESSION['admin']['admin.username'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);
	createThumbnail('View Orders','view orders','mouse mouse-clickable','','','','','','allOrders.php');
	createThumbnail('View Restaurants','view restaurants','mouse mouse-clickable','','','','','','allRestaurants.php');
	createThumbnail('View Users','view users','mouse mouse-clickable','','','','','','allUsers.php');
}else{
	createThumbnail("Admin Panel", "not Logged In", " heading cover", "alt static", "images/navigation-bg.png", "","","",NULL);
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


	<?php
}

?>

</content>


<?php include_once 'inc/footer.php' ?>
