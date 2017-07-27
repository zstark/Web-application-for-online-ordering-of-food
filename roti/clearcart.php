<?php

session_start();

foreach ($_COOKIE as $key => $value) {
	$a = substr($key, 0, 3);
	if($a === "mi_"){
		//echo $a;
		setcookie($key, "", time() - 2592000,"/");
	}
}

if(isset($_GET['redir'])) header("LOCATION: ViewOrders.php");
	else header("LOCATION: cart.php");

?>